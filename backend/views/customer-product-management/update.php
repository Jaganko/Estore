<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerProductManagement */

$this->title = 'Update Customer Product Management: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer Product Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-product-management-update">


    <?= $this->render('_form', [
        'model' => $model,
        'customer'=>$customer,
        'product'=>$product,
    ]) ?>

</div>
