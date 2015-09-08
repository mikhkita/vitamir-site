<?php

/**
 * This is the model class for table "dish".
 *
 * The followings are the available columns in table 'dish':
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property double $m_1
 * @property double $m_2
 * @property double $m_3
 * @property double $w_1
 * @property double $w_2
 * @property double $w_3
 * @property double $fat
 * @property double $protein
 * @property double $carbohydrate
 * @property double $calories
 * @property double $price
 * @property double $action
 * @property string $category_id
 * @property string $daytime_id
 */
class Dish extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dish';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image, description, m_1, m_2, m_3, w_1, w_2, w_3, fat, protein, carbohydrate, calories, price, category_id, daytime_id', 'required'),
			array('m_1, m_2, m_3, w_1, w_2, w_3, fat, protein, carbohydrate, calories, price, action', 'numerical'),
			array('name, image', 'length', 'max'=>255),
			array('category_id', 'length', 'max'=>11),
			array('daytime_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, image, description, m_1, m_2, m_3, w_1, w_2, w_3, fat, protein, carbohydrate, calories, price, action, category_id, daytime_id', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'daytime' => array(self::BELONGS_TO, 'Daytime', 'daytime_id'),
			'sets' => array(self::HAS_MANY, 'DishSet', 'dish_id','order'=>'sort'),
			'orders' => array(self::HAS_MANY, 'OrderDish', 'dish_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'image' => 'Фотография',
			'description' => 'Описание',
			'm_1' => 'Для похудения',
			'm_2' => 'Для набора массы',
			'm_3' => 'Для поддержания формы',
			'w_1' => 'Для похудения',
			'w_2' => 'Для набора массы',
			'w_3' => 'Для поддержания формы',
			'fat' => 'Жиры в порции',
			'protein' => 'Белки в порции',
			'carbohydrate' => 'Углеводы в порции',
			'calories' => 'Килокалории в порции',
			'price' => 'Цена за порцию',
			'action' => 'Акция',
			'category_id' => 'Категория',
			'daytime_id' => 'Время суток',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('m_1',$this->m_1);
		$criteria->compare('m_2',$this->m_2);
		$criteria->compare('m_3',$this->m_3);
		$criteria->compare('w_1',$this->w_1);
		$criteria->compare('w_2',$this->w_2);
		$criteria->compare('w_3',$this->w_3);
		$criteria->compare('fat',$this->fat);
		$criteria->compare('protein',$this->protein);
		$criteria->compare('carbohydrate',$this->carbohydrate);
		$criteria->compare('calories',$this->calories);
		$criteria->compare('price',$this->price);
		$criteria->compare('action',$this->action);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('daytime_id',$this->daytime_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeDelete() {
		DishSet::model()->deleteAll("dish_id=".$this->id);
        return true;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dish the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
