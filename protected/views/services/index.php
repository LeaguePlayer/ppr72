<?php
if($category->meta_title) $this->pageTitle= $category->meta_title;
else $this->pageTitle = $category->name.' - ПроектТехСервис Тюмень';

$this->breadcrumbs=array(
    fnc::getCategoryService($category->id_type)=>array('/category/index/type/'.fnc::getCategoryServiceEng($category->id_type)),
	$category->name,
);

$this->menu=array(
	array('label'=>'Создать услугу', 'url'=>array('create')),
	array('label'=>'Управление услугами', 'url'=>array('admin')),
);
?>

<h1><?=$category->name?></h1>

<div class="typography meta">
    <?=$category->meta_html?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'Найдено {count} услуг',
        'emptyText'=>'Услуги по заданным параметрам не найдены.',
	'itemView'=>'_view',
    'pager'=>array('firstPageLabel'=>'К первой', 'header'=>'','prevPageLabel'=>'&larr; Назад','nextPageLabel'=>'Вперед &rarr;','lastPageLabel'=>'К последней','cssFile'=>false
        )
)); ?>
