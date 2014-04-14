<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Изменения пароля");
$this->breadcrumbs=array(
	UserModule::t("Профайл") => array('/user/profile'),
	UserModule::t("Изменения пароля"),
);
?>

<h2><?php echo UserModule::t("Изменения пароля"); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note"><?php echo UserModule::t('<span class="required">*</span> Обязательные для заполнения.'); ?></p>
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Минимум 4 символа."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo $form->labelEx($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Сохранить")); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->