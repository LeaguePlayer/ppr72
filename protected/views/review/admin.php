<?php
/* @var $this ReviewController */
/* @var $model Review */

$this->breadcrumbs=array(
	' / Отзывы'=>array('index'),
	'/ Список',
);

$this->menu=array(
	array('label'=>'Отывы', 'url'=>array('index')),
	array('label'=>'Добавить отзыв', 'url'=>array('create')),
);
?>

<h1>Список отзывов</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'review-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'img',
            'type'=>'raw',
            'value'=>'CHtml::image("/uploads/reviews/".$data->id.".jpg","",array("width"=>"50"))',
        ),
		'name',
		'date',
		'text',
        array(
            'name'=>'status',
            'value'=>'Review::getStatusLabel($data->status)',
            'filter'=>Review::getStatusLabel(),
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
		),
	),
)); ?>
