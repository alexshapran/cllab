<?php

/**
 * This is the model class for table "conf_img".
 *
 * The followings are the available columns in table 'conf_img':
 * @property integer $id
 * @property string $size
 * @property string $max_height
 * @property string $max_width
 * @property integer $conf_gen_id
 */
class ConfImg extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfImg the static model class
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
		return 'conf_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('size, conf_gen_id, max_height, max_width', 'required'),
			array('conf_gen_id, max_height, max_width', 'numerical', 'integerOnly'=>true),
			array('size, max_height, max_width', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, size, max_height, max_width, conf_gen_id', 'safe', 'on'=>'search'),
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
			'confGen' => array(self::BELONGS_TO, 'ConfGeneral', 'conf_gen_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'size' => 'Size',
			'max_height' => 'Max Height',
			'max_width' => 'Max Width',
			'conf_gen_id' => 'Conf Gen',
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

		$criteria->compare('size',$this->size,true);

		$criteria->compare('max_height',$this->max_height,true);

		$criteria->compare('max_width',$this->max_width,true);

		$criteria->compare('conf_gen_id',$this->conf_gen_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}