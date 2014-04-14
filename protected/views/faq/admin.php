<?php
$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать вопрос-ответ', 'url'=>array('create')),
);


?>

<h1>Управление</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'faq-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'summaryText'=>'Найдено {count} результатов',
        'emptyText'=>'Результат не найден',
	'columns'=>array(
		'id',
		'quest',
		'answer',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
