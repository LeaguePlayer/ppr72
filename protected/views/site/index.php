<?php
    $this->pagetitle = "ПроектТехСервис Тюмень";
    $this->menu=array(
        array('label'=>'Текст на главной', 'url'=>array('notes/update','id'=>1)),
        array('label'=>'Текст обратной связи', 'url'=>array('/notes/update', 'id'=>5)),        
        array('label'=>'Выйти из панели', 'url'=>'/user/logout'),
    );

?>

<div class="typography">
                    <h2><?=$main_text->name?></h2>

                   <?=$main_text->full_desc?>
                </div>
                <div class="modules">
                    <div class="module">
                        <h3>Новости</h3>
                        <?php $this->renderPartial('/news/_view',array(
                        	'data'=>$last_new,
                        )); ?>
                    </div>
                    <div class="module">
                        <h3>Услуги</h3>  
                            <div class="services">                            
                                <?php $this->renderPartial('/site/_services',array(
                                	'services'=>$services,
                                )); ?> 
                            </div>                            
                    </div>
</div>