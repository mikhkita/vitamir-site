<?php

class DishController extends Controller
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

	public function actionAdminCreate()
	{
		$model=new Dish;
		if(isset($_POST['Dish']))
		{
			$this->renameImages($model);
			$model->attributes=$_POST['Dish'];
			if($model->save()){
				$this->actionAdminIndex(true);
				return true;
			}
		}
		$this->renderPartial('adminCreate',array(
			'model'=>$model
		));

	}

	public function actionAdminUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Dish']))
		{
			$this->renameImages($model);
			$model->attributes=$_POST['Dish'];
			if($model->save())
				$this->actionAdminIndex(true);
		}else{
			$this->renderPartial('adminUpdate',array(
				'model'=>$model,
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
		$filter = new Dish('filter');
		$criteria = new CDbCriteria();

		if (isset($_GET['Dish']))
        {
            $filter->attributes = $_GET['Dish'];
            foreach ($_GET['Dish'] AS $key => $val)
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

        $criteria->order = 'daytime_id ASC';

        $model = Dish::model()->findAll($criteria);

        $options = array(
			'data'=>$model,
			'filter'=>$filter,
			'labels'=>Dish::attributeLabels()
		);
		if( !$partial ){
			$this->render('adminIndex',$options);
		}else{
			$this->renderPartial('adminIndex',$options);
		}

	}

	public function loadModel($id)
	{
		$model=Dish::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function renameImages($model){
		if($_POST['Dish']['image']!=$model->image) {
			if(file_exists($model->image)) unlink($model->image);
			if($_POST['Dish']['image']!="") {
				$from = $_POST['Dish']['image'];
				$_POST['Dish']['image'] = str_replace(Yii::app()->params['tempFolder'], Yii::app()->params['imageFolder'], $from);
				rename($from,$_POST['Dish']['image']);
			}
		}
	}
}
