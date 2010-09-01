<?php

/**
 * This is the model class for table "conf_fonts".
 *
 * The followings are the available columns in table 'conf_fonts':
 * @property integer $id
 * @property string $section
 * @property string $size
 * @property integer $bold
 * @property integer $italics
 * @property integer $underline
 * @property integer $conf_gen_id
 */
class ConfFonts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfFonts the static model class
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
		return 'conf_fonts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('section, conf_gen_id', 'required'),
			array('bold, italics, underline, conf_gen_id', 'numerical', 'integerOnly'=>true),
			array('section', 'length', 'max'=>255),
			array('size', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, section, size, bold, italics, underline, conf_gen_id', 'safe', 'on'=>'search'),
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
			'section' => 'Section',
			'size' => 'Size',
			'bold' => 'Bold',
			'italics' => 'Italics',
			'underline' => 'Underline',
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

		$criteria->compare('section',$this->section,true);

		$criteria->compare('size',$this->size,true);

		$criteria->compare('bold',$this->bold);

		$criteria->compare('italics',$this->italics);

		$criteria->compare('underline',$this->underline);

		$criteria->compare('conf_gen_id',$this->conf_gen_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}