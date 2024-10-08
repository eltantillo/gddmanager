<?php

/**
 * This is the model class for table "Application".
 *
 * The followings are the available columns in table 'Application':
 * @property integer $id
 * @property integer $job_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $description
 */
class Application extends CActiveRecord
{
	public $resume;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_id, name, email, phone, description', 'required'),
			array('job_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, job_id, name, email, phone, description', 'safe', 'on'=>'search'),
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
			'job' => array(self::BELONGS_TO, 'Job', 'job_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'job_id' => 'Job',
			'name' => 'Name',
			'email' => 'Email',
			'phone' => 'Phone',
			'description' => 'Description',
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

		$criteria->compare('job_id',$this->job_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('Application', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Application the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}