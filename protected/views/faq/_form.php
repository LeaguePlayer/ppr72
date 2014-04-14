<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faq-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Обязательные для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'quest'); ?>
		<?php echo $form->textArea($model,'quest',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'quest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textArea($model,'answer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->