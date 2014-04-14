<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'services-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note"><span class="required">*</span> Обязательные для заполнения</p>

	<?php echo $form->errorSummary($model); ?>
    
    <?if($model->img){?>    
        <div class="row">    
            <?echo CHtml::image(fnc::getThumb(Yii::app()->params['services'],$model->img,115,161));?>
    	</div>
    <?}?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->dropDownList($model,'id_category',Category::getCollection()); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'cost'); ?>
		<?php echo CHtml::textField('Services[cost]',($model->cost!='' ? $model->cost : 0),array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cost'); ?>
	</div>    
    
    <div class="row">
		<?php echo $form->labelEx($model,'presence'); ?>
		<?php echo $form->dropDownList($model,'presence',array(0=>'Нет',1=>'Да')); ?>
		<?php echo $form->error($model,'presence'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_desc'); ?>
		<?php $this->widget('application.extensions.tinymce_elfinder.tinymce.ETinyMce', array('name'=>'Services[short_desc]','value'=>$model->short_desc,  'options' => array(   
            'theme' => 'advanced',
             'width'=>'90%',
                'height'=>'450px',
        
            'plugins' =>'autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
            'language'=>"ru",    
            'theme_advanced_buttons1' => "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        	'theme_advanced_buttons2' =>"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        	'theme_advanced_buttons3' => "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        	'theme_advanced_buttons4' =>"insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            'theme_advanced_toolbar_location' => "top",
        	'theme_advanced_toolbar_align'=>"left",
        	'theme_advanced_statusbar_location' =>"bottom",
        	'theme_advanced_resizing' =>true,
        
            ),
        
        )); ?>
		<?php echo $form->error($model,'short_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'full_desc'); ?>
		<?php $this->widget('application.extensions.tinymce_elfinder.tinymce.ETinyMce', array('name'=>'Services[full_desc]','value'=>$model->full_desc,  'options' => array(   
            'theme' => 'advanced',
             'width'=>'90%',
                'height'=>'450px',
        
            'plugins' =>'autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
            'language'=>"ru",    
            'theme_advanced_buttons1' => "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        	'theme_advanced_buttons2' =>"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        	'theme_advanced_buttons3' => "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        	'theme_advanced_buttons4' =>"insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            'theme_advanced_toolbar_location' => "top",
        	'theme_advanced_toolbar_align'=>"left",
        	'theme_advanced_statusbar_location' =>"bottom",
        	'theme_advanced_resizing' =>true,
        
            ),
        
        )); ?>
		<?php echo $form->error($model,'full_desc'); ?>
	</div>

	<div class="row">    
		<?php echo $form->labelEx($model, 'img'); ?>
        <?php echo CHtml::activeFileField($model, 'img'); ?>
		<?php echo $form->error($model,'img'); ?>
	</div>
    
    <fieldset>
    <legend>Для продвижение сайта в поисковых системах</legend>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_keys'); ?>
		<?php echo $form->textArea($model,'meta_keys',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_keys'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_desc'); ?>
		<?php echo $form->textArea($model,'meta_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_desc'); ?>
	</div>
    
    </fieldset>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->