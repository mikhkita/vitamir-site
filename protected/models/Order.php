<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property string $id
 * @property string $date
 * @property string $user_id
 * @property integer $delivery
 * @property integer $payment
 * @property string $location
 * @property string $type
 * @property integer $price
 * @property integer $day
 * @property integer $state
 */
class Order extends CActiveRecord
{
	public $delivery = array("Данные не указаны","Самовывоз","Курьерская доставка");
	public $payment = array("Данные не указаны","Наличными","Банковской картой");
	public $states = array("Не оформлен","Новый","Оплачено","Доставлено");
	public $types = array(
		"m-1" => "Мужчине для похудения",
		"m-2" => "Мужчине для набора массы",
		"m-3" => "Мужчине для поддержания формы",
		"w-1" => "Женщине для похудения",
		"w-2" => "Женщине для набора массы",
		"w-3" => "Женщине для поддержания формы",
	);

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, type, price, day', 'required'),
			array('delivery, payment, price, day, state', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('location', 'length', 'max'=>255),
			array('type', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, user_id, delivery, payment, location, type, price, day, state', 'safe', 'on'=>'search'),
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
			'dishes' => array(self::HAS_MANY, 'OrderDish', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Дата',
			'user_id' => 'Пользователь',
			'delivery' => 'Доставка',
			'payment' => 'Оплата',
			'location' => 'Адрес',
			'type' => 'Тип',
			'price' => 'Цена',
			'day' => 'Количество дней',
			'state' => 'Статус',
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
	public function beforeDelete() {
		OrderDish::model()->deleteAll("order_id=".$this->id);
        return true;
    }
    
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('delivery',$this->delivery);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('day',$this->day);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
