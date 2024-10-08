<?php

/**
 * This is the model class for table "Level".
 *
 * The followings are the available columns in table 'Level':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $area_id
 * @property string $enviroment
 * @property string $characters
 * @property string $graphics
 * @property string $music
 * @property string $sounds
 * @property string $cutscenes
 * @property string $name
 * @property string $synopsis
 * @property string $introduction
 * @property string $objectives
 * @property string $description
 * @property string $path
 * @property string $encounters
 * @property string $walkthrough
 * @property string $closing
 * @property string $design
 * @property integer $finish
 * @property integer $code
 * @property integer $valid
 * @property integer $test
 * @property string $deadline
 * @property integer $time
 * @property integer $time_est
 */
class Level extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'level';
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
			array('project_id, user_id, area_id, finish, code, valid, test, time, time_est', 'numerical', 'integerOnly'=>true),
			array('enviroment, characters, graphics, music, sounds, cutscenes, name, synopsis, introduction, objectives, description, path, encounters, walkthrough, closing, design, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, area_id, enviroment, characters, graphics, music, sounds, cutscenes, name, synopsis, introduction, objectives, description, path, encounters, walkthrough, closing, design, finish, code, valid, test, deadline, time, time_est', 'safe', 'on'=>'search'),
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
			'components' => array(self::HAS_MANY, 'Component', 'Level_id'),
			'area' => array(self::BELONGS_TO, 'Area', 'area_id'),
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
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
			'area_id' => 'Area',
			'enviroment' => 'Enviroment',
			'characters' => 'Characters',
			'graphics' => 'Graphics',
			'music' => 'Music',
			'sounds' => 'Sounds',
			'cutscenes' => 'Cutscenes',
			'name' => 'Name',
			'synopsis' => 'Synopsis',
			'introduction' => 'Introduction',
			'objectives' => 'Objectives',
			'description' => 'Description',
			'path' => 'Path',
			'encounters' => 'Encounters',
			'walkthrough' => 'Walkthrough',
			'closing' => 'Closing',
			'design' => 'Design',
			'finish' => 'Finish',
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

		$criteria->compare('area_id',$this->area_id);

		$criteria->compare('enviroment',$this->enviroment,true);

		$criteria->compare('characters',$this->characters,true);

		$criteria->compare('graphics',$this->graphics,true);

		$criteria->compare('music',$this->music,true);

		$criteria->compare('sounds',$this->sounds,true);

		$criteria->compare('cutscenes',$this->cutscenes,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('synopsis',$this->synopsis,true);

		$criteria->compare('introduction',$this->introduction,true);

		$criteria->compare('objectives',$this->objectives,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('path',$this->path,true);

		$criteria->compare('encounters',$this->encounters,true);

		$criteria->compare('walkthrough',$this->walkthrough,true);

		$criteria->compare('closing',$this->closing,true);

		$criteria->compare('design',$this->design,true);

		$criteria->compare('finish',$this->finish);

		$criteria->compare('code',$this->code);

		$criteria->compare('valid',$this->valid);

		$criteria->compare('test',$this->test);

		$criteria->compare('deadline',$this->deadline,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('time_est',$this->time_est);

		return new CActiveDataProvider('Level', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Level the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}