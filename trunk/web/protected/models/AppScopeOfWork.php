<?php

/**
 * This is the model class for table "app_scope_of_work".
 *
 * The followings are the available columns in table 'app_scope_of_work':
 * @property integer $id
 * @property integer $active
 * @property string $sec_title
 * @property string $problem_to_solve
 * @property string $categories
 * @property string $client
 * @property string $owner
 * @property string $int_use
 * @property string $type_of_value
 * @property string $def_of_value
 * @property string $source_of_def_value
 * @property string $app_to_value
 * @property string $mark_exam
 * @property string $type_of_app_report
 * @property string $eff_val_date
 * @property string $ass_cond
 * @property string $ext_of_phys_insp
 * @property string $meth_of_research
 * @property string $photography
 * @property string $uspap_comp
 * @property string $assumps
 * @property string $extr_assumps
 * @property string $hypoth_cond
 */
class AppScopeOfWork extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AppScopeOfWork the static model class
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
		return 'app_scope_of_work';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('active', 'numerical', 'integerOnly'=>true),
			array('sec_title, client, owner, int_use, type_of_value, source_of_def_value, eff_val_date, ass_cond, ext_of_phys_insp, photography, assumps, extr_assumps, hypoth_cond', 'length', 'max'=>255),
			array('problem_to_solve, categories, def_of_value, app_to_value, mark_exam, type_of_app_report, meth_of_research, uspap_comp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, active, sec_title, problem_to_solve, categories, client, owner, int_use, type_of_value, def_of_value, source_of_def_value, app_to_value, mark_exam, type_of_app_report, eff_val_date, ass_cond, ext_of_phys_insp, meth_of_research, photography, uspap_comp, assumps, extr_assumps, hypoth_cond', 'safe', 'on'=>'search'),
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
			'appraisals' => array(self::HAS_MANY, 'Appraisal', 'app_scope_of_work_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'active' => 'Active',
			'sec_title' => 'Sec Title',
			'problem_to_solve' => 'Problem To Solve',
			'categories' => 'Categories',
			'client' => 'Client',
			'owner' => 'Owner',
			'int_use' => 'Int Use',
			'type_of_value' => 'Type Of Value',
			'def_of_value' => 'Def Of Value',
			'source_of_def_value' => 'Source Of Def Value',
			'app_to_value' => 'App To Value',
			'mark_exam' => 'Mark Exam',
			'type_of_app_report' => 'Type Of App Report',
			'eff_val_date' => 'Eff Val Date',
			'ass_cond' => 'Ass Cond',
			'ext_of_phys_insp' => 'Ext Of Phys Insp',
			'meth_of_research' => 'Meth Of Research',
			'photography' => 'Photography',
			'uspap_comp' => 'Uspap Comp',
			'assumps' => 'Assumps',
			'extr_assumps' => 'Extr Assumps',
			'hypoth_cond' => 'Hypoth Cond',
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

		$criteria->compare('active',$this->active);

		$criteria->compare('sec_title',$this->sec_title,true);

		$criteria->compare('problem_to_solve',$this->problem_to_solve,true);

		$criteria->compare('categories',$this->categories,true);

		$criteria->compare('client',$this->client,true);

		$criteria->compare('owner',$this->owner,true);

		$criteria->compare('int_use',$this->int_use,true);

		$criteria->compare('type_of_value',$this->type_of_value,true);

		$criteria->compare('def_of_value',$this->def_of_value,true);

		$criteria->compare('source_of_def_value',$this->source_of_def_value,true);

		$criteria->compare('app_to_value',$this->app_to_value,true);

		$criteria->compare('mark_exam',$this->mark_exam,true);

		$criteria->compare('type_of_app_report',$this->type_of_app_report,true);

		$criteria->compare('eff_val_date',$this->eff_val_date,true);

		$criteria->compare('ass_cond',$this->ass_cond,true);

		$criteria->compare('ext_of_phys_insp',$this->ext_of_phys_insp,true);

		$criteria->compare('meth_of_research',$this->meth_of_research,true);

		$criteria->compare('photography',$this->photography,true);

		$criteria->compare('uspap_comp',$this->uspap_comp,true);

		$criteria->compare('assumps',$this->assumps,true);

		$criteria->compare('extr_assumps',$this->extr_assumps,true);

		$criteria->compare('hypoth_cond',$this->hypoth_cond,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}