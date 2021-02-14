<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">
<div class="col-lg-12">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'product_name',
            'product_sdesc:ntext',
            'product_desc:ntext',
            //'images:ntext',
            'status',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>  
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

    <?= Html::a('<span>Back</span>', ['index'], ['class' => 'btn btn-primary']) ?>
</div>
</div>
