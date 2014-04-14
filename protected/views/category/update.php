<?php
$this->breadcrumbs=array(

	'Редактирование',
);

$this->menu=array(
	array('label'=>'Создать подраздел', 'url'=>array('create')),
	array('label'=>'Управление подразделами', 'url'=>array('admin')),
);
?>

<h1>Редактирование подраздела "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>