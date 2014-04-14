<?php $this->beginContent('//layouts/main'); ?>
	
			<?php echo $content; ?>
	
    
    <?Yii::app()->getModule('user');
    if(UserModule::isAdmin())
    {?>
	<div class="span-5 last" id="navigation_panel">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Администрирование',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
    <?}?>
<?php $this->endContent(); ?>