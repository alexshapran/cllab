<?php

/**
 * This is the model class for table "report_scope_work".
 *
 * The followings are the available columns in table 'report_scope_work':
 * @property integer $id
 * @property integer $appraisal_id
 * @property integer $is_active
 * @property string $text
 * @property string $title
 */
class ReportScopeWork extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ReportScopeWork the static model class
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
		return 'report_scope_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('appraisal_id', 'required'),
			array('appraisal_id, is_active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, appraisal_id, is_active, text, title', 'safe', 'on'=>'search'),
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
			'appraisal' => array(self::BELONGS_TO, 'Appraisal', 'appraisal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'appraisal_id' => 'Appraisal',
			'is_active' => 'Is Active',
			'text' => 'Text',
			'title' => 'Title',
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

		$criteria->compare('appraisal_id',$this->appraisal_id);

		$criteria->compare('is_active',$this->is_active);

		$criteria->compare('text',$this->text,true);

		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}