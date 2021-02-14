<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-6 col-sm-6">
        <?= $form->field($model, 'category_id')->dropDownList($category,['class'=>'form-control','prompt'=>'']) ?>

        <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'product_sdesc')->textarea(['rows' => 2]) ?>
        
        <?= $form->field($model, 'product_desc')->textarea(['rows' => 6]) ?>
    </div>
<div class="col-lg-6 col-sm-6">
        

        <?php if(!empty($model->images)){ /*echo "<pre>"; print_r($imagefind); die;*/ 
        $images=explode("~", $model->images);
        $length=count($images);

       /* echo "<pre>";
        print_r($images);
        die;*/
        for ($i=0; $i <  $length; $i++) {  ?>
          <div  class="img-wraps module_<?php echo $oneimage['id']  ?>">   
          <img src="<?php echo $images[$i]?>" name="<?php $images[$i] ?>" id="profile-img-tag" width="150px" height="150px" />
          </div>
      <?php }  } ?>


        <?= $form->field($model, 'images[]')->fileInput(['multiple' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span">Cancel</span>', ['index'], ['class' => 'btn btn-primary']) ?>
        </div>

</div>

    <?php ActiveForm::end(); ?>

</div>
