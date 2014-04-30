<?php
/* @var $this WorksController */
/* @var $model Works */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'works-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> обязательно для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<label>Изображения:</label>
		<?php
		    $this->widget('CMultiFileUpload', array(
			  'model' => $model,
			  'attribute' => 'images',
			  'accept' => 'jpg',
			  'duplicate' => 'Этот файл уже выбран!',
			  'denied' => 'Недопустимый тип файла',
			  'htmlOptions' => array(
			    'multiple' => 'multiple',
			  ),
			));
		  ?>
		<div class="images">
	        <ul>
		<? foreach ($model->workImages as $img) : ?>
            <li>
            	<?= CHtml::image(fnc::getThumb('uploads/works/',$img->url,'',120),'');?>
            	<a href="/works/deleteImage/<?= $img->id;?>">Удалить</a>
            </li>
		<? endforeach; ?>
	        </ul>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<? if ($model->isNewRecord): ?>
	<div class="row">
		Дополнительные изображения можно будет добавить после сохранения работы.
	</div>
<? endif; ?>

<?php $this->endWidget(); ?>

</div><!-- form -->