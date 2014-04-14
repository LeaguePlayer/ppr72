<?php
$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	'Создание вопрос-ответ',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создание Вопрос-ответ</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>