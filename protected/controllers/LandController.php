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
				'actions'=>array('index','basket','fullMenu'),
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex($partial = false)
	{	
		$model = DishSet::model()->findAll("set_id=1");
		$daytime = array();
		foreach ($model as $dish) {
			$temp = array();
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
			$temp['price'] = $dish->dish->price;
			$temp['img'] = $dish->dish->image;
			$daytime[$dish['daytime_id']][$dish['dish_id']] = $temp;
		}
		
		
		$this->render('index',array(
			'daytime'=>$daytime
		));
	}

	public function actionFullMenu($partial = false)
	{	
		$criteria = new CDbCriteria();
		$criteria->condition ="";
		if($_POST['order'] == 2) {
			$criteria->order = 'price ASC';
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

		$this->render('basket',array(
			
		));
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
