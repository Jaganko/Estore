<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerProductManagement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-product-management-form">
<br>
 <div class="col-lg-12">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-12">
    <?php $disabled=false;
    if(isset($model->id)){
    $disabled=true; 
    }
    
    ?>
    <?= $form->field($model, 'customer_id')->dropDownList($customer,['class'=>'form-control','prompt'=>'','disabled'=>$disabled]) ?>

    <?= $form->field($model, 'product_id')->checkboxList($product) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('<span">Cancel</span>', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
