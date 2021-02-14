 <?php

use yii\widgets\Pjax;
use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'Estore';
?>
    <!-- Main container -->
    <main class="main-container">


      <div class="main-content">

        <div class="media-list media-list-divided media-list-hover" data-provide="selectall">

          <header class="flexbox align-items-center media-list-header bg-transparent b-0 py-16 pl-20">

            <div>
              <span><b>SEARCH</b></span>
              <div class="lookup lookup-circle lookup-right">
                <input type="text" data-provide="media-search">
              </div>
            </div>
          </header>

          <div class="media-list-body bg-white b-1">

        <?php foreach ($prodcut_array_map as $key => $oneproduct) { ?>

          <div class="media align-items-center">
             <?php $images=explode("~", $oneproduct['images']) ?>
                <img src="<?php echo $images[0]?>" name="<?php $images[0] ?>" id="profile-img-tag" width="100px" height="100px" />

              <a class="media-body" href="#qv-product-details" data-toggle="quickview">
                <h3><?php echo ucwords($category_index[$oneproduct['category_id']]['category_name']) ?></h3>
                <h6><?php echo ucwords($oneproduct['product_name']) ?></h5>
                <small><?php echo wordwrap($oneproduct['product_desc'],100) ?></small>
              </a>

               
   
            </div>

        <?php } ?>

          </div>

        </div>


      </div><!--/.main-content -->


    </main>
    <!-- END Main container -->
