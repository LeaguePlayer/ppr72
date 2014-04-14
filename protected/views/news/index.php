<?php

$this->pageTitle = 'Новости компании ПроектТехСервис Тюмень';


$this->breadcrumbs=array(
	'Новости',
);

$this->menu=array(
	array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>

<h2>Новости</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
    'summaryText'=>'Найдено {count} новостей',
        'emptyText'=>'Новости по заданным параметрам не найдены.',
	'itemView'=>'_view',
    'pager'=>array('firstPageLabel'=>'К первой', 'header'=>'','prevPageLabel'=>'&larr; Назад','nextPageLabel'=>'Вперед &rarr;','lastPageLabel'=>'К последней','cssFile'=>false
        )
)); ?>
