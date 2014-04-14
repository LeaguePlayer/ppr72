<?php
if($model->meta_title) $this->pageTitle= $model->meta_title;
else $this->pageTitle = $model->title.' - ПроектТехСервис Тюмень';

$this->breadcrumbs=array(
	fnc::getCategoryService($category->id_type)=>array('/category/index/type/'.fnc::getCategoryServiceEng($category->id_type)),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список услуг', 'url'=>array('index')),
	array('label'=>'Создать услугу', 'url'=>array('create')),
	array('label'=>'Редактировать услугу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить услугу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление услугами', 'url'=>array('admin')),
);
?>

<div class="typography">
<h1><?php echo $model->title; ?></h1>

<?php $this->renderPartial('_view-once',array(
	'model'=>$model,
)); ?>
</div>
