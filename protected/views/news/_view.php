<div class="new">
<?echo CHtml::image(fnc::getThumb(Yii::app()->params['news'],$data->img,75,75),'',array('class'=>'new l_m'));?>
<div class="info">
<?php echo CHtml::link($data->title, array('/news/view', 'id'=>$data->id)); ?>
<div class="time"><?=fnc::getCalendarDay($data->date_public)?></div>
<?=$data->short_desc?>
</div>

</div>