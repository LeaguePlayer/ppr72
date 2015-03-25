<?=$model->full_desc?>

<?if($model->id==6){?>
<?$warrants = Warrant::model()->findAll('img!=""');?>
<div id="warrant">
    <?foreach($warrants as $warrant){
        echo "<div class='w'>";
        $body_img =  CHtml::image(fnc::getThumb(Yii::app()->params['warrant'],$warrant->img,250,190),'',array('class'=>'new'));
        $self_link = '/'.Yii::app()->params['warrant'].$warrant->img;
        echo CHtml::link($body_img,$self_link,array('class'=>'fancy_run','rel'=>'one_game','title'=>$warrant->short_desc)); 
        echo "</div>";        
    }?>
</div>
<?}?>

