<?php
/* @var $this ReviewController */
/* @var $model Review */

$this->breadcrumbs=array(
	' / Отзывы'=>array('index'),
	' / Добавить',
);

$this->menu=array(
	array('label'=>'Отзывы', 'url'=>array('index')),
	array('label'=>'Список отзывов', 'url'=>array('admin')),
);
?>

<h1>Добавляем отзыв</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>