<?php

/**
 * This is the model class for table "object".
 *
 * The followings are the available columns in table 'object':
 * @property integer $id
 * @property integer $appraisal_id
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property string $location
 * @property string $location1
 * @property string $location2
 * @property string $client_ret
 * @property string $value
 * @property string $value2
 * @property string $description
 * @property string $provenance
 * @property string $exhibited
 * @property string $literature
 * @property string $title
 * @property string $maker_artist
 * @property string $dimensions
 * @property string $medium
 * @property string $date_period
 * @property string $markings
 * @property string $condition
 * @property string $acquistion_cost
 * @property string $acqusition_date
 * @property string $acqusition_source
 * @property integer $is_active
 * @property string $notes
 */
class Object extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Object the static model class
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
		return 'object';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('appraisal_id, category_id, sub_category_id', 'required'),
			array('appraisal_id, category_id, sub_category_id, is_active', 'numerical', 'integerOnly'=>true),
			array('client_ret, value, value2', 'length', 'max'=>45),
			array('title, maker_artist, dimensions, medium, date_period, markings, condition, acqusition_cost, acqusition_source', 'length', 'max'=>255),
			array('location, location1, location2, description, provenance, exhibited, literature, acqusition_date, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, appraisal_id, category_id, sub_category_id, location, location1, location2, client_ret, value, value2, description, provenance, exhibited, literature, title, maker_artist, dimensions, medium, date_period, markings, condition, acquistion_cost, acqusition_date, acqusition_source, is_active, notes', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'ConfCategory', 'category_id', 'alias'=>'_category'),
			'subCategory' => array(self::BELONGS_TO, 'Category', 'sub_category_id'),
			'objectImages' => array(self::HAS_MANY, 'ObjectImages', 'object_id'),
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
			'category_id' => 'Category',
			'sub_category_id' => 'Sub Category',
			'location' => 'Location',
			'location1' => 'Location1',
			'location2' => 'Location2',
			'client_ret' => 'Client Ret',
			'value' => 'Value',
			'value2' => 'Value2',
			'description' => 'Description',
			'provenance' => 'Provenance',
			'exhibited' => 'Exhibited',
			'literature' => 'Literature',
			'title' => 'Title',
			'maker_artist' => 'Maker Artist',
			'dimensions' => 'Dimensions',
			'medium' => 'Medium',
			'date_period' => 'Date Period',
			'markings' => 'Markings',
			'condition' => 'Condition',
			'acquistion_cost' => 'Acquistion Cost',
			'acqusition_date' => 'Acqusition Date',
			'acqusition_source' => 'Acqusition Source',
			'is_active' => 'Is Active',
			'notes' => 'Notes',
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

		$criteria->compare('category_id',$this->category_id);

		$criteria->compare('sub_category_id',$this->sub_category_id);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('location1',$this->location1,true);

		$criteria->compare('location2',$this->location2,true);

		$criteria->compare('client_ret',$this->client_ret,true);

		$criteria->compare('value',$this->value,true);

		$criteria->compare('value2',$this->value2,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('provenance',$this->provenance,true);

		$criteria->compare('exhibited',$this->exhibited,true);

		$criteria->compare('literature',$this->literature,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('maker_artist',$this->maker_artist,true);

		$criteria->compare('dimensions',$this->dimensions,true);

		$criteria->compare('medium',$this->medium,true);

		$criteria->compare('date_period',$this->date_period,true);

		$criteria->compare('markings',$this->markings,true);

		$criteria->compare('condition',$this->condition,true);

		$criteria->compare('acquistion_cost',$this->acquistion_cost,true);

		$criteria->compare('acqusition_date',$this->acqusition_date,true);

		$criteria->compare('acqusition_source',$this->acqusition_source,true);

		$criteria->compare('is_active',$this->is_active);

		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * @return array
	 */
	static public function getSearchField() {
		$aField = Yii::app()->params['attributeExportOrder'];
		$arr = array('all'=>'Search All field', 'id'=>'Search ID');
		foreach($aField as $k => $v) {
			$arr["$k"] = "Search " . $v;	
		}
		unset($arr['comparables']);
		return $arr;
	}
}