<?php

/**
 * This is the model class for table "conf_disclaimer_value".
 *
 * The followings are the available columns in table 'conf_disclaimer_value':
 * @property integer $id
 * @property string $value
 * @property integer $conf_disc_settings
 */
class ConfDisclaimerValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfDisclaimerValue the static model class
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
		return 'conf_disclaimer_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conf_disc_settings', 'required'),
			array('conf_disc_settings', 'numerical', 'integerOnly'=>true),
			array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, value, conf_disc_settings', 'safe', 'on'=>'search'),
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
			'confDiscSettings0' => array(self::BELONGS_TO, 'ConfDisclaimerSettings', 'conf_disc_settings'),
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
			'conf_disc_settings' => 'Conf Disc Settings',
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

		$criteria->compare('conf_disc_settings',$this->conf_disc_settings);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}