<?php

/**
 * This is the model class for table "report_disclaimers_statements".
 *
 * The followings are the available columns in table 'report_disclaimers_statements':
 * @property integer $id
 * @property integer $report_disclaimers_id
 * @property string $statment
 * @property string $value
 * @property integer $is_checked
 */
class ReportDisclaimersStatements extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ReportDisclaimersStatements the static model class
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
		return 'report_disclaimers_statements';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('report_disclaimers_id', 'required'),
			array('report_disclaimers_id, is_checked', 'numerical', 'integerOnly'=>true),
			array('statment', 'length', 'max'=>1),
			array('value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, report_disclaimers_id, statment, value, is_checked', 'safe', 'on'=>'search'),
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
			'reportDisclaimers' => array(self::BELONGS_TO, 'ReportDisclaimers', 'report_disclaimers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'report_disclaimers_id' => 'Report Disclaimers',
			'statment' => 'Statment',
			'value' => 'Value',
			'is_checked' => 'Is Checked',
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

		$criteria->compare('report_disclaimers_id',$this->report_disclaimers_id);

		$criteria->compare('statment',$this->statment,true);

		$criteria->compare('value',$this->value,true);

		$criteria->compare('is_checked',$this->is_checked);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}