<?php

/**
 * This is the model class for table "appraisal".
 *
 * The followings are the available columns in table 'appraisal':
 * @property integer $id
 * @property string $name
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
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, date_created, client_id', 'safe', 'on'=>'search'),
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
			'basicReportParameters' => array(self::BELONGS_TO, 'BasicReportParameters', 'basic_report_parameters_id'),
			'objects' => array(self::HAS_MANY, 'Object', 'appraisal_id'),
			'reportBiohistContext' => array(self::BELONGS_TO, 'ReportBiohistContext', 'report_biohist_context_id'),
			'reportCoverLetter' => array(self::BELONGS_TO, 'ReportCoverLetter', 'report_cover_letter_id'),
			'reportDisclaimers' => array(self::HAS_MANY, 'ReportDisclaimers', 'appraisal_id'),
			'reportMarketanalysis' => array(self::BELONGS_TO, 'ReportMarketAnalysis', 'report_market_analysis_id'),
			'reportResumes' => array(self::HAS_MANY, 'ReportResume', 'appraisal_id'),
			'reportScopeWorks' => array(self::HAS_MANY, 'ReportScopeWork', 'appraisal_id'),
			'reportSignedCerts' => array(self::HAS_MANY, 'ReportSignedCert', 'appraisal_id'),
			'sdAppendices' => array(self::HAS_MANY, 'SdAppendices', 'appraisal_id'),
			'sdBibliography' => array(self::BELONGS_TO, 'SdBibliography', 'sd_bibliography_id'),
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
			'name' => 'Name',
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

		$criteria->compare('name',$this->name,true);

		$criteria->compare('date_created',$this->date_created,true);

		$criteria->compare('client_id',$this->client_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>false,
			
		));
	}
	
	
	
	public function beforeSave() {
		$this->alias = Controller::createAlias($this->name);
		return parent::beforeSave();
	}
	
	/**
	 * @return model BasicReportParameters
	 */
	public function getBasicParamsModel() {
		if(!$model = $this->basicReportParameters) {
			$model = new BasicReportParameters();
		}
		return $model;
	}
	
	public function findByAlias($alias) {
		return Appraisal::model()->findByAttributes(array('alias'=>$alias));
	}
	
	public function saveExportOrder($aObjects) {
		
		return true;
	}
	
	public static function getModel() {
		if(isset($_GET['id']))				
			$model = Appraisal::model()->findByAlias($_GET['id']);
		if(!$model && isset($_GET['id']))
			$model = Appraisal::model()->findByPk($_GET['id']);
		if($model===null)
			$model = new Appraisal;
		return $model;
	}
	
	public function createCoverLetter(){
		if(!$this->reportCoverLetter) {
			// create new model
			$obj = new ReportCoverLetter;
			$obj->is_active = 1;
			$obj->save(false);
			// save id 
			$this->report_cover_letter_id = $obj->id;
			$this->save(false);
			
			return $obj;
		}
		else
			return $this->reportCoverLetter;
	}
	
	public function createBiohistContext(){
		if(!$this->reportBiohistContext) {
			// create new model
			$obj = new ReportBiohistContext;
			$obj->is_active = 1;
			$obj->save(false);
			// save id 
			$this->report_biohist_context_id = $obj->id;
			$this->save(false);
			
			return $obj;
		}
		else
			return $this->reportBiohistContext;
	}
	
	public function createMarketAnalysis(){
		if(!$this->reportMarketanalysis) {
			// create new model
			$obj = new ReportMarketAnalysis;
			$obj->is_active = 1;
			$obj->save(false);
			// save id 
			$this->report_market_analysis_id = $obj->id;
			$this->save(false);
			
			return $obj;
		}
		else
			return $this->reportMarketanalysis;
	}
	
	public function createBibliography(){
		if(!$this->sdBibliography) {
			// create new model
			$obj = new SdBibliography;
			$obj->is_active = 1;
			$obj->save(false);
			// save id 
			$this->sd_bibliography_id = $obj->id;
			$this->save(false);
			
			return $obj;
		}
		else
			return $this->sdBibliography;
	}
	
	public function getPopulateProperty() {
		$arr = $this->getObjectsByOrder();
		$str = '';
		if($arr) {
			foreach($arr as $i => $obj) {
				$str .= $obj->literature;
			}
		}
		return $str;
	}
	
	public function getObjectsByOrder() {
		$criteria = new CDbCriteria;
		$criteria->condition = 'appraisal_id = ' . $this->id;
		$criteria->order = 'export_order ASC';
		$arr = Object::model()->findAll($criteria);
		return $arr;
	}
	
	
	
	public static function createNewLink(){
		return CHtml::link('Create New Appraisal', Yii::app()->createUrl('/appraisal/'));
	}
	
}
