<div class="new goodies">
<?if($data->img){?>
<div class="bord_rel"><?echo CHtml::image(fnc::getThumb(Yii::app()->params['services'],$data->img,90,90),'',array('class'=>'new'));?>
<?php echo CHtml::link('', array('/services/view', 'id'=>$data->id)); ?>
</div>

<?}?>
<div class="info">
<?php echo CHtml::link($data->title, array('/services/view', 'id'=>$data->id)); ?>

<?=$data->short_desc?>
</div>
<div class="bart">
    <?if($data->cost){echo "<div>от {$data->cost} руб.</div>";}?>
    <?if($data->cost){
        $presence = ($data->presence==1 ? 'Есть в наличии' : 'Нет в наличии');
        echo "<div>{$presence}</div>";
    }?>
</div>
</div>