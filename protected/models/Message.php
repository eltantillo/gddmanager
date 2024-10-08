<?php

/**
 * This is the model class for table "Message".
 *
 * The followings are the available columns in table 'Message':
 * @property integer $id
 * @property integer $user_from_id
 * @property integer $user_to_id
 * @property string $date
 * @property string $message
 * @property integer $read
 */
class Message extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message', 'required'),
			array('user_from_id, user_to_id, read', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_from_id, user_to_id, date, message, read', 'safe', 'on'=>'search'),
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
			'user_from' => array(self::BELONGS_TO, 'User', 'user_from_id'),
			'user_to' => array(self::BELONGS_TO, 'User', 'user_to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'user_from_id' => 'User From',
			'user_to_id' => 'User To',
			'date' => 'Date',
			'message' => 'Message',
			'read' => 'Read',
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

		$criteria->compare('user_from_id',$this->user_from_id);

		$criteria->compare('user_to_id',$this->user_to_id);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('message',$this->message,true);

		$criteria->compare('read',$this->read);

		return new CActiveDataProvider('Message', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}