<div class="service">

	<?php echo CHtml::link($data->name, array('/services/index/category/'.$data->id)); ?>
<span>(<?=$data->meta_keys?>)</span>
</div>