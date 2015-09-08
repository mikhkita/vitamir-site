<?php

/**
 * This is the model class for table "order_dish".
 *
 * The followings are the available columns in table 'order_dish':
 * @property string $order_id
 * @property integer $dish_id
 * @property integer $daytime_id
 * @property integer $count
 * @property integer $day
 */
class OrderDish extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_dish';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, dish_id, daytime_id, count, day', 'required'),
			array('dish_id, daytime_id, count, day', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_id, dish_id, daytime_id, count, day', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
			'dish' => array(self::BELONGS_TO, 'Dish', 'dish_id'),
			'daytime' => array(self::HAS_MANY, 'Daytime', 'daytime_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'Заказ',
			'dish_id' => 'Блюдо',
			'daytime_id' => 'Время дня',
			'count' => 'Количество',
			'day' => 'День',
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

		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('dish_id',$this->dish_id);
		$criteria->compare('daytime_id',$this->daytime_id);
		$criteria->compare('count',$this->count);
		$criteria->compare('day',$this->day);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderDish the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
