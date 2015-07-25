<?php

class MarkController extends Controller
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
		$model=new Mark;
		if(isset($_POST['Mark']))
		{
			foreach ($_POST['Mark'] as &$value) {
		    	$value = trim($value);
			}
			$mark = Mark::model()->findByAttributes(array("name" =>$_POST['Mark']['name']));
			if($mark=="") {	
				$this->renameImages($model);
				$model->attributes=$_POST['Mark'];
				if($model->save()){
					$this->actionAdminIndex(true);
					return true;
				}
			} else {
				$this->actionAdminIndex(true,"Такое имя уже существует");
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

		if(isset($_POST['Mark']))
		{
			foreach ($_POST['Mark'] as &$value) {
		    	$value = trim($value);
			}

			$mark = Mark::model()->findByAttributes(array("name" =>$_POST['Mark']['name']));
			if($mark=="" || $_POST['Mark']['name']==$model->name) {	
				$this->renameImages($model);
				$model->attributes=$_POST['Mark'];
				if($model->save())
					$this->actionAdminIndex(true);
			} else {
				$this->actionAdminIndex(true,"Такое имя уже существует");
			}
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

	public function actionAdminIndex($partial = false,$error=NULL)
	{
		if( !$partial ){
			$this->layout='admin';
		}
		$filter = new Mark('filter');
		$criteria = new CDbCriteria();

		if (isset($_GET['Mark']))
        {
            $filter->attributes = $_GET['Mark'];
            foreach ($_GET['Mark'] AS $key => $val)
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

        $criteria->order = 'name ASC';
        

        $model = Mark::model()->findAll($criteria);
        $options = array(
			'data'=>$model,
			'filter'=>$filter,
			'error' =>$error,
			'labels'=>Mark::attributeLabels()
		);
		if( !$partial ){
			$this->render('adminIndex',$options);
		}else{
			$this->renderPartial('adminIndex',$options);
		}

	}

	public function loadModel($id)
	{
		$model=Mark::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function renameImages($model){
		if($_POST['Mark']['car']!=$model->car) {
			if(file_exists($model->car)) unlink($model->car);
			if($_POST['Mark']['car']!="") {
				$from = $_POST['Mark']['car'];
				$_POST['Mark']['car'] = str_replace(Yii::app()->params['tempFolder'], Yii::app()->params['imageFolder'], $from);
				rename($from,$_POST['Mark']['car']);
			}
		}
		if($_POST['Mark']['logo']!=$model->logo) {
			if(file_exists($model->logo)) unlink($model->logo);
			if($_POST['Mark']['logo']!="") {
				$from = $_POST['Mark']['logo'];
				$_POST['Mark']['logo'] = str_replace(Yii::app()->params['tempFolder'], Yii::app()->params['imageFolder'], $from);
				rename($from,$_POST['Mark']['logo']);
			}
		}
	}

	// public function actionAdminAdd() {
	// 	$xls = $this->getXLS(Yii::app()->basePath.'/Katalog.xls');
	// 	$arr= array();
	// 	$Cars = array("Chevrolet","Ford","Great Wall","Hyundai","KIA","Mazda","Mercedes","Mitsubishi","Nissan","Opel","SsangYong","Toyota","VW","Alfa Romeo");
	// 	for ($i=1; $i < count($xls); $i++) { 
	// 		for ($j=0; $j < count($Cars); $j++) { 
	// 			if($xls[$i][1]==$Cars[$j]) {
	// 				if(!isset($arr[$Cars[$j]])) $arr[$Cars[$j]] = array();
	// 				if(!isset($arr[$Cars[$j]][$xls[$i][2]])) $arr[$Cars[$j]][$xls[$i][2]] = array();
	// 				$engine = array();
	// 				$str_to_del = array($xls[$i][1],$xls[$i][2]);
	// 				$engine['name'] = trim(str_ireplace($str_to_del,"", $xls[$i][3]));
	// 				$engine['hp'] = $xls[$i][4];
	// 				array_push($arr[$Cars[$j]][$xls[$i][2]], $engine);
	// 			}
	// 		}
			
	// 	}
	// 	foreach ($arr as $mark => $mark_value) {
	// 		$model=new Mark;
	// 		$model->attributes=array("name" => $mark);
	// 		$model->save();
	// 		$mark_id = $model->id;
	// 		foreach ($mark_value as $car_model => $car_model_value) {
	// 			$model=new CarModel;
	// 			$model->attributes=array("name" => $car_model,'mark_id' => $mark_id);
	// 			$model->save();
	// 			$car_model_id = $model->id;
	// 			foreach ($car_model_value as $i => $engine) {
	// 				$model=new Engine;
	// 				$model->attributes=array("name" => $engine['name'],"horsepower" => $engine['hp'],'model_id' => $car_model_id);
	// 				$model->save();
	// 			}

	// 		}
	// 	}
	// }
	private	function getXLS($xls,$rows = false,$titles = false){
		if( is_array($rows) && $titles === false )
			throw new CHttpException(404,'Отсутствуют наименования столбцов');

		include_once  Yii::app()->basePath.'/phpexcel/Classes/PHPExcel.php';
		include_once  Yii::app()->basePath.'/phpexcel/Classes/PHPExcel/IOFactory.php';
		
		$objPHPExcel = PHPExcel_IOFactory::load($xls);
		$objPHPExcel->setActiveSheetIndex(0);
		$aSheet = $objPHPExcel->getActiveSheet();
		
		$array = array();
		$cols = 1;

		for ($i = 1; $i <= $aSheet->getHighestRow(); $i++) {  
		    $item = array();
		    for ($j = 0; $j < $cols; $j++) {
		        $val = $aSheet->getCellByColumnAndRow($j, $i)->getCalculatedValue()."";

	        	// Этот кусок кода ограничивает матрицу по столбцам смотря на первую строку.
				// Если в первой строке 3 ячейки заполенных, 
				// то и во всех остальных он будет смотреть только по первым трем ячейкам.
		        if( !($val === "" && $i == 1) && $j < $cols ){
					array_push($item, ($val === "")?NULL:trim($val) );
					if( $i == 1 ) $cols++;
				}
		    }

		    // Если мы в переменной передаем массив отсортированных наименований столбцов
			// то происходит сортировка столбцов по этому массиву
			if(is_array($rows)) {
				$tmp = array();
				foreach ($rows as $key => $value) {
					if($value!="no-id") {
						if( $i == 1 ){
							array_push($tmp,$titles[intval($value)]["NAME"]);
						}else{
							array_push($tmp,$item[$key]);
						}
					}
				}
				$item=$tmp;
			}

			// Если нам нужна только первая строка
			if($rows === 1) return $item;

			array_push($array, $item);
		}
		return $array;
	} 
}
