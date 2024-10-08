<?php

/**
 * This is the model class for table "Job".
 *
 * The followings are the available columns in table 'Job':
 * @property integer $id
 * @property integer $company_id
 * @property string $title
 * @property string $position
 * @property string $description
 * @property integer $open
 */
class Job extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, title, position, description', 'required'),
			array('company_id, open', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, title, position, description, open', 'safe', 'on'=>'search'),
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
			'applications' => array(self::HAS_MANY, 'Application', 'job_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'company_id' => 'Company',
			'title' => 'Title',
			'position' => 'Position',
			'description' => 'Description',
			'open' => 'Open',
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

		$criteria->compare('company_id',$this->company_id);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('position',$this->position,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('open',$this->open);

		return new CActiveDataProvider('Job', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Job the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}