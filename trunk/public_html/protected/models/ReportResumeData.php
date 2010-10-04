<?php

/**
 * This is the model class for table "report_resume_data".
 *
 * The followings are the available columns in table 'report_resume_data':
 * @property integer $id
 * @property integer $report_resume_id
 * @property string $text
 */
class ReportResumeData extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ReportResumeData the static model class
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
		return 'report_resume_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('report_resume_id', 'required'),
			array('report_resume_id', 'numerical', 'integerOnly'=>true),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, report_resume_id, text', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'report_resume_id' => 'Report Resume',
			'text' => 'Text',
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

		$criteria->compare('report_resume_id',$this->report_resume_id);

		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * 
	 * @param int $id if id empty create new
	 * @param int $resumeId
	 * @param text $str
	 */
	public static function saveDatat($id, $resumeId, $str) {
		if($id)
			$obj = ReportResumeData::model()->findByPk($id);
		else 
			$obj = new ReportResumeData;
		$obj->report_resume_id = $resumeId;
		$obj->text = $str;
		$obj->save();
	}
}