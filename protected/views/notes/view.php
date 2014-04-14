<?php

if($model->meta_title) $this->pageTitle= $model->meta_title;
else $this->pageTitle = $model->name.' - ПроектТехСервис Тюмень';


if($model->id==6) 
{
    $new_menu_create = array('label'=>'Загрузить сертификат', 'url'=>array('/warrant/create/'));
    $new_menu_admin = array('label'=>'Управление сертификатами', 'url'=>array('/warrant/admin/'));
}
$this->menu=array(
$new_menu_create,$new_menu_admin,
//	array('label'=>'Создать страницу', 'url'=>array('create')),
	array('label'=>'Обновить страницу', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Удалить страницу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->renderPartial('_view-once',array(
	'model'=>$model,
)); ?>