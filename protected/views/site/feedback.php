<?

if($note->meta_title) $this->pageTitle= $note->meta_title;
else $this->pageTitle = $note->name.' - ПроектТехСервис Тюмень';


$this->menu=array(

	array('label'=>'Редактировать страницу', 'url'=>array('/notes/update', 'id'=>$note->id)),

);
?>

<div class="typography">
<h1><?=$note->name?></h1>
<?if($sended){?>
<div class="red_zone">Ваше сообщение успешно отправлено администратору сайта, оно будет рассмотрено в ближайшее время!</div>
<?}?>
<?if($error==1){?>
<div class="green_zone">Не все обязательные поля были заполнены!</div>
<?}?>

<?=$note->full_desc?>
<?if(!$sended){?>
<?php $this->renderPartial('_form',array('text'=>$text)); ?>
<?}?>
</div>