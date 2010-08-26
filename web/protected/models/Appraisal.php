<?php

/**
 * This is the model class for table "appraisal".
 *
 * The followings are the available columns in table 'appraisal':
 * @property integer $id
 * @property string $date_created
 * @property integer $client_id
 */
class Appraisal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Appraisal the static model class
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
		return 'appraisal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_created, client_id', 'required'),
			array('client_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date_created, client_id', 'safe', 'on'=>'search'),
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
			'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
			'basicReportParameters' => array(self::HAS_MANY, 'BasicReportParameters', 'appraisal_id'),
			'objects' => array(self::HAS_MANY, 'Object', 'appraisal_id'),
			'reportBiohistContexts' => array(self::HAS_MANY, 'ReportBiohistContext', 'appraisal_id'),
			'reportCoverLetters' => array(self::HAS_MANY, 'ReportCoverLetter', 'appraisal_id'),
			'reportDisclaimers' => array(self::HAS_MANY, 'ReportDisclaimers', 'appraisal_id'),
			'reportMarketAnalysises' => array(self::HAS_MANY, 'ReportMarketAnalysis', 'appraisal_id'),
			'reportResumes' => array(self::HAS_MANY, 'ReportResume', 'appraisal_id'),
			'reportScopeWorks' => array(self::HAS_MANY, 'ReportScopeWork', 'appraisal_id'),
			'reportSignedCerts' => array(self::HAS_MANY, 'ReportSignedCert', 'appraisal_id'),
			'sdAppendices' => array(self::HAS_MANY, 'SdAppendices', 'appraisal_id'),
			'sdBibliographys' => array(self::HAS_MANY, 'SdBibliography', 'appraisal_id'),
			'sdExports' => array(self::HAS_MANY, 'SdExport', 'appraisal_id'),
			'sdGlossaries' => array(self::HAS_MANY, 'SdGlossary', 'appraisal_id'),
			'sdPrivacyPolicys' => array(self::HAS_MANY, 'SdPrivacyPolicy', 'appraisal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_created' => 'Date Created',
			'client_id' => 'Client',
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

		$criteria->compare('date_created',$this->date_created,true);

		$criteria->compare('client_id',$this->client_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}