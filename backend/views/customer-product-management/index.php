<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerProductManagementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Product Managements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-product-management-index">

    <br>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}' ],
        ],
    ]); ?>
     <?= Html::a('Add', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
    <?php Pjax::end(); ?>

</div>
