<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array(
            'class'=>'well',
        )
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>



    <?php echo $form->textFieldGroup($model, 'username', array(
        'widgetOptions'=>array(
            'htmlOptions'=>array(
                'style'=>'max-width: 400px;',
            )
        ),
    )); ?>



    <?php echo $form->passwordFieldGroup($model, 'password', array(
        'widgetOptions'=>array(
            'htmlOptions'=>array(
                'style'=>'max-width: 400px;',
            )
        ),
    )); ?>
    <p class="hint">
        Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
    </p>


        <?php echo $form->checkBoxGroup($model, 'rememberMe'); ?>

    <?php $this->widget('booster.widgets.TbButton', array(
        'buttonType'=>'submit',
        'context'=>'primary',
        'label'=>'Login',
    )); ?>

    <?php $this->endWidget(); ?>
</div><!-- form -->
