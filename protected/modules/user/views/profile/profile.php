<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Профайл");
$this->breadcrumbs=array(
	UserModule::t("Профайл"),
);
?><h2><?php echo UserModule::t('Профайл'); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

