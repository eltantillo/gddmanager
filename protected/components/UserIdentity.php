<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('email'=>$this->username));
        
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!password_verify($this->password, $user->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->setState('company', $user->company_id);
            $this->setState('roles', explode(',', $user->roles));
            $this->setState('language', $user->language);
            $this->setState('date', strtotime($user->date));
            $this->setState('project', $user->active_project_id);
            if ($user->name != ''){
                $this->setState('displayName', $user->name);
            }
            else{
                $this->setState('displayName', $user->email);
            }
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}

	public function getId(){
		return $this->_id;
	}
}