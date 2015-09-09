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
				'actions'=>array('index','import','basket','getpromo','fullMenu','dayTime','createOrder','order','updateOrder','thanks'),
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

	public function actionImport(){
		$arr = array(
			array("Омлет белковый с сыром","270","38.598","9.385","0.387","240.89","3"),
			array("Омлет белковый с шпинатом","262","23.168","0","0.517","92.29","3"),
			array("Омлет с овощами","265","27.792","23.91","4.918","344.58","3"),
			array("Яица с зеленью","212","26.236","23.482","2.274","325.01","3"),
			array("Овсяная каша на молоке","203","10.5","8.866","32.53","249.62","3"),
			array("Каша гречневая с орехами и ягодами","203","9.033","8.099","20.518","187.59","3"),
			array("Каша манная с молоком","208","9.235","1.96","37.66","199.3","3"),
			array("Каша рисовая с финиками","188","6.665","1.715","33.36","171.4","3"),
			array("Каша 4 злака с молоком","205","11.315","5.355","37.4","243.15","3"),
			array("Творожок дядюшки бороды","215","31.185","17.305","37.565","420.5","3"),
			array("Творог с курагой","160","26.32","7.53","7.8","203","3"),
			array("Творог с медом","165","25.92","7.5","14.925","227.85","3"),
			array("Овощные крудитэ","120","1.29","0.06","5.01","24.6","3"),
			array("Ореховая смесь","49","8.975","28.483","6.31","315.31","3"),
			array("Фруктовый салат","134","1.008","0.464","11.246","53.2","3"),
			array("Блинчики из овсянки","279","39.743","24.2","27.704","488.25","3"),
			array("Творожники идеальные","318","38.491","16.85","35.581","442.91","3"),
			array("Мусс из авакадо с клубникой","178","3.282","30.072","20.61","350.44","3"),
			array("Кефир 500 мл.","500","14","5","20","200","3"),
			array("Салат из авокадо с клубникой","238","6.56","17.314","8.365","214.51","3"),
			array("Овощной салат с красной капустой","236","3.092","5.719","9.473","100.73","3"),
			array("Спаржа запеченая в ломтиках индейки","108","14.7","0.6","1.55","81.5","2"),
			array("Бутерброд с индейкой","145","20.04","4.135","18.245","197.9","2"),
			array("Бутерброд с курицей","145","21.96","4.47","18.415","200.7","2"),
			array("Воздушные хлебцы с лососем на козьем сыре.","98","16.183","8.587","20.631","231.78","1"),
			array("Салат из тунца и свежих овощей","339","37.804","0.938","3.894","181.1","1"),
			array("Овощной салат с гречкой","123","3.185","0.71","14.641","74.21","3"),
			array("Салат из огурца и сельдерея","158","1.363","0.167","4.181","22.98","3"),
			array("Овощи на пару","275","2.163","0.204","9.755","48.05","3"),
			array("Гречка отварная","24","3.024","0.792","14.904","75.12","3"),
			array("Рис отварной дл","20","1.34","0.14","15.78","68.8","3"),
			array("Макароны отварные (твердый сорт)","25","2.6","0.275","17.425","84.25","3"),
			array("Броколли","100","3","0.4","5.2","28","3"),
			array("Шпинат","100","1.3","0","4.7","23","3"),
			array("Картофель отварной","90","1.8","0.36","15.03","73.8","3"),
			array("Куриное филе с гречкой","254","44.788","3.231","14.246","261.49","2"),
			array("Куриное филе с рисом","213","44.04","2.8","7.5","226","2"),
			array("Куриное филе с шпинатом","243","43.02","2.52","5.4","214.8","2"),
			array("Куриное филе с цветной капустой","193","42.97","2.67","3.4","206.8","2"),
			array("Филе индейки с гречкой","254","38.068","2.111","13.546","251.69","2"),
			array("Филе индейки с рисом","263","38.82","1.88","9.4","230.2","2"),
			array("Филе индейки с шпинатом","243","36.3","1.4","4.7","205","2"),
			array("Филе индейки с цветной капустой","193","36.25","1.55","2.7","197","2"),
			array("Филе куриное","140","41.72","2.52","0.7","191.8","2"),
			array("Филе индейки","140","35","1.4","0","182","2"),
			array("Телапия на пару с рисом","273","28.55","2.47","19.38","212.8","1"),
			array("Треска с отварным картофелем и зеленью","226","24.888","1.282","15.186","176.28","1"),
			array("Треска с зеленью","133","23.088","0.922","0.156","102.48","1"),
			array("Кальмар с овощами","257","24.436","18.03","11.674","293.38","1"),
			array("Куриный рулет","272","69.768","13.962","9.891","438.16","2"),
			array("Курица в медово-лимонном соусе","483","44.578","27.649","89.146","761.81","2"),
			array("Паровая телятина в прованских травах	","309","47.794","1.643","4.219","222.2","2"),
			array("Телятина с овощами","229","46.758","6.383","2.52","254.29","2"),
			array("Паровые котлеты куриные с макаронами","176","44.396","7.869","18.612","324.08","2"),
			array("Паровые котлеты из индейки с макаронами","176","37.676","6.749","17.912","314.28","2"),
			array("Креветки с чесноком","110","22.553","1.099","2.599","109.75","1"),
			array("Медальоны из телятины","157","46.204","1.446","0.643","200.71","2"),
			array("Гречка с тунцом и капустным салатом	","274","20.917","1.182","18.87","168","1"),
			array("Индейка с овощами","277","41.864","6.735","27.29","364.55","2"),
			array("Спагетти с кальмарами","268","39.137","3.225","25.061","280.3","1"),
			array("Зеленая фасоль с курицей и рисом","433","60.889","9.769","39.968","486.2","2"),
		);

		Dish::deleteAll();

		foreach ($arr as $item) {
			$model = new Dish();

			$model->name = $item[0];
			$model->image = "upload/images/default.jpg";
			$model->description = $item[0];
			$model->m_1 = "1";
			$model->m_2 = "1";
			$model->m_3 = "1";
			$model->w_1 = "1";
			$model->w_2 = "1";
			$model->w_3 = "1";
			$model->weight = $item[1];
			$model->fat = $item[3];
			$model->protein = $item[2];
			$model->carbohydrate = $item[4];
			$model->calories = $item[5];
			$model->price = "0";
			$model->action = "0";
			$model->category_id = $item[6];
			$model->daytime_id = "123";

			$model->save();
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
