<?php
$this->breadcrumbs=array(
	'Управление подразделами',
);

$this->menu=array(
	array('label'=>'Создать подраздел', 'url'=>array('create')),

);


?>

<h1>Управление подразделами</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		
		'name',
        /*
        'id_type',
		'meta_title',
		'meta_keys',
		'meta_html',
		
		'meta_desc',
		'last_update',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
