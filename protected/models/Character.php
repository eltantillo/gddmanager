<?php

/**
 * This is the model class for table "Character".
 *
 * The followings are the available columns in table 'Character':
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $attributes_list
 * @property string $state_machine
 * @property string $backstory
 * @property string $personality
 * @property string $characteristics
 * @property string $abilities
 * @property string $relevance
 * @property string $relationship
 * @property string $statistics
 * @property string $ai_type
 * @property string $ai_collition
 * @property string $ai_pathfinding
 */
class Character extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'character';
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
			array('name, attributes_list, state_machine, backstory, personality, characteristics, abilities, relevance, relationship, statistics, ai_type, ai_collition, ai_pathfinding', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, name, attributes_list, state_machine, backstory, personality, characteristics, abilities, relevance, relationship, statistics, ai_type, ai_collition, ai_pathfinding', 'safe', 'on'=>'search'),
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
			'components' => array(self::HAS_MANY, 'Component', 'character_id'),
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
			'state_machine' => 'State Machine',
			'backstory' => 'Backstory',
			'personality' => 'Personality',
			'characteristics' => 'Characteristics',
			'abilities' => 'Abilities',
			'relevance' => 'Relevance',
			'relationship' => 'Relationship',
			'statistics' => 'Statistics',
			'ai_type' => 'Ai Type',
			'ai_collition' => 'Ai Collition',
			'ai_pathfinding' => 'Ai Pathfinding',
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

		$criteria->compare('state_machine',$this->state_machine,true);

		$criteria->compare('backstory',$this->backstory,true);

		$criteria->compare('personality',$this->personality,true);

		$criteria->compare('characteristics',$this->characteristics,true);

		$criteria->compare('abilities',$this->abilities,true);

		$criteria->compare('relevance',$this->relevance,true);

		$criteria->compare('relationship',$this->relationship,true);

		$criteria->compare('statistics',$this->statistics,true);

		$criteria->compare('ai_type',$this->ai_type,true);

		$criteria->compare('ai_collition',$this->ai_collition,true);

		$criteria->compare('ai_pathfinding',$this->ai_pathfinding,true);

		return new CActiveDataProvider('Character', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Character the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}