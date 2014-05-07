<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />


    
    <?Yii::app()->clientScript->registerCoreScript('jquery');?>  
    <?Yii::app()->clientScript->registerCoreScript('jquery.ui');?> 
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fancybox/jquery.fancybox.css?v=2.0.4" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fancybox/helpers/jquery.fancybox-buttons.css?v=2.0.4" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/lib/fancybox/helpers/jquery.fancybox-thumbs.css?v=2.0.4" media="screen" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"> 
    <?PHP $cs=Yii::app()->getClientScript(); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/lib/fancybox/jquery.mousewheel-3.0.6.pack.js', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/lib/fancybox/jquery.fancybox.pack.js?v=2.0.4', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/lib/fancybox/helpers/jquery.fancybox-buttons.js?v=2.0.4', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/lib/fancybox/helpers/jquery.fancybox-thumbs.js?v=2.0.4', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/cufon.js', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/truth.js', CClientScript::POS_HEAD); ?>
    <?PHP $cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/scripts.js', CClientScript::POS_HEAD); ?>

    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <div id="wrap">
        <div id="header">
            <div id="logo"><div class="relative"><a href="/"></a></div></div>
            <div id="logo_text" class="cufon"><div class="relative"><h1>ПроектТехСервис</h1><a href="/"></a></div></div>            
            <div id="callback"><a href="/site/feedback" class="fancy">Связаться с нами</a></div>            
            <div id="slogan" class="cufon">индивидуальный подход и тщательная проработка <span>каждого проекта</span></div>            
            <div id="phone"><div class="cufon">8-922-074-6770</div>г. Тюмень, <br>ул. Станислава Карнацевича<br /> 14 кор.2</div>
        </div>
        <div id="slide_box">
            <div class="arrow_left"></div>
            <div class="arrow_right"></div>
            <div id="slider">                
                <ul class="absolute_list">
                    <li class="slide_1"><div class="cufon a_1"><a href="javascript:void(0);">Проекты производства работ</a></div></li> 
                    <li class="slide_2"><div class="cufon a_1"><a href="javascript:void(0);">Проекты производства работ кранами</a></div></li> 
                        <li class="slide_3"><div class="cufon a_1"><a href="javascript:void(0);">Технологические карты</a></div></li>
                </ul>
                <ul class="navigation">
                    <li rel='1' class="current"></li>
                    <li rel='2'></li>
                    <li rel='3'></li>
                </ul>
            </div>
        </div>
       
        <div id="main">
            <div class="left_part">
                <ul class="menu">
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/notes/2')!==false){echo" class='current'";}?>><?=CHtml::link('О компании', array('/notes/view', 'id'=>2))?></li>
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/category')!==false or strpos($_SERVER['REQUEST_URI'],'/services')!==false){echo" class='current_down'";}?>>
                        <a href="javascript:void(0);">Услуги</a>
                        <ul>
                            <li<?if(strpos($_SERVER['REQUEST_URI'],'/type/pprs')!==false){echo" class='current'";}?>><?=CHtml::link('ППР', array('/category/index/type/pprs'))?></li>
                            <li<?if(strpos($_SERVER['REQUEST_URI'],'/type/pprk')!==false){echo" class='current'";}?>><?=CHtml::link('ППРк', array('/category/index/type/pprk'))?></li>    
                            <li<?if(strpos($_SERVER['REQUEST_URI'],'/type/tk')!==false){echo" class='current'";}?>><?=CHtml::link('ТК', array('/category/index/type/tk'))?></li> 
                            <li<?if(strpos($_SERVER['REQUEST_URI'],'/type/vektor')!==false){echo" class='current'";}?>><?=CHtml::link('Векторизация', array('/category/index/type/vektor'))?></li>                       
                        </ul>
                    </li>
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/works')!==false){echo" class='current'";}?>><?=CHtml::link('Примеры работ', array('/works'))?></li>
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/notes/4')!==false){echo" class='current'";}?>><?=CHtml::link('Экспертиза ППРк', array('/notes/view', 'id'=>4))?></li>
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/notes/6')!==false){echo" class='current'";}?>><?=CHtml::link('Сертификаты', array('/notes/view', 'id'=>6))?></li>
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/notes/3')!==false){echo" class='current'";}?>><?=CHtml::link('Контакты', array('/notes/view', 'id'=>3))?></li>
                    <!--<li<?if(strpos($_SERVER['REQUEST_URI'],'/portfolio')!==false){echo" class='current'";}?>><?=CHtml::link('Примеры работ', array('/portfolio'))?></li>-->
                    <li<?if(strpos($_SERVER['REQUEST_URI'],'/review')!==false){echo" class='current'";}?>><?=CHtml::link('Отзывы', array('/review'))?></li>

                </ul>
            </div>
            <script type="text/javascript">
            $('.current_down').find('ul').show();
            </script>
            <div class="right_part">
            <?php if(isset($this->breadcrumbs)):?>
        		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
        			'links'=>$this->breadcrumbs,
                    'separator'=>'<li>/</li>',
                    'tagName'=>'ul',
                     'homeLink'=>CHtml::link('Главная','/'),
                    'htmlOptions' => array('id'=>'breadcrums'),
        		)); ?><!-- breadcrumbs -->
        	<?php endif?> 
            
                <?=$content?>
                
            </div>
            
        </div>
        
   </div>
   <div id="footer">
   <div class="small_f">
        <div class="small_logo cufon">ПроектТехСервис<span>все права защищены</span></div>
        <div id="copyright"><div id="c"><a href="http://amobile-studio.ru" title="Создание сайта А-Мобайл Тюмень"></a>Создание сайта</div></div>
        <div class="fast_phone"><span class="cufon">8-922-074-6770</span>ул. Станислава Карнацевича 14 кор.2 </div>
   </div>
   
   </div>
   
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter17177932 = new Ya.Metrika({id:17177932, enableAll: true, webvisor:true});
        } catch(e) { }
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/17177932" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>