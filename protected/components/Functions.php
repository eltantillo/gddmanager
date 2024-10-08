<?php
class Functions{
	public static function subString($text, $lenght){
		$newText = substr($text, 0, $lenght);
		if (strlen($text) > $lenght){
			$newText .= '...';
		}
		return $newText;
	}
	
	public static function getNames($users){
		$ids = explode(',', $users);
		$names = '';

		foreach ($ids as $id) {
			$user = User::model()->findbyPk($id);
			if ($user != NULL){
				$names .= '<a href="' . URL . '/user/' . $id . '">' . $user->name . '</a>, ';
			}
		}
		return substr($names, 0, strlen($names) - 2);
	}
	
	public static function getUserData($users){
		$ids = explode(',', $users);
		$names = array();

		foreach ($ids as $id) {
			$user = User::model()->findbyPk($id);
			if ($user != NULL){
				$names[] = array(
					'id'       => $user->id,
					'name'     => $user->name,
					'location' => $user->location,
					'language' => $user->language,
					'timezone' => $user->timezone,
					'email'    => $user->email,
					'picture'  => $user->avatar,
					'roles'    => Functions::getRoles($user->roles),
				);
			}
		}
		//return substr($names, 0, strlen($names) - 2);
		return $names;
	}

	public static function getWeekDays($days){
		$string = '';

		if ($days == '0,1,2,3,4,5,6'){
			$string = Language::$allWeekdays;
		}

		else if ($days == '1,2,3,4,5'){
			$string = Language::$monFri;
		}

		else if ($days == '1,2,3,4,5,6'){
			$string = Language::$monSat;
		}

		else if ($days == '0,6'){
			$string = Language::$weekends;
		}
		else{
			$string = str_replace(
				array(
					',',
					'0',
					'1',
					'2',
					'3',
					'4',
					'5',
					'6'
				),
				array(
					', ',
					Language::$weekdays['0'],
					Language::$weekdays['1'],
					Language::$weekdays['2'],
					Language::$weekdays['3'],
					Language::$weekdays['4'],
					Language::$weekdays['5'],
					Language::$weekdays['6']
				),
				$days);
		}

		return $string;
	}

	public static function getSalary($days, $salary, $worktime){
		$days   = explode(',', $days);
		$salary = count($days) * $salary * $worktime;

		return $salary;
	}

	public static function saveMenuPreference($mode){
		
	}

	public static function getRoles($roles){
		$string = str_replace(
			array(
				',',
				'admin',
				'designer',
				'artist',
				'programmer',
				'composer',
				'writer',
				'tester',
			),
			array(
				', ',
				Language::$roles['admin'],
				Language::$roles['designer'],
				Language::$roles['artist'],
				Language::$roles['programmer'],
				Language::$roles['composer'],
				Language::$roles['writer'],
				Language::$roles['tester'],
			),
			$roles);

		return $string;
	}
	
	public static function getProjectUsers($id){
		$project = Project::model()->findByPk($id);
		$users_ids = explode(',', $project->team);
		$users = array();
		
		foreach ($users_ids as $user_id){
			array_push( $users, User::model()->findByPk($user_id) );
		}
		return $users;
	}
	
	public static function getUserWorkload($user){
		$workload = 0;
		
		$bugs       = Bug::model()->findAllbyAttributes(array('user_id' => $user->id));
		$components = Component::model()->findAllbyAttributes(array('user_id' => $user->id));
		$custcenes  = Cutscene::model()->findAllbyAttributes(array('user_id' => $user->id));
		$dialogs    = Dialog::model()->findAllbyAttributes(array('user_id' => $user->id));
		$graphics   = Graphic::model()->findAllbyAttributes(array('user_id' => $user->id));
		$levels     = Level::model()->findAllbyAttributes(array('user_id' => $user->id));
		$musics     = Music::model()->findAllbyAttributes(array('user_id' => $user->id));
		$sounds     = Sound::model()->findAllbyAttributes(array('user_id' => $user->id));
		$tasks      = Task::model()->findAllbyAttributes(array('user_id' => $user->id));
		
		foreach($bugs       as $bug)       { $workload += 1;                    }
		foreach($components as $component) { $workload += $component->time_est; }
		foreach($custcenes  as $custcene)  { $workload += $custcene->time_est;  }
		foreach($dialogs    as $dialog)    { $workload += $dialog->time_est;    }
		foreach($graphics   as $graphic)   { $workload += $graphic->time_est;   }
		foreach($levels     as $level)     { $workload += $level->time_est;     }
		foreach($musics     as $music)     { $workload += $music->time_est;     }
		foreach($sounds     as $sound)     { $workload += $sound->time_est;     }
		foreach($tasks      as $task)      { $workload += 1;                    }
		
		$factor = ($user->worktime * $user->workdays) / 40;
		if ($factor != 0){
			$workload /= $factor;
		}
		
		return $workload;
	}
	
	function getTime($seconds){
		return sprintf("%02d%s%02d", floor($seconds / 3600), ':', ($seconds / 60) % 60);
	}
}
?>