<?php
if($model->meta_title) $this->pageTitle= $model->meta_title;
else $this->pageTitle = $model->title.' - ПроектТехСервис Тюмень';

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список новостей', 'url'=>array('index')),
	array('label'=>'Создать новость', 'url'=>array('create')),
	array('label'=>'Обновить новость', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление новостями', 'url'=>array('admin')),
);
?>
<div class="typography">
<h1><?php echo $model->title; ?></h1>

<?php $this->renderPartial('_view-once',array(
	'model'=>$model,
)); ?>
</div>