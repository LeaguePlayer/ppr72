<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'warrant-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note"><span class="required">*</span> Обязательные для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">    
		<?php echo $form->labelEx($model, 'img'); ?>
        <?php echo CHtml::activeFileField($model, 'img'); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_desc'); ?>
		<?php echo $form->textField($model,'short_desc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'short_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Загрузить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->