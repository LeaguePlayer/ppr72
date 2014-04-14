<?php
$this->pageTitle = 'Вопросы и ответы - ПроектТехСервис Тюмень';

$this->breadcrumbs=array(
	'Вопросы и ответы',
);

$this->menu=array(
	array('label'=>'Создать Вопрос-Ответ', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Вопросы и ответы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'',
        'emptyText'=>'Результат не найден',
	'itemView'=>'_view',
    'pager'=>array('firstPageLabel'=>'К первой', 'header'=>'','prevPageLabel'=>'&larr; Назад','nextPageLabel'=>'Вперед &rarr;','lastPageLabel'=>'К последней','cssFile'=>false
        )
)); ?>
