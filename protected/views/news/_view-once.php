<?$body_img = CHtml::image(fnc::getThumb(Yii::app()->params['news'],$model->img,150,150),'',array('class'=>'new l_m'));;
      $self_link = '/'.Yii::app()->params['news'].$model->img;
                    echo CHtml::link($body_img,$self_link,array('class'=>'fancy_run','rel'=>'one_game'));     
    ?>

<?=$model->full_desc?>
<div><div class="time"><?=fnc::getCalendarDay($model->date_public)?></div></div>