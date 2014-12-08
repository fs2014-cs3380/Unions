<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'user-form',
    'enableAjaxValidation' => false,
)); ?>

<?php echo $form->textFieldGroup($model, 'email_address', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 80)))); ?>

<?php /*echo $form->textFieldGroup($model, 'sso', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 30)))); */?>

<?php echo $form->passwordFieldGroup($model, 'password'); ?>

<?php echo $form->passwordFieldGroup($model, 'password_repeat'); ?>

<div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>
