<?php

class ReviewController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new Review;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];
			if($model->save()){
                if($_FILES["Review"]["error"]["img"] === 0){
                    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews')){
                        mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews');
                    }
                    $ih = new CImageHandler();
                    $ih->load($_FILES['Review']['tmp_name']['img'])
                        ->resize(135, 155)
                        ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews/'.$model->id.'.jpg');
                    Yii::app()->db->createCommand()->update(
                        "reviews",
                        array(
                            "img"=>"/uploads/reviews/".$model->id.".jpg"
                        ),
                        "id=:id",
                        array(
                            ":id"=>$model->id,
                        )
                    );
                }
                $this->redirect(array('admin'));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];
			if($model->save()) {
                if($_FILES["Review"]["error"]["img"] === 0){
                    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews')){
                        mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews');
                    }
                    $ih = new CImageHandler();
                    $ih->load($_FILES['Review']['tmp_name']['img'])
                        ->resize(135, 155)
                        ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/reviews/'.$model->id.'.jpg');
                    Yii::app()->db->createCommand()->update(
                        "reviews",
                        array(
                            "img"=>"/uploads/reviews/".$model->id.".jpg"
                        ),
                        "id=:id",
                        array(
                            ":id"=>$model->id,
                        )
                    );
                }
                $this->redirect(array('admin'));
            }

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Review');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Review('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Review']))
			$model->attributes=$_GET['Review'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Review::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='review-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
