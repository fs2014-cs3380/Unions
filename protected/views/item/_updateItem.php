<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'item-form',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldGroup($model, 'location', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'description', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 255)))); ?>

<?php echo $form->textFieldGroup($model, 'found_user', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 45)))); ?>

<?php echo $form->datePickerGroup($model, 'found_date', array('widgetOptions' => array('options' => array(), 'htmlOptions' => array('class' => 'span5')), 'prepend' => '<i class="glyphicon glyphicon-calendar"></i>', 'append' => 'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->dropdownListGroup($model, 'item_type_id', array('widgetOptions' => array('data' => ItemType::getItemTypeOptions()))); ?>

<?php echo $form->dropdownListGroup(ItemStatus::model(), 'item_status_id', array('widgetOptions' => array('data' => ItemStatus::getItemStatusOptions()))); ?>


<!--	<?php /*echo $form->textFieldGroup($model,'create_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

	<?php /*echo $form->textFieldGroup($model,'create_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

	<?php /*echo $form->textFieldGroup($model,'update_time',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

	--><?php /*echo $form->textFieldGroup($model,'update_user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); */ ?>

<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
        'id'=>'UpdateItemBtn',
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget();

