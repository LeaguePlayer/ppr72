<?php
if($model->meta_title) $this->pageTitle= $model->meta_title;
else $this->pageTitle = 'Услуги '.$caption.' - ПроектТехСервис Тюмень';

$this->breadcrumbs=array(
	$caption,
);

$this->menu=array(
	array('label'=>'Создать подкатегорию', 'url'=>array('create')),
	array('label'=>'Управление подкатегориями', 'url'=>array('admin')),
    array('label'=>'Редактировать текст', 'url'=>array("/notes/update/$id_edit")),
    
);
?>

<h1><?=$caption?></h1>

<?=$seo?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'Найдено {count} категорий',
        'emptyText'=>'Категории по заданным параметрам не найдены.',
        'htmlOptions'=>array('class'=>'module',),        
	'itemView'=>'_view',
    'pager'=>array('firstPageLabel'=>'К первой', 'header'=>'','prevPageLabel'=>'&larr; Назад','nextPageLabel'=>'Вперед &rarr;','lastPageLabel'=>'К последней','cssFile'=>false
        )
)); ?>
