<?php
$cs = Yii::app()->clientScript->scriptMap = array(
    'datepicker3.css' => false,
    'jquery.js' => false,
    'bootstrap-datepicker.min.js' => false,
    'bootstrap-datepicker-noconflict.js' => false,
    'jquery.maskedinput.js' => false,
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
    <h3>Claim Lost Item</h3>
</div>

<div class="modal-body">
    <?php
    $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
        'id'=>'item-claim-form',
        'enableClientValidation' => true,
        'clientOptions' => array('validateOnSubmit' => true, 'afterValidate' => 'js:yiiFix.ajaxSubmit.afterValidate'),
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->hiddenField($model, 'item_id'); ?>

    <?php echo $form->textFieldGroup($model,'first_name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <?php echo $form->textFieldGroup($model,'last_name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

    <div class="form-actions">
        <?php echo CHtml::ajaxSubmitButton(
            'Claim',
            Yii::app()->createUrl('/lostandfound/claimItem'),
            array(
                'type' => 'POST',
                'beforeSend' => 'js:yiiFix.ajaxSubmit.beforeSend("#item-claim-form")',
                'data' => 'js: $("#item-claim-form").serialize()',
                'success' => 'function(data){
                            $("#claim_item_modal").modal("hide");
                            $("#claim_item_modal").on("hidden.bs.modal", function (e){
                            $("#claim_item_modal").remove();
                            $("#main-content").html(data);
                        });
                    }'
            ),
            array(
                'class' => 'btn btn-primary',
                'id' => 'claim_button-' . uniqid(),
            )
        ); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

<?php $this->endWidget();?>

<script>

</script>
