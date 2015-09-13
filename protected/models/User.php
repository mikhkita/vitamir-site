<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $usr_id
 * @property string $usr_login
 * @property string $usr_password
 * @property string $usr_name
 * @property string $usr_surname
 * @property string $usr_middle
 * @property string $usr_email
 * @property string $usr_rol_id
 * @property string $usr_promo
 * @property integer $usr_discount
 * @property integer $usr_pers_discount
 * @property string $usr_address
 */
class User extends CActiveRecord
{	
	const ROLE_MANAGER = 'manager';
	const ROLE_ADMIN = 'admin';
	const ROLE_ROOT = 'root';

	const STATE_ACTIVE = 1;
	const STATE_DISABLED = 0;

	public $prevRole = NULL;
	public $newPass = NULL;
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
			array('usr_login, usr_password, usr_rol_id', 'required'),
			array('usr_discount, usr_pers_discount', 'numerical', 'integerOnly'=>true),
			array('usr_login, usr_password, usr_email', 'length', 'max'=>128),
			array('usr_name, usr_surname, usr_middle, usr_address', 'length', 'max'=>255),
			array('usr_rol_id, usr_promo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usr_id, usr_login, usr_password, usr_name, usr_surname, usr_middle, usr_email, usr_rol_id, usr_promo, usr_discount, usr_pers_discount, usr_address', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Role', 'usr_rol_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usr_id' => 'ID',
			'usr_login' => 'Логин',
			'usr_password' => 'Пароль',
			'usr_name' => 'Имя',
			'usr_surname' => 'Фамилия',
			'usr_middle' => 'Отчество',
			'usr_email' => 'E-mail',
			'usr_rol_id' => 'Роль',
			'usr_promo' => 'Промо-код',
			'usr_discount' => 'Скидка',
			'usr_pers_discount' => 'Персональная скидка',
			'usr_address' => 'Адрес',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('usr_id',$this->usr_id);
		$criteria->compare('usr_login',$this->usr_login,true);
		$criteria->compare('usr_password',$this->usr_password,true);
		$criteria->compare('usr_name',$this->usr_name,true);
		$criteria->compare('usr_surname',$this->usr_surname,true);
		$criteria->compare('usr_middle',$this->usr_middle,true);
		$criteria->compare('usr_email',$this->usr_email,true);
		$criteria->compare('usr_rol_id',$this->usr_rol_id,true);
		$criteria->compare('usr_promo',$this->usr_promo,true);
		$criteria->compare('usr_discount',$this->usr_discount);
		$criteria->compare('usr_pers_discount',$this->usr_pers_discount);
		$criteria->compare('usr_address',$this->usr_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave() {
		parent::beforeSave();
		if( $this->newPass != NULL ) $this->usr_password = md5($this->usr_password."eduplan");

		$this->newPass = NULL;

		if( ($this->role->code == User::ROLE_ADMIN || $this->role->code == User::ROLE_ROOT) && Controller::getUserRoleFromModel() != User::ROLE_ROOT && Controller::getUserRoleFromModel() != User::ROLE_ADMIN )
			throw new CHttpException(403,'Доступ запрещен');

		if( !isset($this->prevRole) ) $this->prevRole = $this->role->code;
		return true;
	}

	public function afterSave() {
		parent::afterSave();
		//связываем нового пользователя с ролью
		$auth=Yii::app()->authManager;
		//предварительно удаляем старую связь
		$auth->revoke($this->prevRole, $this->usr_id);
		$auth->assign($this->role->code, $this->usr_id);
		$auth->save();
		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
