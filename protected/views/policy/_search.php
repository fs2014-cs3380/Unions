<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'policy_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textAreaGroup($model,'title', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

		<?php echo $form->textAreaGroup($model,'text', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

		<?php echo $form->textFieldGroup($model,'category_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'create_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'create_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'update_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

		<?php echo $form->textFieldGroup($model,'update_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
