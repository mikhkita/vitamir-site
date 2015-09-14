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
				'actions'=>array('index','import','basket','getpromo','fullMenu','setShow','day','createOrder','order','updateOrder','thanks','setPromo'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('orderHistory','userProfile','changePassword'),
				'roles'=>array('client'),
			),
		);
	}

	public function actionIndex($partial = false)
	{	
		$set_id = file_get_contents('set_number.txt');
		if($set_id === false) $set_id = 0;
		$day_select = array("1" => 1);
		if(!isset($_SESSION)) session_start();
		if(isset($_SESSION['order_id']) && $model = Order::model()->findbyPk($_SESSION['order_id'])) {
			$days = array();
			for ($i=1; $i <= $model->day; $i++) { 
				$day_select[$i] = $i; 
				$dishes = OrderDish::model()->findAll('order_id='.$_SESSION['order_id'].' AND day='.$i);
				array_push($days,$this->actionSetShow($dishes));
			}
			$options = array('day_select' => $day_select, 'days' => $days, 'set_id' => $set_id);
		} else {
			$options = $this->actionDay($set_id,false);
			$options['day_select'] = $day_select;
		}
		// $options['model'] = $login;	sdsd
		$this->render('index',$options);
	}

	public function actionDay($set_id,$html = true)
	{
		$model = Set::model()->findAll(array('order' => 'sort'));
		$set_id = ($model[$set_id]->id == end($model)->id) ? 0 : $set_id+1;
		$days = array("0" => $this->actionSetShow($model[$set_id]->dishes));
		$options = array('days' => $days,'set_id' => $set_id);
		if($html) $this->renderPartial('day',$options);	else return $options;
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

	public function actionCreateOrder($order_id = NULL)
	{
		$model = new Order;	
		$model->date = date("Y-m-d H:i:s");
		$model->delivery = 0;
		$model->payment = 0;

		$user = (isset($_POST['phone'])) ? User::model()->find("usr_login='".$this->getLogin($_POST["phone"])."'") : User::model()->findByPk(Yii::app()->user->id);

		$discount = 0;
		
		if( !$user ){
			$user = new User();

			$user->usr_login = $this->getLogin($_POST["phone"]);
			$user->newPass = "123123";
			$user->usr_password = "123123";
			$user->usr_rol_id = 4;

			if(!$user->save()){
				header("Location: /");
			}
		} 

		if($order_id) {
			if($new_order = Order::model()->findbyPk($order_id)) {
				$model->price = $new_order->price;
				$model->type = $new_order->type;
				$model->day = $new_order->day;
				$model->user_id = $new_order->user_id;
				if($model->save()){
					$order_id = $model->id;
					foreach ($new_order->dishes as $item) {
						$temp = new OrderDish;
						$temp->order_id = $order_id;
						$temp->dish_id = $item->dish_id;
						$temp->daytime_id = $item->daytime_id;
						$temp->count = $item->count;
						$temp->day = $item->day;
						$temp->save();
					}	
					$_SESSION['order_price'] = $new_order->price;	
				} else {
					header("Location: /");
				}
			} else {
				header("Location: /");
			}
		} else {
			if(!isset($_SESSION)) session_start();
			if(isset($_SESSION['order_id'])) { 
				Order::model()->deleteByPk($_SESSION['order_id']);
				OrderDish::model()->deleteAll("order_id=".$_SESSION['order_id']); 
			}

			
			$model->type = $_POST["type"];
			$model->day = $_POST["day-count"];
			$model->price = $_POST["price"];

			if($_POST["day-count"] > 9 && $_POST["day-count"] < 30) {
				$discount = 3;
			}
			if($_POST["day-count"] == 30) {
				$discount = 10;
			}
			$user->usr_discount = ( ($user->usr_discount+$discount) < 25 ) ? ($user->usr_discount+$discount) : 25;
			$discount  = $user->usr_discount;
			$discount += $user->usr_pers_discount;

			if(isset($_SESSION['order_promo']) && $_SESSION['order_promo'] == 1) $discount +=5;
			$discount = $_POST["price"]*$discount/100;
			$_POST["price"] = round($_POST["price"]-$discount);
			$_POST["price"] = ($_POST["price"] < 0) ? 0 : $_POST["price"];

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
				$_SESSION['order_price'] = $_POST["price"];
				$_SESSION['order_discount'] = $discount;
			} else {
				header("Location: /");
			}
		}
		$_SESSION['order_id'] = $order_id;
		
		header("Location: ".$this->createUrl('/land/basket'));	
	}

	public function actionBasket($partial = false)
	{

		if(!isset($_SESSION)) session_start();
		if( isset($_SESSION['order_id']) ){
			$model = Order::model()->findByPk($_SESSION["order_id"]);

			if(!Yii::app()->user->isGuest ) $user = User::model()->findbyPk(Yii::app()->user->id);

			$this->render('basket',array(
				'order' => $model,
				'price' => $_SESSION['order_price'],
				'discount' => $_SESSION['order_discount'],
			));
		}else{
			header("Location: /");
		}
	}
	public function actionSetPromo()
	{
		if(!Yii::app()->user->isGuest ) {
			$user = User::model()->findbyPk(Yii::app()->user->id);

			if(isset($_POST['promocode']) && $_POST['promocode'] && $user->usr_promo == "use") {
				echo json_encode(array("result"=>"Промокод уже был использован!"));
				return true;

			} elseif(isset($_POST['promocode']) && $_POST['promocode']!= "use" && $_POST['promocode'] != $user->usr_promo) {
				echo json_encode(array("result"=>"Неверный промокод!"));
				return true;

			} elseif(isset($_POST['promocode']) && $_POST['promocode']!= "use" && $_POST['promocode'] == $user->usr_promo) {
				if(!isset($_SESSION)) session_start();
				$user->usr_promo = "use";
				if(!$user->save()) header("Location: /");
				$_SESSION['order_promo'] = 1;
				echo json_encode(array("result"=>"1"));
			}
		} else {
			echo json_encode(array("result"=>"Для использования промокода необходимо авторизоваться!"));
		}
		
	}

	public function actionUserProfile()
	{
		if(Yii::app()->user->isGuest ) $this->redirect($this->createUrl('/land',array("#" => 'login')));

		$model = User::model()->findByPk(Yii::app()->user->id);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			if($model->save()){
				header("Location: ".$this->createUrl('/land/userprofile'));
			}
				
		}else{
			$this->render('userProfile',array(
				'model'=>$model,
			));
		}

	}

	public function actionChangePassword()
	{
		if(Yii::app()->user->isGuest ) $this->redirect($this->createUrl('/land',array("#" => 'login')));

		$model = User::model()->findByPk(Yii::app()->user->id);

		if( isset($_POST["User"]["usr_password"]) ){

			$model->prevRole = $model->role->code;
			$new_password = md5($_POST["User"]["usr_password"]."eduplan");
			$old_password = md5($_POST["old_password"]."eduplan");

			if( $old_password != $model->usr_password) {
				echo json_encode(array("result"=>"Неверный пароль!"));
				return true;
			}

			if( $new_password == $model->usr_password) {
				echo json_encode(array("result"=>"Новый и старый пароль не должны совпадать!"));
				return true;
			}

			if( $_POST["User"]["usr_password"] != $_POST["repeat_password"] ) {
				echo json_encode(array("result"=>"Неверное подтверждение пароля!"));
				return true;
			}

			$model->newPass = $_POST["User"]["usr_password"];
			$model->usr_password = $_POST["User"]["usr_password"];
			if($model->save()) {
				echo json_encode(array("result"=>"Вы успешно изменили пароль!"));
			} else {
				echo json_encode(array("result"=>"Ошибка! Попробуйте еще раз"));
			}	
			return true;
		}else{
			$this->render('changePassword',array(
				'model'=>$model,
			));
		}

	}

	public function actionOrder($partial = false)
	{
		if(!isset($_SESSION)) session_start();
		if( isset($_SESSION['order_id']) ){
			$model = Order::model()->findByPk($_SESSION["order_id"]);
			$options = array(
				'order' => $model,
				'price' => $_SESSION['order_price'],

			);
			$discount = 0;
			if(!Yii::app()->user->isGuest ) $options['user'] = User::model()->findByPk(Yii::app()->user->id);

			if($model->day > 9 && $model->day < 30) {
				$discount = 3;
			}
			if($model->day == 30) {
				$discount = 10;
			}
			if(isset($options['user']) && $options['user']) {
				$options['user']->usr_discount = ( ($options['user']->usr_discount+$discount) < 25 ) ? ($options['user']->usr_discount+$discount) : 25;
				$discount  = $options['user']->usr_discount;
				$discount += $options['user']->usr_pers_discount;
			}

			if(isset($_SESSION['order_promo']) && $_SESSION['order_promo'] == 1) $discount +=5;
			$discount = $_POST["price"]*$discount/100;
			$_POST["price"] = round($_POST["price"]-$discount);
			$_POST["price"] = ($_POST["price"] < 0) ? 0 : $_POST["price"];
			$options['price'] = $_POST["price"];

			$this->render('order',$options);

		}else{
			header("Location: /");
		}
	}

	public function actionOrderHistory($partial = false)
	{
		if(Yii::app()->user->isGuest ) $this->redirect($this->createUrl('/land',array("#" => 'login')));
		$user = User::model()->findByPk(Yii::app()->user->id);
		$criteria = new CDbCriteria();
		$criteria->order = "id DESC";
		$condition = 'user_id='.$user->usr_id;
		$criteria->condition = $condition.' AND (state=1 OR state=2)';
		$new_orders = Order::model()->findAll($criteria);

		$criteria->condition = $condition.' AND state=3';
		$old_orders = Order::model()->findAll($criteria);
		$this->render('orderHistory',array(
			"user" => $user,
			'new_orders' => $new_orders,
			'old_orders' => $old_orders,
		));

	}

	public function actionUpdateOrder(){
		if(!isset($_SESSION)) session_start();
		if( isset($_SESSION['order_id']) ){
			if( count($_POST) ){
				$login = $this->getLogin($_POST["phone"]);
				$model = Order::model()->findByPk($_SESSION["order_id"]);

				$user = User::model()->find("usr_login='".$login."'");

				$discount = 0;
				if($model->day > 9 && $model->day < 30) {
					$discount = 3;
				}
				if($model->day == 30) {
					$discount = 10;
				}
				
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
				} else {
					$user->usr_discount = ( ($user->usr_discount+$discount) < 25 ) ? $user->usr_discount+$discount : 25;
					$discount = $user->usr_discount;
					if(isset($_SESSION['order_promo']) && $_SESSION['order_promo'] == 1) {
						$discount += 5;
						$user->usr_promo = "use";
					}
		
					$discount += $user->usr_pers_discount;
					$user->usr_name = $_POST["name"];
					$user->usr_email = $_POST["email"];
					$user->save();
				}
				if($discount) {

					$model->price = round($model->price-($model->price*$discount/100));
					$model->price = ($model->price < 0) ? 0 : $model->price;
				}
				$model->delivery = $_POST["delivery"];
				$model->payment = $_POST["payment"];
				$model->location = $_POST["location"];
				$model->state = 1;
				$model->user_id = $user->usr_id;
				if($model->save()){
					unset($_SESSION['order_id']);
					unset($_SESSION['order_price']);
					unset($_SESSION['order_promo']);
					header("Location: ".$this->createUrl('/land/thanks'));
				}
			}

		}else{
			header("Location: /");
		}
	}

	public function actionImport(){
		$arr = array(
			array("Омлет белковый с сыром","270","38.598","9.385","0.387","240.89","3","upload/images/p19upmfbha8cp19o71vldc5nfli7.jpg"),
			array("Омлет белковый с шпинатом","262","23.168","0","0.517","92.29","3","upload/images/p19upmijqg1ot033rfbq1ieq1bo3c.jpg"),
			array("Омлет с овощами","265","27.792","23.91","4.918","344.58","3","upload/images/p19upmkeh61q3q11pv1nbkirrje6h.jpg"),
			array("Яица с зеленью","212","26.236","23.482","2.274","325.01","3","upload/images/p19upmltps245cma494grh1pa4m.jpg"),
			array("Овсяная каша на молоке","203","10.5","8.866","32.53","249.62","3","upload/images/default.jpg"),
			array("Каша гречневая с орехами и ягодами","203","9.033","8.099","20.518","187.59","3","upload/images/p19upmndkk14061vff1p5u1ifd5piu.jpg"),
			array("Каша манная с молоком","208","9.235","1.96","37.66","199.3","3","upload/images/p19upmo95cnmbmi51gdpcm11ihp13.jpg"),
			array("Каша рисовая с финиками","188","6.665","1.715","33.36","171.4","3","upload/images/p19upmp56k4ls17itvot1e077vq18.jpg"),
			array("Каша 4 злака с молоком","205","11.315","5.355","37.4","243.15","3","upload/images/p19upmppnapttijs1ei5qbc61d.jpg"),
			array("Творожок дядюшки бороды","215","31.185","17.305","37.565","420.5","3","upload/images/p19upmqd5hskh1cb10pv184n1dbb1i.jpg"),
			array("Творог с курагой","160","26.32","7.53","7.8","203","3","upload/images/p19upn32bpnjid8rjcmq8g16ho1n.jpg"),
			array("Творог с медом","165","25.92","7.5","14.925","227.85","3","upload/images/p19upn5o1g189pelk17di1h8ge221s.jpg"),
			array("Овощные крудитэ","120","1.29","0.06","5.01","24.6","3","upload/images/p19upn6d381h1ebg8bb9he81e3d21.jpg"),
			array("Ореховая смесь","49","8.975","28.483","6.31","315.31","3","upload/images/p19upn72sp1aj3166b17k7u3o1cr26.jpg"),
			array("Фруктовый салат","134","1.008","0.464","11.246","53.2","3","upload/images/p19upn7p0b19b819h1jkf8qcsfa2b.jpg"),
			array("Блинчики из овсянки","279","39.743","24.2","27.704","488.25","3","upload/images/p19upn8g7qp9t12kf1fqb866rdl2j.jpg"),
			array("Творожники идеальные","318","38.491","16.85","35.581","442.91","3","upload/images/p19upn964211j71rbdfht1bc81kce2o.jpg"),
			array("Мусс из авакадо с клубникой","178","3.282","30.072","20.61","350.44","3","upload/images/p19upn9u5j1iql1f9pomr1lkm16gk2t.jpg"),
			array("Кефир 500 мл.","500","14","5","20","200","3","upload/images/default.jpg"),
			array("Салат из авокадо с клубникой","238","6.56","17.314","8.365","214.51","3","upload/images/p19upnakfm1d4s1clt1b75nvvrsg32.jpg"),
			array("Овощной салат с красной капустой","236","3.092","5.719","9.473","100.73","3","upload/images/p19upnb8c813jc1ls8egct3k1kef37.jpg"),
			array("Спаржа запеченая в ломтиках индейки","108","14.7","0.6","1.55","81.5","2","upload/images/default.jpg"),
			array("Бутерброд с индейкой","145","20.04","4.135","18.245","197.9","2","upload/images/p19upncuu1ncikgebu219ve13uk3c.jpg"),
			array("Бутерброд с курицей","145","21.96","4.47","18.415","200.7","2","upload/images/p19upnditl1s481qd2e1larro2h3h.jpg"),
			array("Воздушные хлебцы с лососем на козьем сыре.","98","16.183","8.587","20.631","231.78","1","upload/images/p19upnehg51ep216kfkjn7c11ku3m.jpg"),
			array("Салат из тунца и свежих овощей","339","37.804","0.938","3.894","181.1","1","upload/images/p19upnf4s61kcns6q16e310ml1pi03r.jpg"),
			array("Овощной салат с гречкой","123","3.185","0.71","14.641","74.21","3","upload/images/p19upngb3st7i1j15f40dpag5h40.jpg"),
			array("Салат из огурца и сельдерея","158","1.363","0.167","4.181","22.98","3","upload/images/p19upnh3iu8puba457a180au045.jpg"),
			array("Овощи на пару","275","2.163","0.204","9.755","48.05","3","upload/images/p19upnhqjs1r5m17alo0i19bj18un4a.jpg"),
			array("Гречка отварная","24","3.024","0.792","14.904","75.12","3","upload/images/default.jpg"),
			array("Рис отварной дл","20","1.34","0.14","15.78","68.8","3","upload/images/default.jpg"),
			array("Макароны отварные (твердый сорт)","25","2.6","0.275","17.425","84.25","3","upload/images/default.jpg"),
			array("Броколли","100","3","0.4","5.2","28","3","upload/images/default.jpg"),
			array("Шпинат","100","1.3","0","4.7","23","3","upload/images/default.jpg"),
			array("Картофель отварной","90","1.8","0.36","15.03","73.8","3","upload/images/default.jpg"),
			array("Куриное филе с гречкой","254","44.788","3.231","14.246","261.49","2","upload/images/p19upnjm7n88l1to1ah9171b2qa4f.jpg"),
			array("Куриное филе с рисом","213","44.04","2.8","7.5","226","2","upload/images/p19upnkb361hgfp1c13ui16hpgf4k.jpg"),
			array("Куриное филе с шпинатом","243","43.02","2.52","5.4","214.8","2","upload/images/p19upnm19u7uqn1l9c91c1sb0r4p.jpg"),
			array("Куриное филе с цветной капустой","193","42.97","2.67","3.4","206.8","2","upload/images/p19upnmtid14gccje1prh1b6qpu54u.jpg"),
			array("Филе индейки с гречкой","254","38.068","2.111","13.546","251.69","2","upload/images/p19upnoa628vu4no3n1gip7mc53.jpg"),
			array("Филе индейки с рисом","263","38.82","1.88","9.4","230.2","2","upload/images/p19upnov367q115sk1q4u16051s1458.jpg"),
			array("Филе индейки с шпинатом","243","36.3","1.4","4.7","205","2","upload/images/p19upnpi3dbq43q8jfhpu21dmc5d.jpg"),
			array("Филе индейки с цветной капустой","193","36.25","1.55","2.7","197","2","upload/images/p19upnq44egijpl9p6t1o9j60n5i.jpg"),
			array("Филе куриное","140","41.72","2.52","0.7","191.8","2","upload/images/default.jpg"),
			array("Филе индейки","140","35","1.4","0","182","2","upload/images/default.jpg"),
			array("Телапия на пару с рисом","273","28.55","2.47","19.38","212.8","1","upload/images/p19upnr4hm1kqq1tcd14981m9b106m5n.jpg"),
			array("Треска с отварным картофелем и зеленью","226","24.888","1.282","15.186","176.28","1","upload/images/p19upns2c0qqf1v4rk4ds0l1v9e5s.jpg"),
			array("Треска с зеленью","133","23.088","0.922","0.156","102.48","1","upload/images/p19upnst0k10491isi1jk516ck1t6m61.jpg"),
			array("Кальмар с овощами","257","24.436","18.03","11.674","293.38","1","upload/images/p19upntf8kvn88v5bagoi01gvn66.jpg"),
			array("Куриный рулет","272","69.768","13.962","9.891","438.16","2","upload/images/p19upnu6qs109j13b51iau19tn163m6b.jpg"),
			array("Курица в медово-лимонном соусе","483","44.578","27.649","89.146","761.81","2","upload/images/p19upnv2rb180c14i6ags1q251vd86g.jpg"),
			array("Паровая телятина в прованских травах	","309","47.794","1.643","4.219","222.2","2","upload/images/p19upo031t19ai1h701dr1jk31lia6l.jpg"),
			array("Телятина с овощами","229","46.758","6.383","2.52","254.29","2","upload/images/p19upo0usmu1afd813pu1m07amo6q.jpg"),
			array("Паровые котлеты куриные с макаронами","176","44.396","7.869","18.612","324.08","2","upload/images/p19upo1tdr18me1autsu0qu77u86v.jpg"),
			array("Паровые котлеты из индейки с макаронами","176","37.676","6.749","17.912","314.28","2","upload/images/p19upo2bir6u67kk18pr151gfvm74.jpg"),
			array("Креветки с чесноком","110","22.553","1.099","2.599","109.75","1","upload/images/default.jpg"),
			array("Медальоны из телятины","157","46.204","1.446","0.643","200.71","2","upload/images/p19upo361p19k8cs7eujt6n3mm7c.jpg"),
			array("Гречка с тунцом и капустным салатом	","274","20.917","1.182","18.87","168","1","upload/images/p19upo3t9rv2q9to10q515o0j4b7h.jpg"),
			array("Индейка с овощами","277","41.864","6.735","27.29","364.55","2","upload/images/p19upo4h6h1kebctt8ne9401e4r7m.jpg"),
			array("Спагетти с кальмарами","268","39.137","3.225","25.061","280.3","1","upload/images/p19upo50vduo31gp5o1bih9t417r.jpg"),
			array("Зеленая фасоль с курицей и рисом","433","60.889","9.769","39.968","486.2","2","upload/images/p19upo5vkc1qu61uvugjeao6cmr80.jpg"),
		);

		Dish::model()->deleteAll();

		foreach ($arr as $item) {
			$model = new Dish();

			$model->name = $item[0];
			$model->image = $item[7];
			$model->description = $item[0];
			$model->m_1 = "1";
			$model->m_2 = "1.8";
			$model->m_3 = "1.3";
			$model->w_1 = "0.5";
			$model->w_2 = "1.2";
			$model->w_3 = "0.8";
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
		if( isset($_POST["phone"])){
			$login = $this->getLogin($_POST["phone"]);
			$user = User::model()->find("usr_login='".$login."'");	
			if( !$user ){
				$user = new User();
				$user->usr_login = $login;
				
				if(isset($_POST["password"])) {
					$user->newPass = $_POST["password"];
					$result = "Поздравляем, Вы успешно зарегистрированны! Также вы получаете промокод на 5%-ю скидку! Он будет отправлен Вам по смс";
				} else {
					$user->newPass = "123123";
					$result = "Промокод и пароль от личного кабинета отправлены Вам по смс";
				}
				
				$user->usr_password = "123123";
				$user->usr_rol_id = 4;

				if(!$user->save()){
					echo json_encode(array("result"=>"Произошла ошибка, попробуйте еще раз!"));
					return true;
				}
			} else {
				$result = "Промокод успешно отправлен Вам по смс";
				if(isset($_POST["password"])) {
				echo json_encode(array("result"=>"Такой пользователь уже существует!"));
				return true;
				}
			}

			if( $user->usr_promo == NULL ){
				$user->usr_promo = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
				if( !$user->save() ){
					echo json_encode(array("result"=>"Произошла ошибка, попробуйте еще раз!"));
					return true;
				}
			}
			if( $user->usr_promo == "use" ) $result = "На данном аккаунте уже был активирован промокод!";

			echo json_encode(array("result"=>$result));
		}else{
			echo json_encode(array("result"=>"Произошла ошибка, попробуйте еще раз!"));
		}
	}

	public function actionThanks(){
		$this->render('thanks',array(

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
