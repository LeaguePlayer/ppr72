<?php
$this->breadcrumbs=array(
	'Вопросы и ответы'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать вопрос-ответ', 'url'=>array('create')),

	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование Вопроса и ответа</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>