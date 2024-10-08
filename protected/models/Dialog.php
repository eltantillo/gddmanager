<?php

/**
 * This is the model class for table "Dialog".
 *
 * The followings are the available columns in table 'Dialog':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $character_id
 * @property string $name
 * @property string $context
 * @property string $content
 * @property integer $finish
 * @property integer $code
 * @property integer $valid
 * @property integer $test
 * @property string $deadline
 * @property integer $time
 * @property integer $time_est
 */
class Dialog extends CActiveRecord
{
	public function __toString(){
		return strval($this->id);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dialog';
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
			array('project_id, user_id, character_id, finish, code, valid, test, time, time_est', 'numerical', 'integerOnly'=>true),
			array('name, context, content, deadline', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, user_id, character_id, name, context, content, finish, code, valid, test, deadline, time, time_est', 'safe', 'on'=>'search'),
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
			'character_id' => 'Character',
			'name' => 'Name',
			'context' => 'Context',
			'content' => 'Content',
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

		$criteria->compare('character_id',$this->character_id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('context',$this->context,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('finish',$this->finish);

		$criteria->compare('code',$this->code);

		$criteria->compare('valid',$this->valid);

		$criteria->compare('test',$this->test);

		$criteria->compare('deadline',$this->deadline,true);

		$criteria->compare('time',$this->time);

		$criteria->compare('time_est',$this->time_est);

		return new CActiveDataProvider('Dialog', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Dialog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}