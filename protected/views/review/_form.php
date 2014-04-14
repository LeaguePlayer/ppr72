<?php
/* @var $this ReviewController */
/* @var $model Review */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'review-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
    ),
)); ?>

	<p class="note"><span class="required">*</span> обязательно для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'img'); ?>
        <?php echo $form->fileField($model,'img'); ?>
        <?php echo $form->error($model,'img'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('size'=>60,'maxlength'=>50, 'placeholder'=>'')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status', Review::getStatusLabel()); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Сохрнать'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->