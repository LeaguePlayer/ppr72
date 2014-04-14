<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,

)); ?>

    <div class="row">
		<?php echo CHtml::label('Организация <span class="required">*</span>','feedback_company'); ?>
		<?php echo CHtml::textField('feedback[company]','',array('size'=>60,'maxlength'=>255)); ?>	        	
	</div>
    
	<div class="row">
		<?php echo CHtml::label('Ваше имя <span class="required">*</span>','feedback_name'); ?>
		<?php echo CHtml::textField('feedback[name]','',array('size'=>60,'maxlength'=>255)); ?>	
        	
	</div>
    
    <div class="row">
		<?php echo CHtml::label('Ваш номер телефона <span class="required">*</span>','feedback_phone'); ?>
		<?php echo CHtml::textField('feedback[phone]','',array('size'=>60,'maxlength'=>255)); ?>	
	</div>
    
    <div class="row">
		<?php echo CHtml::label('Электронный адрес','feedback_mail'); ?>
		<?php echo CHtml::textField('feedback[mail]','',array('size'=>60,'maxlength'=>255)); ?>	        	
	</div>
    
    <div class="row">
		<?php echo CHtml::label('Текст сообщения <span class="required">*</span>','feedback_text'); ?>
		<?php echo CHtml::textArea('feedback[text]',$text,array('rows'=>6, 'cols'=>51)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->