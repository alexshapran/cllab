<?php

/**
 * This is the model class for table "image".
 *
 * The followings are the available columns in table 'image':
 * @property integer $id
 * @property string $name
 * @property string $path
 */
class Image extends CActiveRecord
{
	public $_file; 
	/**
	 * Returns the static model of the specified AR class.
	 * @return Image the static model class
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
		return 'image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name, path', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, path', 'safe', 'on'=>'search'),
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
			'objectImages' => array(self::HAS_MANY, 'ObjectImages', 'image_id'),
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
			'path' => 'Path',
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

		$criteria->compare('path',$this->path,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function loadImage() {
		if (is_object($this->_file)) {
			$pathPrefix = Yii::app()->getBasePath().'/../uploads/images/';
			$fileName = $this->_file->getName();
			$fileFullName = $pathPrefix . $fileName;
			
			if (file_exists($fileFullName)) {
				$fileName = substr(md5(time()),0,10);
				$this->name = $fileName;
				$this->path = $pathPrefix;
				$fileFullName = $pathPrefix . $fileName;
			} 
			$this->_file->saveAs($fileFullName);
			if (file_exists($fileFullName)) {
//				   Thumb::createThumb($fileFullName,$fileFullName,270,202);	
//				$this->generateThumbnails();
			}
		} else {
			return false;
		}
	}
}