<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'policy-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'title', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span8')))); ?>

    <?php echo $form->select2Group($model, 'category_id', array(
        'widgetOptions'=>array(
            'asDropDownList'=> true,
            'data'=>Policy::getCategoryOptions(),
            'options'=>array(
                'maximumSelectionSize'=>1,
            ),
            'htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textAreaGroup($model,'text', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
