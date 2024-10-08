<?php

/**
 * This is the model class for table "Section".
 *
 * The followings are the available columns in table 'Section':
 * @property integer $id
 * @property integer $project_id
 * @property integer $section_id
 * @property string $name
 * @property string $content
 * @property string $file
 */
class Section extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, section_id', 'required'),
			array('project_id, section_id', 'numerical', 'integerOnly'=>true),
			array('name, content, file', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, section_id, name, content, file', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'project_id' => 'Project',
			'section_id' => 'Section',
			'name' => 'Name',
			'content' => 'Content',
			'file' => 'File',
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

		$criteria->compare('project_id',$this->project_id);

		$criteria->compare('section_id',$this->section_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('file',$this->file,true);

		return new CActiveDataProvider('Section', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Section the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}