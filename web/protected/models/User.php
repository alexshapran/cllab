<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $password2
 * @property string $name
 * @property string $date_added
 * @property integer $account_id
 * @property integer $privilege_id
 */

class User extends CActiveRecord
{
	public $password_repeat; 	
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_id, privilege_id', 'required'),
			array('account_id, privilege_id', 'numerical', 'integerOnly'=>true),
			array('username, name', 'length', 'max'=>255),
			array('username','required'),
			
			array('password_repeat', 'required', 'on'=>'update'),
			array('password','compare', 'on'=>'update'),
			
			array('password', 'length', 'max'=>45),
			array('date_added', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, name, date_added, account_id, privilege_id', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'privilege' => array(self::BELONGS_TO, 'Privilege', 'privilege_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'password_repeat'=> 'Confirm',
			'name' => 'Name',
			'date_added' => 'Date Added',
			'account_id' => 'Account',
			'privilege_id' => 'Privilege',
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

		$criteria->compare('username',$this->username,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('date_added',$this->date_added,true);

		$criteria->compare('account_id',$this->account_id);

		$criteria->compare('privilege_id',$this->privilege_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}