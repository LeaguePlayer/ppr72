<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
     public $layout='//layouts/column2';
     
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $last_new = News::model()->find(array('order'=>'id DESC','limit'=>1));
        $last_new->short_desc = fnc::crop_str($last_new->short_desc,220);
        
        $services = Services::model()->findAll(array("group"=>'id_type',"select"=>"id_type as id_category,count(*) as cost,`t`.id",'join'=>'left join `category` `c` on `c`.id = `t`.id_category','condition'=>"id_type is not null"));
        
        
 
      
      
        
        $main_text = Notes::model()->findByPk(1);
        
		$this->render('index',array(
            'last_new'=>$last_new,
            'main_text'=>$main_text,
            'services'=>$services,
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
    
    
    public function actionFeedback($order=false)
    {
        $note = Notes::model()->findByPk(5);
        if($note->meta_desc)
	        Yii::app()->clientScript->registerMetaTag($note->meta_desc, 'description');
            
       if($note->meta_keys)
	        Yii::app()->clientScript->registerMetaTag($note->meta_keys, 'keywords');
            
        
        if(is_numeric($order))
        {
            $service = Services::model()->findByPk($order);
            $text = "Добрый день!\nМеня заинтересовала Ваша услуга $service->title";
        }
        
        $sended = false;
          if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
          {
            $this->renderPartial('/site/feedback',array(
    			'note'=>$note,
                'text'=>$text,
    		));
            die();
          }
          $error = 0;
          if(isset($_POST['feedback']))
          {
                $feedback = $_POST['feedback'];
                if(isset($feedback['name'],$feedback['text']) and trim($feedback['name'])!='' and trim($feedback['text'])!='' and isset($feedback['company'],$feedback['phone']) and trim($feedback['phone'])!='' and trim($feedback['company'])!='')
                {
                    if($feedback['mail']=='') $feedback['mail']='';
                    else $feedback['mail']='Электронный адрес '.$feedback['mail'].', ';
                    
                    $subject = "Сообщение с сайта ppr72.ru";
                    $message = "Пользователь с именем <strong>{$feedback[name]}</strong>, от организации <strong>{$feedback[company]}</strong><br />{$feedback['mail']}номером телефона {$feedback[phone]}.<br />Отправил Вам сообщение с текстом:<br />{$feedback[text]}";
                    $headers = "MIME-Version: 1.0\r\nFrom: robot@ppr72.ru\r\nReply-To: robot@ppr72.ru\r\nContent-Type: text/html; charset=utf-8";        	    
            	    $message = str_replace("\n.", "\n..", $message);
            	    mail(Yii::app()->params['adminEmail'],'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
                    $sended = true;
                }
                else $error=1;
          }
            
		$this->render('/site/feedback',array(
    			'note'=>$note,
                'sended'=>$sended,
                'text'=>$text,
                'error'=>$error,
    		));
    }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}