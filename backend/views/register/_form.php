<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
        <div class="col-lg-6 col-sm-6">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'address')->textarea(['maxlength' => true])->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>
    </div>
<div class="col-lg-6 col-sm-6">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

</div>
</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <hr>
        <h4><p>Already have an account? <a href="<?php  Yii::$app->homeUrl ?>?r=site/login">Sign in</a>.</p></h4>
    </div>
    <?php ActiveForm::end(); ?>

</div>
