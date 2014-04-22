<?php
/* @var $this ReviewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	' / Отзывы клиентов',
);

$this->menu=array(
	array('label'=>'Добавить отзыв', 'url'=>array('create')),
	array('label'=>'Список отзывов', 'url'=>array('admin')),
);
?>

<h1>Отзывы клиентов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'enablePagination'=>false,
	'summaryCssClass'=>'hidden',
)); ?>
