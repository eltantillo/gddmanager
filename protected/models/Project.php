<?php

/**
 * This is the model class for table "Project".
 *
 * The followings are the available columns in table 'Project':
 * @property integer $id
 * @property integer $company_id
 * @property string $name
 * @property string $team
 * @property integer $leader_id
 * @property integer $status
 * @property string $copyright
 * @property string $version
 * @property string $changes
 * @property string $date
 * @property string $concept
 * @property string $features
 * @property string $genre
 * @property string $audience
 * @property string $look
 * @property string $progression
 * @property string $objectives
 * @property string $flow
 * @property string $physics
 * @property string $movement
 * @property string $economy
 * @property string $combat
 * @property string $switches
 * @property string $pick
 * @property string $talk
 * @property string $read
 * @property string $options
 * @property string $save
 * @property string $cheats
 * @property string $backstory
 * @property string $plot
 * @property string $license
 * @property string $screen_flow
 * @property string $HUD
 * @property string $rendering
 * @property string $camera
 * @property string $lighting
 * @property string $controls
 * @property string $help
 * @property string $target_hardware
 * @property string $dev_enviroment
 * @property string $dev_standards
 * @property string $engine
 * @property string $network
 * @property string $conventions
 * @property string $style
 * @property double $budget
 * @property string $monetization
 * @property string $risks
 * @property string $marketing
 * @property string $website
 * @property string $twitter
 * @property string $discord
 * @property string $reddit
 * @property string $youtube
 * @property string $twitch
 * @property string $tumblr
 * @property string $snapchat
 * @property string $facebook
 * @property string $production_date
 * @property string $launch_date
 * @property double $price
 * @property string $currency
 * @property integer $public
 */
