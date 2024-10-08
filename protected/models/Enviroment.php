<?php

/**
 * This is the model class for table "Enviroment".
 *
 * The followings are the available columns in table 'Enviroment':
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $attributes_list
 * @property string $characteristics
 * @property string $relevance
 * @property string $relationship
 * @property string $statistics
 */
class Enviroment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'enviroment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id', 'required'),
			array('project_id', 'numerical', 'integerOnly'=>true),
			array('name, attributes_list, characteristics, relevance, relationship, statistics', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, name, attributes_list, characteristics, relevance, relationship, statistics', 'safe', 'on'=>'search'),
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
			'cutscenes' => array(self::MANY_MANY, 'Cutscene', 'cutscene_has_enviroment(cutscene_id, enviroment_id)'),
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
			'name' => 'Name',
			'attributes_list' => 'Attributes List',
			'characteristics' => 'Characteristics',
			'relevance' => 'Relevance',
			'relationship' => 'Relationship',
			'statistics' => 'Statistics',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('attributes_list',$this->attributes_list,true);

		$criteria->compare('characteristics',$this->characteristics,true);

		$criteria->compare('relevance',$this->relevance,true);

		$criteria->compare('relationship',$this->relationship,true);

		$criteria->compare('statistics',$this->statistics,true);

		return new CActiveDataProvider('Enviroment', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Enviroment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}