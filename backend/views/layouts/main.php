<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use backend\controllers\SiteController;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use  yii\web\Session;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Model;
use yii\widgets\Pjax;

DashboardAsset::register($this);
$session = Yii::$app->session;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" ">
    <meta name="keywords" content="">
<title>Estore</title>	
  <!--  favicon -->
<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>

  <body>

  <?php $this->beginBody() ?>

     <!-- Sidebar -->
     <?php  echo $this->render('left_menu.php'); ?>
 
     <!-- Topbar -->
    <header class="topbar">
           

        <h4><span>Hi <?php if($session['user_logintype'] == "admin"){ echo "Admin"; } else{ echo "User";}?>,</span></h4>


    
      <div class="topbar-right">      
        
        <div class="topbar-divider"></div>
       
        <ul class="topbar-btns">
          <li>
              <?php  if (Yii::$app->user->isGuest) {
                 Html::beginForm(['/site/logout'], 'post');
                    //echo  ['label' => 'Sign out', 'url' => ['/site/login']];
                 } else {
                       echo '<a>'
                           . Html::beginForm(['/site/logout'], 'post')
                           . Html::submitButton(
                               '<i class="fa fa-fw fa-sign-out"></i><strong> Logout</strong>',
                               ['class' => 'btn logout-btn']
                           )
                           . Html::endForm()
                           . '</a>';
                 } ?>
           </li>
           
          <!-- END Notifications -->

          <!-- Messages -->
          
          <!-- END Messages -->

        </ul>

      </div>
    </header>
    <!-- END Topbar -->


    <!-- Main container -->
    <main class="main-container">


      <div class="main-content">

 <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>


        <div class="card dashboard-card">
          
             
        <?= Alert::widget() ?>
        <?= $content ?>
          
 
          <div class="media-list media-list-divided media-list-hover">
          </div>
        </div>
      </div><!--/.main-content -->


      <!-- Footer -->
       <?php $this->beginContent('@backend/views/layouts/footer.php'); ?>
       <?php $this->endContent(); ?>
      <!-- END Footer -->

    </main>
    <!-- END Main container -->

  <?php  $this->endBody() ?>
  </body>


</html>
<?php $this->endPage() ?>




