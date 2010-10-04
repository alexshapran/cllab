<?php

/**
 * This is the model class for table "basic_report_parameters".
 *
 * The followings are the available columns in table 'basic_report_parameters':
 * @property integer $id
 * @property integer $appraisal_id
 * @property string $date_created
 * @property string $client_name
 * @property string $city
 * @property string $year
 * @property integer $purposes_id
 * @property integer $types_of_value_id
 * @property integer $types_of_report_id
 * @property string $primary_img_size_id
 * @property string $sec_img_size_id
 * @property string $currency_symbol
 * @property string $eximmination_dates
 * @property string $research_dates_from
 * @property string $reseach_dates_to
 * @property string $effective_valuation_date
 * @property string $issue_date_report
 * @property string $order_report_section
 */
class BasicReportParameters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BasicReportParameters the static model class
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
		return 'basic_report_parameters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('purposes_id, types_of_value_id, types_of_report_id', 'required'),
			array('purposes_id, types_of_value_id, types_of_report_id', 'numerical', 'integerOnly'=>true),
			array('client_name, city, year', 'length', 'max'=>255),
			array('primary_img_size_id, sec_img_size_id', 'length', 'max'=>6),
			array('currency_symbol, order_report_section', 'length', 'max'=>45),
			array('value, eximmination_dates, research_dates_from, reseach_dates_to, effective_valuation_date, issue_date_report, date_type', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, appraisal_id, date_created, client_name, city, year, purposes_id, types_of_value_id, types_of_report_id, primary_img_size_id, sec_img_size_id, currency_symbol, eximmination_dates, research_dates_from, reseach_dates_to, effective_valuation_date, issue_date_report, order_report_section', 'safe', 'on'=>'search'),
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
			'purposes' => array(self::BELONGS_TO, 'ConfPurpose', 'purposes_id'),
			'typesOfReport' => array(self::BELONGS_TO, 'TypesOfReport', 'types_of_report_id'),
			'typesOfValue' => array(self::BELONGS_TO, 'TypesOfValue', 'types_of_value_id'),
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
			'date_created' => 'Date Created',
			'client_name' => 'Client Name',
			'city' => 'City',
			'year' => 'Year',
			'purposes_id' => 'Purposes',
			'types_of_value_id' => 'Types Of Value',
			'types_of_report_id' => 'Types Of Report',
			'primary_img_size_id' => 'Max. Image Size (Primary)',
			'sec_img_size_id' => 'Max. Image Size (Sec)',
			'currency_symbol' => 'Currency Symbol',
			'eximmination_dates' => 'Eximmination Dates',
			'research_dates_from' => 'Research Dates From',
			'reseach_dates_to' => 'Reseach Dates To',
			'effective_valuation_date' => 'Effective Valuation Date',
			'issue_date_report' => 'Issue Date Report',
			'order_report_section' => 'Order Report Section',
			'value'=>'Value Used',
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

		$criteria->compare('date_created',$this->date_created,true);

		$criteria->compare('client_name',$this->client_name,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('year',$this->year,true);

		$criteria->compare('purposes_id',$this->purposes_id);

		$criteria->compare('types_of_value_id',$this->types_of_value_id);

		$criteria->compare('types_of_report_id',$this->types_of_report_id);

		$criteria->compare('primary_img_size_id',$this->primary_img_size_id,true);

		$criteria->compare('sec_img_size_id',$this->sec_img_size_id,true);

		$criteria->compare('currency_symbol',$this->currency_symbol,true);

		$criteria->compare('eximmination_dates',$this->eximmination_dates,true);

		$criteria->compare('research_dates_from',$this->research_dates_from,true);

		$criteria->compare('reseach_dates_to',$this->reseach_dates_to,true);

		$criteria->compare('effective_valuation_date',$this->effective_valuation_date,true);

		$criteria->compare('issue_date_report',$this->issue_date_report,true);

		$criteria->compare('order_report_section',$this->order_report_section,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * create correct date format
	 */
	public function prepareDateFormat() {
		$sFormat = 'Y-m-d';
		if(isset($this->date_created))
			$this->date_created = date($sFormat, strtotime($this->date_created));
			
		if(isset($this->research_dates_from))
			$this->research_dates_from = date($sFormat, strtotime($this->research_dates_from));
			
		if(isset($this->reseach_dates_to))
			$this->reseach_dates_to = date($sFormat, strtotime($this->reseach_dates_to));
			
		if(isset($this->effective_valuation_date))
			$this->effective_valuation_date = date($sFormat, strtotime($this->effective_valuation_date));
		
		if(isset($this->issue_date_report))
			$this->issue_date_report = date($sFormat, strtotime($this->issue_date_report));
				
	}
	
	/**
	 * getOrderList
	 * get array Order of Report Section with correct order
	 * @return array   
	 */
	public function getOrderList() {
		$arr = array();
		$aListData = CHtml::listData(ReportSections::model()->findAll(), 'id', 'name');
		if($this->order_report_section != '') {
			$aCurrentOrder = explode(",", $this->order_report_section);
			foreach($aCurrentOrder as $i){
				$arr["$i"] = $aListData[$i];	
			}	
		} else {
			$arr = $aListData;
		}
		return $arr;	
	}
}