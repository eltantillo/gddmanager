<?php

/**
 * This is the model class for table "Component".
 *
 * The followings are the available columns in table 'Component':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $dependency_id
 * @property integer $character_id
 * @property integer $enviroment_id
 * @property integer $screen_id
 * @property integer $level_id
 * @property integer $cutscene_id
 * @property string $sounds
 * @property string $graphics
 * @property string $name
 * @property string $description
 * @property integer $code
 * @property integer $valid
 * @property integer $test
 * @property string $deadline
 * @property integer $time
 * @property integer $time_est
 */
class Component extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'component';
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
			array('project_id, user_id, dependency_id, character_id, enviroment_id, screen_id, level_id, cutscene_id, code, valid, test, time, time_est', 'numerical', 'integerOnly'=>true),
			array('sounds, graphics, name, description, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, dependency_id, character_id, enviroment_id, screen_id, level_id, cutscene_id, sounds, graphics, name, description, code, valid, test, deadline, time, time_est', 'safe', 'on'=>'search'),
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
			'character' => array(self::BELONGS_TO, 'Character', 'character_id'),
			'dependency' => array(self::BELONGS_TO, 'Component', 'dependency_id'),
			'components' => array(self::HAS_MANY, 'Component', 'dependency_id'),
			'cutscene' => array(self::BELONGS_TO, 'Cutscene', 'cutscene_id'),
			'enviroment' => array(self::BELONGS_TO, 'Enviroment', 'enviroment_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
			'screen' => array(self::BELONGS_TO, 'Screen', 'screen_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'user_id' => 'User',
			'dependency_id' => 'Dependency',
			'character_id' => 'Character',
			'enviroment_id' => 'Enviroment',
			'screen_id' => 'Screen',
			'level_id' => 'Level',
			'cutscene_id' => 'Cutscene',
			'sounds' => 'Sounds',
			'graphics' => 'Graphics',
			'name' => 'Name',
			'description' => 'Description',
			'code' => 'Code',
			'valid' => 'Valid',
			'test' => 'Test',
			'deadline' => 'Deadline',
			'time' => 'Time',
			'time_est' => 'Time Est',
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('dependency_id',$this->dependency_id);

		$criteria->compare('character_id',$this->character_id);

		$criteria->compare('enviroment_id',$this->enviroment_id);

		$criteria->compare('screen_id',$this->screen_id);

		$criteria->compare('level_id',$this->level_id);

		$criteria->compare('cutscene_id',$this->cutscene_id);

		$criteria->compare('sounds',$this->sounds,true);

		$criteria->compare('graphics',$this->graphics,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('code',$this->code);

		$criteria->compare('valid',$this->valid);

		$criteria->compare('test',$this->test);

		$criteria->compare('deadline',$this->deadline,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('time_est',$this->time_est);

		return new CActiveDataProvider('Component', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Component the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}