<?php
$this->menu=array(

	array('label'=>'Создать страницу', 'url'=>array('create')),
);

?>

<h1>Управление статическими страницами</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'notes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		
        
		'full_desc',
        /*
		'meta_title',
		'meta_keys',
		
		'meta_desc',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
