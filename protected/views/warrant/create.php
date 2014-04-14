<?php
$this->breadcrumbs=array(
	'Сертификаты'=>array('/notes/view/id/6'),
	'Загрузка сертефиката',
);

$this->menu=array(

	array('label'=>'Управление сертификатами', 'url'=>array('admin')),
);
?>

<h1>Загрузка сертефиката</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>