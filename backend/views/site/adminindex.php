<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
    <!-- Main container -->
    <main class="main-container">

      <div class="main-content">
        <div class="row">


          <div class="col-lg-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Total Category</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="<?php echo Yii::$app->homeUrl ?>?r=category/index">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $category?></p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Total Active Product</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="<?php echo Yii::$app->homeUrl ?>?r=product/index">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $active?></p>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 65%; height: 4px;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4">
            <div class="card card-body">
              <h6>
                <span class="text-uppercase">Total Inactive Product</span>
                <span class="float-right"><a class="btn btn-xs btn-primary" href="<?php echo Yii::$app->homeUrl ?>?r=product/index">View</a></span>
              </h6>
              <br>
              <p class="fs-28 fw-100"><?php echo $inactive?></p>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%; height: 4px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>

       	</div>
    </div>
</main>
