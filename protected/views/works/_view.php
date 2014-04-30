<?php
/* @var $this WorksController */
/* @var $data Works */
?>

<div class="works">

	<h2><?= $data->title;?></h2>
    <? if (UserModule::isAdmin()) : ?>
        <p>
            <a href="/works/update/<?= $data->id;?>">Редактировать</a>
            <a href="/works/delete/<?= $data->id;?>">Удалить</a>
        </p>
    <? endif; ?>
	<div class="image">
        <? if($data->image): ?>
            <img src="/uploads/works/<?=$data->id?>.jpg" width="320" alt="<?= $data->title;?>"/>
        <? endif; ?>
	</div>
    <div class="content">
        <div class="text"><?=$data->text?></div>
    </div>
    <div class="clearfix"></div>

<? if (!empty($data->workImages)): ?>
	<div class="images">
		<h3>Схемы и проектировки</h3>
        <ul>
        <? foreach($data->workImages as $img): ?>
            <li><a class="fancybox" rel="group<?= $data->id;?>" href="/uploads/works/<?= $img->url; ?>"><?= CHtml::image(fnc::getThumb('uploads/works/',$img->url,'',120),'');?></a></li>
        <? endforeach; ?>
        </ul>
	</div>
<? endif; ?>

</div>