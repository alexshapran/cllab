<?php

/**
 * This is the model class for table "conf_general".
 *
 * The followings are the available columns in table 'conf_general':
 * @property integer $id
 * @property string $company_name
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $default_currency
 * @property string $header
 * @property string $footer
 * @property string $privacy_policy
 * @property string $global_font_type
 * @property integer $account_id
 * @property string $attr_exp_order
 */
class ConfGeneral extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfGeneral the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'conf_general';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(	'global_font_type, company_name, phone, email, address, header, footer,
					 city, state, zip, default_currency', 'required'),
			array('account_id', 'numerical', 'integerOnly'=>true),
			array('company_name, phone, email, website, address, city, state', 'length', 'max'=>255),
			array('zip, default_currency', 'length', 'max'=>45),
			array('email', 'email'),
			array('header, footer, privacy_policy, attr_exp_order', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(	'id, company_name, phone, email, website, address, city, state, 
					zip, default_currency, header, footer, privacy_policy, global_font_type, 
					account_id, attr_exp_order',
					'safe', 'on'=>'search'),
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
			'confCategories' => array(self::HAS_MANY, 'ConfCategory', 'conf_gen_id'),
			'confDisclaimerSettings' => array(self::HAS_MANY, 'ConfDisclaimerSettings', 'conf_gen_id'),
			'confFonts' => array(self::HAS_MANY, 'ConfFonts', 'conf_gen_id'),
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'confGlossarySettings' => array(self::HAS_MANY, 'ConfGlossarySettings', 'conf_gen_id'),
			'confImgs' => array(self::HAS_MANY, 'ConfImg', 'conf_gen_id'),
			'confPurposes' => array(self::HAS_MANY, 'ConfPurpose', 'conf_gen_id'),
			'confResumeSettings' => array(self::HAS_MANY, 'ConfResumeSettings', 'conf_gen_id'),
			'confScopeOfSettings' => array(self::HAS_MANY, 'ConfScopeOfSettings', 'conf_gen_id'),
			'confSignCertTexts' => array(self::HAS_MANY, 'ConfSignCertText', 'conf_general_id'),
			'confTypeOfValues' => array(self::HAS_MANY, 'ConfTypeOfValue', 'conf_gen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_name' => 'Company Name',
			'phone' => 'Phone',
			'email' => 'Email',
			'website' => 'Website',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'default_currency' => 'Default Currency',
			'header' => 'Header',
			'footer' => 'Footer',
			'privacy_policy' => 'Privacy Policy',
			'global_font_type' => 'Global Font Type',
			'account_id' => 'Account',
			'attr_exp_order' => 'Attr Exp Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('company_name',$this->company_name,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('website',$this->website,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('state',$this->state,true);

		$criteria->compare('zip',$this->zip,true);

		$criteria->compare('default_currency',$this->default_currency,true);

		$criteria->compare('header',$this->header,true);

		$criteria->compare('footer',$this->footer,true);

		$criteria->compare('privacy_policy',$this->privacy_policy,true);

		$criteria->compare('global_font_type',$this->global_font_type,true);

		$criteria->compare('account_id',$this->account_id);

		$criteria->compare('attr_exp_order',$this->attr_exp_order,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public static function getConfig()
	{
		return ConfGeneral::model()->findByPk(Yii::app()->user->getConfigId());
	}
	
	
	/**
	 * function returns ScopeOfSettings according to config_general->id of current user
	 * @param: int $id, not required.
	 * @return: array(), if $id - returns object (with this $id);
	 */
	public static function getScopeOfSettings($id = NULL)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "conf_gen_id = ".Yii::app()->user->getConfigId();
		if($id != NULL)
		{
			$criteria->addCondition("id = $id", 'AND');
			return ConfScopeOfSettings::model()->find($criteria);	
		}
			return ConfScopeOfSettings::model()->findAll($criteria);
		
		
	}
	
	/**
	 * function returns ConfCategories according to config_general->id of current user
	 * @param: int $id, not required.
	 * @return: array(), if $id - returns object (with this $id);
	 */
	public static function getConfCategories($id = NULL)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "conf_gen_id = ".Yii::app()->user->getConfigId();

		return ConfCategory::model()->findAll($criteria);
	}
	
	public static function getDisclaimerSettings()
	{
		return ConfDisclaimerSettings::model()->findAllByAttributes(array('conf_gen_id'=>Yii::app()->user->getConfigId()));
	}
}