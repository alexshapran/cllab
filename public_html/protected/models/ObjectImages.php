<?php

/**
 * This is the model class for table "object_images".
 *
 * The followings are the available columns in table 'object_images':
 * @property integer $id
 * @property integer $object_id
 * @property integer $image_id
 * @property string $caption
 * @property string $rank
 */
class ObjectImages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ObjectImages the static model class
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
		return 'object_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('object_id, image_id', 'required'),
			array('object_id, image_id', 'numerical', 'integerOnly'=>true),
			array('caption, rank', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, object_id, image_id, caption, rank', 'safe', 'on'=>'search'),
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
			'image' => array(self::BELONGS_TO, 'Image', 'image_id'),
			'object' => array(self::BELONGS_TO, 'Object', 'object_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'object_id' => 'Object',
			'image_id' => 'Image',
			'caption' => 'Caption',
			'rank' => 'Rank',
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

		$criteria->compare('object_id',$this->object_id);

		$criteria->compare('image_id',$this->image_id);

		$criteria->compare('caption',$this->caption,true);

		$criteria->compare('rank',$this->rank,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}