<?php
/* @var $this WorksController */
/* @var $model Works */

$this->breadcrumbs=array(
	' / Примеры работ'=>array('index'),
	' /  Редактирование',
);

$this->menu=array(
	array('label'=>'Примеры работ', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1>Редактирование <?php echo $model->title; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>