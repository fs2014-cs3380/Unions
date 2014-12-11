<?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'group-name-change-form',
    'type' => 'inline',
    'enableAjaxValidation' => false,
)); ?>

<p class="help-block"><i><span class="required">*</span>Type the department name exactly as it appears in EMS</i></p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->select2Group($model, 'group_id', array(
    'widgetOptions' => array(
        'name' => 'GroupNameChange_group_id',
        'asDropDownList' => true,
        'data' => People::getAllGroups(),
        'options' => array(
            /*'data'=>People::getAllGroups(),*/
            /*'tags'=>People::getAllGroups(),*/
            /*'initSelection'=>'js:function(element, callback){
                data = {
                "id": "test",
                "text": "testtext",
                }

                callback(data);
            }',*/
            'minimumInputLength' => 1,
            'placeholder' => 'Department',
            /* 'width' => '40%', */
            'tokenSeparators' => array(',', ' ')
        )
    )
)); ?>

<?php echo $form->textFieldGroup($model, 'new_name', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 50)))); ?>

<?php $this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' => $model->isNewRecord ? 'Create' : 'Save',
)); ?>

<?php $this->endWidget(); ?>
