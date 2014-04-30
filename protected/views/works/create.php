<?php
/* @var $this WorksController */
/* @var $model Works */

$this->breadcrumbs=array(
	' / Примеры работ'=>array('index'),
	' / Создание',
);

$this->menu=array(
	array('label'=>'Примеры работы', 'url'=>array('index')),
);
?>

<h1>Создание</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>