<?php

/**
 * This is the model class for table "Cutscene".
 *
 * The followings are the available columns in table 'Cutscene':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $actors
 * @property string $enviroment
 * @property string $graphics
 * @property string $music
 * @property string $sounds
 * @property string $description
 * @property string $storyboard
 * @property string $script
 * @property integer $finish
 * @property integer $sketch
 * @property integer $code
 * @property integer $valid
 * @property integer $test
 * @property string $deadline
 * @property integer $time
 * @property integer $time_est
 */
class Cutscene extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cutscene';
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
			array('project_id, user_id, finish, sketch, code, valid, test, time, time_est', 'numerical', 'integerOnly'=>true),
			array('actors, enviroment, graphics, music, sounds, description, storyboard, script, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, actors, enviroment, graphics, music, sounds, description, storyboard, script, finish, sketch, code, valid, test, deadline, time, time_est', 'safe', 'on'=>'search'),
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
			'components' => array(self::HAS_MANY, 'Component', 'Cutscene_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'user_id' => 'User',
			'actors' => 'Actors',
			'enviroment' => 'Enviroment',
			'graphics' => 'Graphics',
			'music' => 'Music',
			'sounds' => 'Sounds',
			'description' => 'Description',
			'storyboard' => 'Storyboard',
			'script' => 'Script',
			'finish' => 'Finish',
			'sketch' => 'Sketch',
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

		$criteria->compare('actors',$this->actors,true);

		$criteria->compare('enviroment',$this->enviroment,true);

		$criteria->compare('graphics',$this->graphics,true);

		$criteria->compare('music',$this->music,true);

		$criteria->compare('sounds',$this->sounds,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('storyboard',$this->storyboard,true);

		$criteria->compare('script',$this->script,true);

		$criteria->compare('finish',$this->finish);

		$criteria->compare('sketch',$this->sketch);

		$criteria->compare('code',$this->code);

		$criteria->compare('valid',$this->valid);

		$criteria->compare('test',$this->test);

		$criteria->compare('deadline',$this->deadline,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('time_est',$this->time_est);

		return new CActiveDataProvider('Cutscene', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Cutscene the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}