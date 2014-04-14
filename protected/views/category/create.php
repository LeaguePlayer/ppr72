<?php
$this->breadcrumbs=array(

	'Создание подкатегории',
);

$this->menu=array(

	array('label'=>'Управление подкатегориями', 'url'=>array('admin')),
);
?>

<h1>Создание подкатегории</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>