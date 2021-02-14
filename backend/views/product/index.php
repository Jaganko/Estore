<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
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
            //'category_id',
            [
            'attribute' => 'category_id',
            'value' => function($model){
                 if($model->category){
                  return $model->category->category_name;
                  }                                
               }

            ],
            'product_name',
            'product_sdesc:ntext',
            //'product_desc:ntext',
            //'images:ntext',
            'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['style' => 'width:10%'],
            'template'=>'{view} {update} {active/inactive}',
                'buttons'=>[
                    'active/inactive' => function ($url, $model, $key) {
                        $options = array_merge([
                              //'class' => 'btn btn-primary btn-xs view view gridbtncustom modalView add-tooltip',
                              'data-toggle'=>'tooltip',
                              'title' => 'active/inactive',
                              'data-pjax' => '0',
                          ]);

                        $url=Yii::$app->homeUrl .'?r=product/change-status&id='.$model->id;
                        if($model->status == "A"){
                          return Html::a('<span class="fa fa-check "></span>', $url, $options);
                          }else{
                          return Html::a('<span class="fa fa-times-circle "></span>', $url, $options); 
                          }
                    }

                ],


             ],
        ],
    ]); ?>
    <?= Html::a('Add', ['create'], ['class' => 'btn btn-primary']) ?>
</div>

    <?php Pjax::end(); ?>

</div>
