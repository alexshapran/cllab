<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $id
 * @property string $name
 * @property string $name_on_report
 * @property string $date_added
 * @property string $company
 * @property string $email
 * @property string $website
 * @property string $address
 * @property string $address2
 * @property string $city
 * @property integer $zip
 * @property string $phone
 * @property string $fax
 * @property string $cell
 * @property string $note
 */
class Client extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Client the static model class
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
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zip', 'numerical', 'integerOnly'=>true),
			array('name, email', 'required'),
			array('email', 'email'),
			array('phone, fax', 'length', 'max'=>45),
			array('date_added, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, name_on_report, date_added, company, email, website, address, address2, city, zip, phone, fax, cell, note', 'safe', 'on'=>'search'),
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
			'appraisals' => array(self::HAS_MANY, 'Appraisal', 'client_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'name_on_report' => 'Name On Report',
			'date_added' => 'Date Added',
			'company' => 'Company',
			'email' => 'Email',
			'website' => 'Website',
			'address' => 'Address',
			'address2' => 'Address2',
			'city' => 'City',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'cell' => 'Cell',
			'note' => 'Note',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('name_on_report',$this->name_on_report,true);

		$criteria->compare('date_added',$this->date_added,true);

		$criteria->compare('company',$this->company,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('website',$this->website,true);

		$criteria->compare('address',$this->address,true);

		$criteria->compare('address2',$this->address2,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('zip',$this->zip);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('fax',$this->fax,true);

		$criteria->compare('cell',$this->cell,true);

		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAllAttributes()
	{
		$model = new Client;
		$arKeys = array_keys($model->attributes);
		$arText = array();
		foreach($arKeys as $key)
			$arText[] = Controller::nameFromAttribute($key);

		return array_combine($arKeys, $arText);
	}
}