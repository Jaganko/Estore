<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
$url=Yii::$app->homeUrl .'?r=category';
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
     <div class="col-lg-12">
    <?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span">Cancel</span>', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

    

    <?php ActiveForm::end(); ?>

</div>
