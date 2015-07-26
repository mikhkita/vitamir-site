<?php

class SetController extends Controller
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
				'actions'=>array('adminIndex','adminCreate','adminUpdate','adminDelete','adminAdd'),
				'roles'=>array('manager'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}

	public function getFields(){
		$model = Dish::model()->findAll(array("order"=>"daytime_id ASC"));
		$dishes = array();

		foreach ($model as $key => $value) {
			$dishes[$value->id] = $value->name." (".mb_strtolower($value->daytime->name,"UTF-8").")";
		}
		return $dishes;
	}

	public function getModelFields($model){
		$dishes = array();

		foreach ($model->dishes as $key => $value) {
			$dishes[$value->dish->id] = $value->dish->name." (".mb_strtolower($value->dish->daytime->name,"UTF-8").")";
		}
		return $dishes;
	}

	public function setAttr($model){
		$model->attributes=$_POST['Set'];
		if($model->save()){
			$this->updateDishes($model);
			$this->actionAdminIndex(true);
		}
	}

	public function updateDishes($model){
		DishSet::model()->deleteAll('set_id = '.$model->id);

		if( isset($_POST["dishes"]) ){
			$tableName = DishSet::tableName();

			$sql = "INSERT INTO `$tableName` (`set_id`,`dish_id`) VALUES ";

			$values = array();
			foreach ($_POST["dishes"] as $key => $value) {
				$values[] = "('".$model->id."','".$key."')";
			}

			$sql .= implode(",", $values);

			Yii::app()->db->createCommand($sql)->execute();
		}
	}

	public function actionAdminCreate()
	{
		$model=new Set;

		if(isset($_POST['Set']))
		{
			$this->setAttr($model);
		}else{
			$attr = array();
			$allAttr = $this->getFields();

			$this->renderPartial('adminCreate',array(
				'model'=>$model,
				'attr'=> $attr,
				'allAttr'=>$allAttr
			));
		}
	}

	public function actionAdminUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Set']))
		{
			$this->setAttr($model);
		}else{
			$attr = $this->getModelFields($model);
			$allAttr = array_diff_key($this->getFields(), $attr);

			$this->renderPartial('adminUpdate',array(
				'model'=>$model,
				'allAttr'=>$allAttr,
				'attr'=>$attr
			));
		}
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
		$filter = new Set('filter');
		$criteria = new CDbCriteria();

		if (isset($_GET['Set']))
        {
            $filter->attributes = $_GET['Set'];
            foreach ($_GET['Set'] AS $key => $val)
            {
                if ($val != '')
                {
                    if( $key == "name" ){
                    	$criteria->addSearchCondition('name', $val);
                    }else{
                    	$criteria->addCondition("$key = '{$val}'");
                    }
                }
            }
        }

        $criteria->order = 'sort ASC';

        $model = Set::model()->findAll($criteria);

        $options = array(
			'data'=>$model,
			'filter'=>$filter,
			'labels'=>Set::attributeLabels()
		);
		if( !$partial ){
			$this->render('adminIndex',$options);
		}else{
			$this->renderPartial('adminIndex',$options);
		}

	}

	public function loadModel($id)
	{
		$model=Set::model()->with("dishes")->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
