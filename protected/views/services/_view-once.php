<div style="overflow: hidden;padding-bottom: 10px;"> 
    <?
        if($model->img)
        {
          $body_img =  CHtml::image(fnc::getThumb(Yii::app()->params['services'],$model->img,250,190),'',array('class'=>'new l_m'));
          $self_link = '/'.Yii::app()->params['services'].$model->img;
          echo CHtml::link($body_img,$self_link,array('class'=>'fancy_run','rel'=>'one_game')); 
        }    
    ?>
    <?if($model->cost){?><div class="part_info">Стоимость услуги: от <strong><?=$model->cost?></strong> руб.</div><?}?>
    <div class="part_info">Товар в наличии: <strong><?echo ($model->presence==1 ? 'Да' : 'Нет')?></strong></div>
    <div class="part_info"><a class="goods fancy" href="/site/feedback/order/<?=$model->id?>">Заказать товар</a></div>
</div>
<?=$model->full_desc?>
