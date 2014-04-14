<?php
$this->breadcrumbs=array(
	'Услуги'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список услуг', 'url'=>array('index')),
	array('label'=>'Управление услугами', 'url'=>array('admin')),
);
?>

<h1>Создание услуги</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>