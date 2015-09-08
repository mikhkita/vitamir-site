<?php

class LandController extends Controller
{
	public $layout='//layouts/land';

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
				'actions'=>array('index','basket','fullMenu','dayTime'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex($partial = false)
	{	
		$set_id = file_get_contents('set_number.txt');
		$this->render('index',array(
			'daytime'=>$this->actionDayTime($set_id,false)
		));
	}

	public function actionFullMenu()
	{	
		$criteria = new CDbCriteria();	
		$criteria->condition ="";
		if($_POST['order'] == 2) {
			$criteria->order = 'price ASC';
		}
		if($_POST['order'] == 3) {
			$criteria->order = 'action DESC';
		}
		if(!empty($_POST['daytime'])) {
			$criteria->condition .="(";
			foreach ($_POST['daytime'] as $item) {	
				$criteria->condition .= "daytime_id LIKE '%".$item."%' OR ";
			}
			$criteria->condition = substr($criteria->condition,0,-3);
			$criteria->condition .=")";
		}
		if(!empty($_POST['type'])) {
			if($criteria->condition) $criteria->condition .=" AND ("; else $criteria->condition .="(";
			foreach ($_POST['type'] as $item) {	
				$criteria->condition .= "category_id = ".$item." OR ";
			}
			$criteria->condition = substr($criteria->condition,0,-3);
			$criteria->condition .=")";
		}
		$dishes = Dish::model()->findAll($criteria);
		foreach ($dishes as $key => &$dish) {
			if($dish['action'])  {
				$temp = $dish['price'];
				$dish['price'] = $dish['action'];
				$dish['action'] = ($temp - $dish['action'])*100/$temp;
				$temp = $dish['action'] % 5;
				$dish['action'] = ($temp) ? $dish['action']+(5-$temp) : $dish['action'];
			}
			$dish['price'] = $dish['price']*$dish[$_POST['coef']];
		}
		$count = count($dishes);
		$pages = $count/9;
		$this->renderPartial('dishes',array(
			'dishes'=>$dishes,
			'count' => $count,
			'pages' => $pages
		));
	}

	public function actionBasket($partial = false)
	{
		$model = new Order;	
		$model->location = '123';
		$model->date = time();
		$model->delivery = 1;
		$model->payment = 1;
		$model->save();
		$order_id = $model->id;
		foreach ($_POST['day'] as $key => $item) {
			foreach ($item as $value) {
				$arr = explode(";", $value);
				$temp = new OrderDish;
				$temp->order_id = $order_id;
				$temp->dish_id = $arr[0];
				$temp->daytime_id = $arr[1];
				$temp->count = $arr[2];
				$temp->day = $key+1;
				$temp->save();
			}
		}
		$this->render('basket',array(
			'order_id' => $order_id	
		));
	}
	public function actionDayTime($set_id,$html = true)
	{
		$model = Set::model()->findAll(array('order' => 'sort'));
		$count = Set::model()->count()-1;
		$set_id = ($set_id==$count) ? 0 : $set_id+1;
		$model = $model[$set_id]->dishes;
		$daytime = array();
		foreach ($model as $dish) {
			$temp = array();
			$temp['id'] = $dish->dish->id;
			$temp['name'] = $dish->dish->name;
			$temp['m_1'] = $dish->dish->m_1;
			$temp['m_2'] = $dish->dish->m_2;
			$temp['m_3'] = $dish->dish->m_3;
			$temp['w_1'] = $dish->dish->w_1;
			$temp['w_2'] = $dish->dish->w_2;
			$temp['w_3'] = $dish->dish->w_3;
			$temp['fat'] = $dish->dish->fat;
			$temp['pro'] = $dish->dish->protein;
			$temp['car'] = $dish->dish->carbohydrate;
			$temp['cal'] = $dish->dish->calories;
			$temp['price'] = ($dish->dish->action!=0) ? $dish->dish->action : $dish->dish->price;
			$temp['img'] = $dish->dish->image;
			$daytime[$dish['daytime_id']][$dish['dish_id']] = $temp;
			$daytime['set_id'] = $set_id;

		}
		if($html) {	
			$this->renderPartial('daytime',array(
				'daytime'=>$daytime
			));	
		} else return $daytime;
	}
	public function loadModel($id)
	{
		$model=Good::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function topMenu(){
		if( Yii::app()->user->isGuest ) return false;
		$this->render('topMenu',array(

		));
	}
}
