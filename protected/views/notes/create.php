<?php


$this->menu=array(

	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Создание статической страницы</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>