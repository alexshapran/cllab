<?php

/**
 * This is the model class for table "app_signed_cert".
 *
 * The followings are the available columns in table 'app_signed_cert':
 * @property integer $id
 * @property integer $is_active
 * @property string $sect_title
 * @property string $intro_text
 * @property string $selected_values
 */
class AppSignedCert extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AppSignedCert the static model class
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
		return 'app_signed_cert';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('sect_title, intro_text, selected_values', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, is_active, sect_title, intro_text, selected_values', 'safe', 'on'=>'search'),
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
			'signedCert'=>array(self::HAS_MANY, 'Appraisal', 'app_signed_cert_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'is_active' => 'Active',
			'sect_title' => 'Sect Title',
			'intro_text' => 'Intro Text',
			'selected_values' => 'Selected Values',
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

		$criteria->compare('is_active',$this->is_active);

		$criteria->compare('sect_title',$this->sect_title,true);

		$criteria->compare('intro_text',$this->intro_text,true);

		$criteria->compare('selected_values',$this->selected_values,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}