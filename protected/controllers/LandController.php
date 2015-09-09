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
				'actions'=>array('index','basket','getpromo','fullMenu','dayTime','createOrder','order','updateOrder','thanks'),
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
		if(!empty($_POST['daytime'])) foreach ($_POST['daytime'] as $item) $criteria->addSearchCondition('daytime_id', $item,true,"OR");
		if(!empty($_POST['type'])) $criteria->addInCondition("category_id",$_POST['type']);
		$dishes = Dish::model()->findAll($criteria);
		foreach ($dishes as $key => &$dish) {
			if($dish['action'] != 0)  {
				$temp = $dish['price'];
				$dish['price'] = $dish['action'];
				$dish['action'] = round(($temp - $dish['action'])*100/$temp);
			}
		}
		function cmp($a, $b)
		{
			if($_POST['order'] == 3) {
				$a = $a['action'];
				$b = $b['action'];
			} else if($_POST['order'] == 2) {
				$a = $a['price'];
				$b = $b['price'];
			}
		    if ($a == $b) {
		        return 0;
		    }
		    if($_POST['order'] == 3) return ($a > $b) ? -1 : 1;
			if($_POST['order'] == 2) return ($a < $b) ? -1 : 1;
		}

		usort($dishes, "cmp");
		$count = count($dishes);
		$pages = $count/9;
		$this->renderPartial('dishes',array(
			'dishes'=>$dishes,
			'count' => $count,
			'pages' => $pages
		));
	}

	public function actionCreateOrder($partial = false)
	{
		date_default_timezone_set("Europe/Moscow");

		$model = new Order;	
		$model->date = date("Y-m-d H:i:s");
		$model->delivery = 0;
		$model->price = $_POST["price"];
		$model->payment = 0;
		$model->type = $_POST["type"];
		if($model->save()){
			$order_id = $model->id;
			if(isset($_POST['day']))
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
			
			session_start();
			$_SESSION['order_id'] = $order_id;
			$_SESSION['order_price'] = $_POST["price"];

			header("Location: ".$this->createUrl('/land/basket'));
		}else{
			echo "Ошибка создания заказа";
		}
	}

	public function actionBasket($partial = false)
	{
		session_start();

		if( isset($_SESSION['order_id']) ){
			$model = Order::model()->findByPk($_SESSION["order_id"]);

			$this->render('basket',array(
				'order' => $model,
				'price' => $_SESSION['order_price'],
			));
		}else{
			header("Location: /");
		}
	}

	public function actionOrder($partial = false)
	{
		session_start();

		if( isset($_SESSION['order_id']) ){
			$model = Order::model()->findByPk($_SESSION["order_id"]);

			$this->render('order',array(
				'order' => $model,
				'price' => $_SESSION['order_price'],
			));
		}else{
			header("Location: /");
		}
	}

	public function actionUpdateOrder(){
		if( isset($_SESSION['order_id']) ){
			if( count($_POST) ){
				$login = $this->getLogin($_POST["phone"]);
				$model = Order::model()->findByPk($_SESSION["order_id"]);

				$user = User::model()->find("usr_login='".$login."'");

				if( !$user ){
					$user = new User();

					$user->usr_login = $login;
					$user->newPass = "123123";
					$user->usr_password = "123123";
					$user->usr_name = $_POST["name"];
					$user->usr_email = $_POST["email"];
					$user->usr_rol_id = 4;

					if(!$user->save()){
						die("Ошибка создания заказа");
					}
				}

				$model->delivery = $_POST["delivery"];
				$model->payment = $_POST["payment"];
				$model->location = $_POST["location"];
				$model->user_id = $user->usr_id;
				if($model->save()){
					header("Location: ".$this->createUrl('/land/thanks'));
				}
			}
			

			$this->render('order',array(
				'order' => $model
			));
		}else{
			header("Location: /");
		}
	}

	public function actionGetPromo(){
		if( isset($_POST["phone"]) ){
			$login = $this->getLogin($_POST["phone"]);
			$user = User::model()->find("usr_login='".$login."'");

			if( !$user ){
				$user = new User();

				$user->usr_login = $login;
				$user->newPass = "123123";
				$user->usr_password = "123123";
				$user->usr_rol_id = 4;

				if(!$user->save()){
					die("Ошибка создания пользователя");
				}
			}

			if( $user->usr_promo == NULL ){
				$user->usr_promo = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
				if( !$user->save() ){
					die("Ошибка создания промокода");
				}
			}

			echo "1";
		}else{
			echo "0";
		}
	}

	public function actionThanks(){
		$this->render('thanks',array(

		));
	}

	public function actionDayTime($set_id,$html = true)
	{
		$model = Set::model()->findAll(array('order' => 'sort'));
		$set_id = ($model[$set_id]->id == end($model)->id) ? 0 : $set_id+1;
		$model = $model[$set_id]->dishes;
		$daytime = array();
		foreach ($model as $dish) {
			$temp = array();
			$temp['id'] = $dish->dish->id;
			$temp['name'] = $dish->dish->name;
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
			$temp['image'] = $dish->dish->image;
			$daytime[$dish['daytime_id']][$dish['dish_id']] = $temp;
			$daytime[$dish['daytime_id']][$dish['dish_id']] = $temp;			
		}
		$daytime['set_id'] = $set_id;
		$daytime['daytime']["1"] = "Утро";
		$daytime['daytime']["2"] = "День";
		$daytime['daytime']["3"] = "Вечер";
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
