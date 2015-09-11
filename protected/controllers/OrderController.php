<?php

class OrderController extends Controller
{
	public function filters()
	{
		return array(
				'accessControl'
			);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('adminIndex','adminCreate','adminUpdate','adminDelete'),
				'roles'=>array('manager'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function actionAdminCreate()
	{
		$model=new Order;

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save()){
				$this->actionAdminIndex(true);
				return true;
			}
		}

		$this->renderPartial('adminCreate',array(
			'model'=>$model,
		));

	}

	public function actionAdminUpdate($id)
	{
		$model=$this->loadModel($id);
		$days = array();
		for ($i=1; $i <= $model->day; $i++) { 
			$dishes = OrderDish::model()->findAll('order_id='.$id.' AND day='.$i);
			array_push($days,$this->actionSetShow($dishes));
		}
		$this->renderPartial('adminUpdate',array(
			'days'=>$days,
		));
	}

	public function actionAdminDelete($id)
	{
		$this->loadModel($id)->delete();

		$this->actionAdminIndex(true);
	}

	public function actionAdminIndex($partial = false)
	{
		if( !$partial ){
			$this->layout='admin';
		}
		$filter = new Order('filter');
		$criteria = new CDbCriteria();

		if (isset($_GET['Order']))
        {
            $filter->attributes = $_GET['Order'];
            foreach ($_GET['Order'] AS $key => $val)
            {
                if ($val != '')
                {
                    $criteria->addSearchCondition($key, $val);
                }
            }
        }
  
		$model = Order::model()->findAll($criteria);

		$option = array(
			'data'=>$model,
			'filter'=>$filter,
			'labels'=>Order::attributeLabels()
		);
		if( !$partial ){
			$this->render('adminIndex',$option);
		}else{
			$this->renderPartial('adminIndex',$option);
		}
	}

	public function actionSetShow($dishes) {
		$day = array();
		foreach ($dishes as $dish) {
			$temp = array();
			$temp['id'] = $dish->dish->id;
			$temp['name'] = $dish->dish->name;
			$temp['image'] = $dish->dish->image;
			$temp['description'] = $dish->dish->description;
			$temp['m_1'] = $dish->dish->m_1;
			$temp['m_2'] = $dish->dish->m_2;
			$temp['m_3'] = $dish->dish->m_3;
			$temp['w_1'] = $dish->dish->w_1;
			$temp['w_2'] = $dish->dish->w_2;
			$temp['w_3'] = $dish->dish->w_3;
			$temp['weight'] = $dish->dish->weight;
			$temp['fat'] = $dish->dish->fat;
			$temp['pro'] = $dish->dish->protein;
			$temp['car'] = $dish->dish->carbohydrate;
			$temp['cal'] = $dish->dish->calories;
			$temp['price'] = ($dish->dish->action) ? $dish->dish->action : $dish->dish->price;
			$temp['count'] = isset($dish->count) ? $dish->count : 1;
			$day[$dish['daytime_id']][$dish['dish_id']] = $temp;			
		}
		return $day;
	}
	
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
