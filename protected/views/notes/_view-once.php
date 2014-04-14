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
<?}elseif($model->id==3){?>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
<div id="ymaps-map-id_135469319716413393831" style="width: 680px; height: 402px;"></div>

<script type="text/javascript">function fid_135469319716413393831(ymaps) {var map = new ymaps.Map("ymaps-map-id_135469319716413393831", {center: [65.58032396596948, 57.11233724642823], zoom: 14, type: "yandex#map"});map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));map.geoObjects.add(new ymaps.Placemark([65.5776, 57.108599], {balloonContent: 'ООО "ПроектТехСервис"<br/>ул. Cтанислава Карнацевича, 14, корпус 2<br/>оф.209/1'}, {preset: "twirl#redDotIcon"}));};</script>
<script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?lang=ru-RU&coordorder=longlat&load=package.full&wizard=constructor&onload=fid_135469319716413393831"></script>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->
<?}?>