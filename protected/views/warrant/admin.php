
<h1>Управление сертификатами</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'warrant-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'img',
		'short_desc',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
