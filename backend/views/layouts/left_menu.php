<?php


use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

$session = Yii::$app->session;

?>
    <!-- Sidebar -->
    <aside class="sidebar sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg">
      <header class="sidebar-header">
        <span class="logo">
         <h2> Estore </h2>
        </span>
        <span class="sidebar-toggle-fold"></span>
      </header>

      <nav class="sidebar-navigation">
        <ul class="menu">

          <li class="menu-item">
            <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=site/index">
              <span class="icon fa fa-home"></span>
              <span class="title">Dashboard</span>
            </a>
          </li>
          <?php if($session['user_logintype'] == "admin"){ ?>
          <li class="menu-category">Category</li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-tv"></span>
              <span class="title">Category</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=category/index">
                  <span class="dot"></span>
                  <span class="title">Categories</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=category/create">
                  <span class="dot"></span>
                  <span class="title">Create Category</span>
                </a>
              </li>
            </ul>
          </li>



          <li class="menu-category">Product</li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon ti-layout"></span>
              <span class="title">Product</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=product/index">
                  <span class="dot"></span>
                  <span class="title">Product List</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link"  href="<?php echo Yii::$app->homeUrl ?>?r=product/create">
                  <span class="dot"></span>
                  <span class="title">Product Create</span>
                </a>
              </li>

              <!-- <li class="menu-item">
                <a class="menu-link" href="layout/sidebar.html">
                  <span class="dot"></span>
                  <span class="title">Sidebar</span>
                </a>
              </li> -->
            </ul>

            <li class="menu-category">Customer Product</li>


          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon ti-layout-grid3-alt"></span>
              <span class="title">Customer Product</span>
              <span class="arrow"></span>
            </a>
            
            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=customer-product-management/index">
                  <span class="dot"></span>
                  <span class="title">Customer Product List</span>
                </a>
              </li>

              <li class="menu-item">
                <a class="menu-link"  href="<?php echo Yii::$app->homeUrl ?>?r=customer-product-management/create">
                  <span class="dot"></span>
                  <span class="title">Customer Product Create</span>
                </a>
              </li>

            </ul>
          </li>

          </li>
        <?php } else if($session['user_logintype'] == "user"){ ?>
          <li class="menu-item">
            <a class="menu-link" href="#">
              <span class="icon fa fa-tv"></span>
              <span class="title">Products</span>
              <span class="arrow"></span>
            </a>

            <ul class="menu-submenu">
              <li class="menu-item">
                <a class="menu-link" href="<?php echo Yii::$app->homeUrl ?>?r=category/index">
                  <span class="dot"></span>
                  <span class="title">My Products</span>
                </a>
              </li>

            </ul>
          </li>
        <?php } ?>
        </ul>
      </nav>

    </aside>
    <!-- END Sidebar -->