class Project extends CActiveRecord
{
	public $banner;
	public $cover;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, currency', 'required'),
			array('company_id, leader_id, status, public', 'numerical', 'integerOnly'=>true),
			array('budget, price', 'numerical'),
			array('name, team, copyright, version, changes, date, concept, features, genre, audience, look, progression, objectives, flow, physics, movement, economy, combat, switches, pick, talk, read, options, save, cheats, backstory, plot, license, screen_flow, HUD, rendering, camera, lighting, controls, help, target_hardware, dev_enviroment, dev_standards, engine, network, conventions, style, monetization, risks, marketing, website, twitter, discord, reddit, youtube, twitch, tumblr, snapchat, facebook, production_date, launch_date, banner, cover', 'safe'),
			array('banner, cover', 'file', 'types'=>'jpg, jpeg, gif, png', 'safe'=>false, 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, name, team, leader_id, status, copyright, version, changes, date, concept, features, genre, audience, look, progression, objectives, flow, physics, movement, economy, combat, switches, pick, talk, read, options, save, cheats, backstory, plot, license, screen_flow, HUD, rendering, camera, lighting, controls, help, target_hardware, dev_enviroment, dev_standards, engine, network, conventions, style, budget, monetization, risks, marketing, website, twitter, discord, reddit, youtube, twitch, tumblr, snapchat, facebook, production_date, launch_date, price, currency, public', 'safe', 'on'=>'search'),
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
			'areas' => array(self::HAS_MANY, 'Area', 'project_id'),
			'bugs' => array(self::HAS_MANY, 'Bug', 'project_id'),
			'characters' => array(self::HAS_MANY, 'Character', 'project_id'),
			'components' => array(self::HAS_MANY, 'Component', 'project_id'),
			'cutscenes' => array(self::HAS_MANY, 'Cutscene', 'project_id'),
			'devlogs' => array(self::HAS_MANY, 'Devlog', 'project_id'),
			'dialogs' => array(self::HAS_MANY, 'Dialog', 'project_id'),
			'enviroments' => array(self::HAS_MANY, 'Enviroment', 'project_id'),
			'graphics' => array(self::HAS_MANY, 'Graphic', 'project_id'),
			'levels' => array(self::HAS_MANY, 'Level', 'project_id'),
			'marketings' => array(self::HAS_MANY, 'Marketing', 'project_id'),
			'musics' => array(self::HAS_MANY, 'Music', 'project_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'leader' => array(self::BELONGS_TO, 'User', 'leader_id'),
			'resources' => array(self::HAS_MANY, 'Resource', 'project_id'),
			'screens' => array(self::HAS_MANY, 'Screen', 'project_id'),
			'sections' => array(self::HAS_MANY, 'Section', 'project_id'),
			'sounds' => array(self::HAS_MANY, 'Sound', 'project_id'),
			'tasks' => array(self::HAS_MANY, 'Task', 'project_id'),
			'users' => array(self::HAS_MANY, 'User', 'active_project_id'),
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
			'name' => 'Name',
			'team' => 'Team',
			'leader_id' => 'Leader',
			'status' => 'Status',
			'copyright' => 'Copyright',
			'version' => 'Version',
			'changes' => 'Changes',
			'date' => 'Date',
			'concept' => 'Concept',
			'features' => 'Features',
			'genre' => 'Genre',
			'audience' => 'Audience',
			'look' => 'Look',
			'progression' => 'Progression',
			'objectives' => 'Objectives',
			'flow' => 'Flow',
			'physics' => 'Physics',
			'movement' => 'Movement',
			'economy' => 'Economy',
			'combat' => 'Combat',
			'switches' => 'Switches',
			'pick' => 'Pick',
			'talk' => 'Talk',
			'read' => 'Read',
			'options' => 'Options',
			'save' => 'Save',
			'cheats' => 'Cheats',
			'backstory' => 'Backstory',
			'plot' => 'Plot',
			'license' => 'License',
			'screen_flow' => 'Screen Flow',
			'HUD' => 'Hud',
			'rendering' => 'Rendering',
			'camera' => 'Camera',
			'lighting' => 'Lighting',
			'controls' => 'Controls',
			'help' => 'Help',
			'target_hardware' => 'Target Hardware',
			'dev_enviroment' => 'Dev Enviroment',
			'dev_standards' => 'Dev Standards',
			'engine' => 'Engine',
			'network' => 'Network',
			'conventions' => 'Conventions',
			'style' => 'Style',
			'budget' => 'Budget',
			'monetization' => 'Monetization',
			'risks' => 'Risks',
			'marketing' => 'Marketing',
			'website' => 'Website',
			'twitter' => 'Twitter',
			'discord' => 'Discord',
			'reddit' => 'Reddit',
			'youtube' => 'Youtube',
			'twitch' => 'Twitch',
			'tumblr' => 'Tumblr',
			'snapchat' => 'Snapchat',
			'facebook' => 'Facebook',
			'production_date' => 'Production Date',
			'launch_date' => 'Launch Date',
			'price' => 'Price',
			'currency' => 'Currency',
			'public' => 'Public',
			'banner' => 'Game Banner',
			'cover' => 'Game Cover',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('team',$this->team,true);

		$criteria->compare('leader_id',$this->leader_id);

		$criteria->compare('status',$this->status);

		$criteria->compare('copyright',$this->copyright,true);

		$criteria->compare('version',$this->version,true);

		$criteria->compare('changes',$this->changes,true);

		$criteria->compare('date',$this->date,true);

		$criteria->compare('concept',$this->concept,true);

		$criteria->compare('features',$this->features,true);

		$criteria->compare('genre',$this->genre,true);

		$criteria->compare('audience',$this->audience,true);

		$criteria->compare('look',$this->look,true);

		$criteria->compare('progression',$this->progression,true);

		$criteria->compare('objectives',$this->objectives,true);

		$criteria->compare('flow',$this->flow,true);

		$criteria->compare('physics',$this->physics,true);

		$criteria->compare('movement',$this->movement,true);

		$criteria->compare('economy',$this->economy,true);

		$criteria->compare('combat',$this->combat,true);

		$criteria->compare('switches',$this->switches,true);

		$criteria->compare('pick',$this->pick,true);

		$criteria->compare('talk',$this->talk,true);

		$criteria->compare('read',$this->read,true);

		$criteria->compare('options',$this->options,true);

		$criteria->compare('save',$this->save,true);

		$criteria->compare('cheats',$this->cheats,true);

		$criteria->compare('backstory',$this->backstory,true);

		$criteria->compare('plot',$this->plot,true);

		$criteria->compare('license',$this->license,true);

		$criteria->compare('screen_flow',$this->screen_flow,true);

		$criteria->compare('HUD',$this->HUD,true);

		$criteria->compare('rendering',$this->rendering,true);

		$criteria->compare('camera',$this->camera,true);

		$criteria->compare('lighting',$this->lighting,true);

		$criteria->compare('controls',$this->controls,true);

		$criteria->compare('help',$this->help,true);

		$criteria->compare('target_hardware',$this->target_hardware,true);

		$criteria->compare('dev_enviroment',$this->dev_enviroment,true);

		$criteria->compare('dev_standards',$this->dev_standards,true);

		$criteria->compare('engine',$this->engine,true);

		$criteria->compare('network',$this->network,true);

		$criteria->compare('conventions',$this->conventions,true);

		$criteria->compare('style',$this->style,true);

		$criteria->compare('budget',$this->budget);

		$criteria->compare('monetization',$this->monetization,true);

		$criteria->compare('risks',$this->risks,true);

		$criteria->compare('marketing',$this->marketing,true);

		$criteria->compare('website',$this->website,true);

		$criteria->compare('twitter',$this->twitter,true);

		$criteria->compare('discord',$this->discord,true);

		$criteria->compare('reddit',$this->reddit,true);

		$criteria->compare('youtube',$this->youtube,true);

		$criteria->compare('twitch',$this->twitch,true);

		$criteria->compare('tumblr',$this->tumblr,true);

		$criteria->compare('snapchat',$this->snapchat,true);

		$criteria->compare('facebook',$this->facebook,true);

		$criteria->compare('production_date',$this->production_date,true);

		$criteria->compare('launch_date',$this->launch_date,true);

		$criteria->compare('price',$this->price);

		$criteria->compare('currency',$this->currency,true);

		$criteria->compare('public',$this->public);

		return new CActiveDataProvider('Project', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}