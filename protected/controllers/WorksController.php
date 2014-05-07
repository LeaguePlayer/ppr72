<?php

class WorksController extends Controller
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
				'actions'=>array('create','update','deleteImage'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Works;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Works']))
		{
			$model->attributes=$_POST['Works'];
			if($model->save()) {
				if (! $_FILES["Works"]["name"]["image"]) {
					$this->redirect("/works/");
				}
                if($_FILES["Works"]["error"]["image"] === 0){
                    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads/works')){
                        mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/works');
                    }
                    $ih = new CImageHandler();
                    $ih->load($_FILES['Works']['tmp_name']['image'])
                        ->resize(320, false)
                        ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/works/'.$model->id.'.jpg');
                    Yii::app()->db->createCommand()->update(
                        "works",
                        array(
                            "image"=>"/uploads/works/".$model->id.".jpg"
                        ),
                        "id=:id",
                        array(
                            ":id"=>$model->id,
                        )
                    );
                }
				$this->redirect("/works/");
			}
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

		if(isset($_POST['Works']))
		{
			$model->attributes=$_POST['Works'];
			if($model->save()) {
				if ($_FILES["Works"]["name"]["image"] == '') {
					$this->redirect("/works/");
				}
                if($_FILES["Works"]["error"]["image"] === 0){
                    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . '/uploads/works')){
                        mkdir($_SERVER['DOCUMENT_ROOT'] . '/uploads/works');
                    }
                    $ih = new CImageHandler();
                    $ih->load($_FILES['Works']['tmp_name']['image'])
                        ->resize(320, false)
                        ->save($_SERVER['DOCUMENT_ROOT'] . '/uploads/works/'.$model->id.'.jpg');
                    Yii::app()->db->createCommand()->update(
                        "works",
                        array(
                            "image"=>"/uploads/works/".$model->id.".jpg"
                        ),
                        "id=:id",
                        array(
                            ":id"=>$model->id,
                        )
                    );
                }
				$this->redirect("/works/");
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDeleteImage($id) 
	{
		$img = WorkImages::model()->findByPk($id);
		$work = $img->work;
		$img->delete();
		$this->redirect( array('works/update', 'id'=>$work->id));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Works');
		$this->render('//works/index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Works('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Works']))
			$model->attributes=$_GET['Works'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Works the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Works::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Works $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='works-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
