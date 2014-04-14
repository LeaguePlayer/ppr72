<?php
$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список услуг', 'url'=>array('index')),
	array('label'=>'Создать услугу', 'url'=>array('create')),
	array('label'=>'Просмотр услуг', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление услугами', 'url'=>array('admin')),
);
?>

<h1>Редактирование "<?php echo $model->title; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>