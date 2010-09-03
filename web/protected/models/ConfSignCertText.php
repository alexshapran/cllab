<?php

/**
 * This is the model class for table "conf_sign_cert_text".
 *
 * The followings are the available columns in table 'conf_sign_cert_text':
 * @property integer $id
 * @property string $value
 * @property integer $conf_general_id
 * @property integer $conf_sign_cert_settings_id
 */
class ConfSignCertText extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfSignCertText the static model class
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
		return 'conf_sign_cert_text';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conf_general_id, conf_sign_cert_settings_id', 'required'),
			array('conf_general_id, conf_sign_cert_settings_id', 'numerical', 'integerOnly'=>true),
			array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, value, conf_general_id, conf_sign_cert_settings_id', 'safe', 'on'=>'search'),
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
			'confSignCertSettings' => array(self::BELONGS_TO, 'ConfSignCertSettings', 'conf_sign_cert_settings_id'),
			'confGeneral' => array(self::BELONGS_TO, 'ConfGeneral', 'conf_general_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'value' => 'Value',
			'conf_general_id' => 'Conf General',
			'conf_sign_cert_settings_id' => 'Conf Sign Cert Settings',
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

		$criteria->compare('value',$this->value,true);

		$criteria->compare('conf_general_id',$this->conf_general_id);

		$criteria->compare('conf_sign_cert_settings_id',$this->conf_sign_cert_settings_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}