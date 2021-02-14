<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerProductManagement */

$this->title = 'Create Customer Product Management';
$this->params['breadcrumbs'][] = ['label' => 'Customer Product Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-product-management-create">
<div class="col-lg-12">
    <?= $this->render('_form', [
        'model' => $model,
        'customer'=>$customer,
        'product'=>$product,
    ]) ?>
</div>
</div>
