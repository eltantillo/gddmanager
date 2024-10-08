<?php

/**
 * This is the model class for table "Company".
 *
 * The followings are the available columns in table 'Company':
 * @property integer $id
 * @property integer $referral_id
 * @property string $name
 * @property string $slogan
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip
 * @property string $timezone
 * @property string $website
 * @property integer $phone
 * @property string $paypal_email
 * @property string $membership
 * @property integer $month_users
 */
class Company extends CActiveRecord
{
	public $avatar;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('referral_id, phone, month_users', 'numerical', 'integerOnly'=>true),
			array('email, paypal_email', 'length', 'max'=>255),
			array('name, slogan, address1, address2, city, state, country, zip, timezone, website, avatar', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, slogan, email, address1, address2, city, state, country, zip, timezone, website, phone, paypal_email, membership, month_users', 'safe', 'on'=>'search'),
			array('avatar', 'file', 'types'=>'jpg, gif, png', 'safe'=>false, 'allowEmpty'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'referral' => array(self::BELONGS_TO, 'company', 'referral_id'),
			'companies' => array(self::HAS_MANY, 'company', 'referral_id'),
			'jobs' => array(self::HAS_MANY, 'Job', 'company_id'),
			'projects' => array(self::HAS_MANY, 'Project', 'company_id'),
			'users' => array(self::HAS_MANY, 'User', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'referral_id' => 'Referral',
			'name' => 'Name',
			'slogan' => 'Slogan',
			'email' => 'Email',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'country' => 'Country',
			'zip' => 'Zip',
			'timezone' => 'Timezone',
			'website' => 'Website',
			'phone' => 'Phone',
			'paypal_email' => 'Paypal Email',
			'membership' => 'Membership',
			'month_users' => 'Month Users',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('referral_id',$this->referral_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('slogan',$this->slogan,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('address1',$this->address1,true);

		$criteria->compare('address2',$this->address2,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('state',$this->state,true);

		$criteria->compare('country',$this->country,true);

		$criteria->compare('zip',$this->zip,true);

		$criteria->compare('timezone',$this->timezone,true);

		$criteria->compare('website',$this->website,true);

		$criteria->compare('phone',$this->phone);

		$criteria->compare('paypal_email',$this->paypal_email,true);

		$criteria->compare('membership',$this->membership,true);

		$criteria->compare('month_users',$this->month_users);

		return new CActiveDataProvider('Company', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Company the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}