<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Обязательные для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type'); ?>
		<?php echo $form->dropDownList($model,'id_type',fnc::getCategoryService()); ?>
		<?php echo $form->error($model,'id_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

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

	<div class="row">
		<?php echo $form->labelEx($model,'meta_html'); ?>
		<?php $this->widget('application.extensions.tinymce_elfinder.tinymce.ETinyMce', array('name'=>'Category[meta_html]','value'=>$model->meta_html,  'options' => array(   
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
		<?php echo $form->error($model,'meta_html'); ?>
	</div>

	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать раздел' : 'Сохранить раздел'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->