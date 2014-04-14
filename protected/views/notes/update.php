<?php
$this->menu=array(

//	array('label'=>'Создать страницу', 'url'=>array('create')),
//	array('label'=>'Просмотр страницы', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Управление страницами', 'url'=>array('admin')),
    array('label'=>'На главную', 'url'=>'/'),
);
?>

<h1>Редактирование "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>