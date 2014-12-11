<?php
Yii::app()->clientScript->scriptMap=array(
    'jquery.js'=>false,
);
$this->beginWidget(
    'booster.widgets.TbModal',
    array('id' => 'claim_item_modal', 'options'=>array(
        'show'=>'true',
        'backdrop'=> 'static',
        'keyboard' => false
    ))
);
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Claim Lost Item</h4>
</div>

<div class="modal-body">
    <?php
    $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
        'id'=>'item-claim-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model,'first_name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <?php echo $form->textFieldGroup($model,'last_name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType'=>'button',
            'context'=>'primary',
            'label'=>'Claim',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

<?php $this->endWidget();?>

<script>

</script>
