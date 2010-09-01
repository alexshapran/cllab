<?php

/**
 * This is the model class for table "conf_type_of_value".
 *
 * The followings are the available columns in table 'conf_type_of_value':
 * @property integer $id
 * @property string $name
 * @property string $definition
 * @property string $source
 * @property integer $conf_gen_id
 */
class ConfTypeOfValue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfTypeOfValue the static model class
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
		return 'conf_type_of_value';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conf_gen_id', 'required'),
			array('conf_gen_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('definition, source', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, definition, source, conf_gen_id', 'safe', 'on'=>'search'),
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
			'basicReportParameters' => array(self::HAS_MANY, 'BasicReportParameters', 'types_of_value_id'),
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
			'name' => 'Name',
			'definition' => 'Definition',
			'source' => 'Source',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('definition',$this->definition,true);

		$criteria->compare('source',$this->source,true);

		$criteria->compare('conf_gen_id',$this->conf_gen_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}