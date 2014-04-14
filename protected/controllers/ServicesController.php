<?php

class ServicesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	   $model = $this->loadModel($id);
	   $category = Category::model()->findByPk($model->id_category);
       if($model->meta_desc)
	        Yii::app()->clientScript->registerMetaTag($model->meta_desc, 'description');
            
       if($model->meta_keys)
	        Yii::app()->clientScript->registerMetaTag($model->meta_keys, 'keywords');
       
		$this->render('view',array(
			'model'=>$model,
            'category'=>$category,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	   $ih = new CImageHandler();
     
      
		$model=new Services;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
            
          fnc::saveIMG($_FILES['Services']['name']['img'],Yii::app()->params['services'],$model);
        //  echo $_SERVER['DOCUMENT_ROOT'] . '/uploads/services/water.png';die();
            
            
                $ih->load($_SERVER['DOCUMENT_ROOT'] . '/uploads/services/'.$model->img);
                $ih->watermark($_SERVER['DOCUMENT_ROOT'] . '/uploads/services//water.png', 10, 20, CImageHandler::CORNER_CENTER);
               // $ih->thumb(200, 200);
                $ih->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/services/'.$model->img); 
                
        //  watermark($_SERVER['DOCUMENT_ROOT'] . '/uploads/services/water.png', 10, 20, CImageHandler::CORNER_LEFT_BOTTOM);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Services']))
		{
			$model->attributes=$_POST['Services'];
            
            fnc::saveIMG($_FILES['Services']['name']['img'],Yii::app()->params['services'],$model);
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($category)
	{
	   $criteria = new CDbCriteria(array('order'=>'id DESC'));
       
       
        if(is_numeric($category)) 
        {
            $criteria->addCondition("id_category=$category");
            $category_ob = Category::model()->findByPk($category);
        }
        
        if($category_ob->meta_desc)
	        Yii::app()->clientScript->registerMetaTag($category_ob->meta_desc, 'description');
            
       if($category_ob->meta_keys)
	        Yii::app()->clientScript->registerMetaTag($category_ob->meta_keys, 'keywords');
		 
        
        
		$dataProvider=new CActiveDataProvider('Services', array('pagination' => array('pageSize' => 10, ),'criteria'=>$criteria  ));
        
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'category'=>$category_ob,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Services('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Services']))
			$model->attributes=$_GET['Services'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Services::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='services-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    protected function beforeAction()
    {
        date_default_timezone_set("Asia/Dhaka");
        return true;        
    }
}