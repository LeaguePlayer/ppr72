<?php
/* @var $this ReviewController */
/* @var $data Review */
?>

<div class="review">

	<div class="review_image">
        <? if($data->img): ?>
            <img src="/uploads/reviews/<?=$data->id?>.jpg" width="135" alt=""/>
        <? else: ?>
            <img src="/uploads/reviews/no_img.jpg" width="135" alt=""/>
        <? endif; ?>
	</div>
    <div class="review_content">
        <div class="review_text"><?=$data->text?></div>
        <div class="review_info">
            <div class="review_author"><?=$data->name?></div>
            <div class="review_date"><?=$data->date?></div>
        </div>
    </div>
    <div class="clearfix"></div>

</div>