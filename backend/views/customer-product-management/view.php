<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerProductManagement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Product Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-product-management-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'customer_id',
            [
            'attribute' => 'customer_id',
            'value' => function($model){
                 if($model->customer){
                  return $model->customer->username;
                  }                                
               }

            ],
            //'product_id',
            [
            'attribute' => 'product_id',
            'value' => function($model){
                 if($model->getProducts($model->product_id)){
                    return $model->getProducts($model->product_id);
                  }                                
               }

            ],
            'status',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>
    <?= Html::a('<span>Back</span>', ['index'], ['class' => 'btn btn-primary']) ?>
</div>
