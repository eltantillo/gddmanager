<?php

/**
 * This is the model class for table "Marketing".
 *
 * The followings are the available columns in table 'Marketing':
 * @property integer $id
 * @property integer $project_id
 * @property string $logo_icon
 * @property string $images
 * @property string $videos
 * @property string $target_audience
 * @property string $art_style
 */
class Marketing extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marketing';
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
			array('logo_icon, images, videos, target_audience, art_style', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, project_id, logo_icon, images, videos, target_audience, art_style', 'safe', 'on'=>'search'),
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
			'logo_icon' => 'Logo Icon',
			'images' => 'Images',
			'videos' => 'Videos',
			'target_audience' => 'Target Audience',
			'art_style' => 'Art Style',
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

		$criteria->compare('logo_icon',$this->logo_icon,true);

		$criteria->compare('images',$this->images,true);

		$criteria->compare('videos',$this->videos,true);

		$criteria->compare('target_audience',$this->target_audience,true);

		$criteria->compare('art_style',$this->art_style,true);

		return new CActiveDataProvider('Marketing', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Marketing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}