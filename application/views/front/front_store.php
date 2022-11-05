<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php echo $view_header;?>

<body id="body">

<?php echo $top_header;?>


<!-- Main Menu Section -->
<?php echo $top_menu;?>

<div class="hero-slider">
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-1.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-center">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href=" ">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-3.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-left">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href=" ">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
 <div class="slider-item th-fullpage hero-area" style="background-image: url(<?php echo base_url('assets/front/images/slider/slider-2.jpg');?>);">
   <div class="container">
     <div class="row">
       <div class="col-lg-8 text-right">
         <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
         <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
         <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="">Shop Now</a>
       </div>
     </div>
   </div>
 </div>
</div>

  <div class="container" style="margin-bottom:50px">
    <div class="row" style="margin-top: 50px">
      <div class="col-md-3  col-sm-12">
        <div class="support-wrap">
          <div class="support-icon" style="display: inline-block; float: left; vertical-align: center">
            <img style="margin-top:10px" src="<?php echo base_url('assets/front/images/support/support-1.png');?>">
          </div>
          <div class="support-content" style="display: inline-block; float: left; margin-left: 20px">
            <h5>Free Shipping</h5>
            <p>Free shpping on all order</p>
          </div>
        </div>
      </div>
      <div class="col-md-3  col-sm-12">
      <div class="support-wrap">
          <div class="support-icon" style="display: inline-block; float: left; vertical-align: center">
            <img style="margin-top:10px" src="<?php echo base_url('assets/front/images/support/support-2.png');?>">
          </div>
          <div class="support-content" style="display: inline-block; float: left; margin-left: 20px">
            <h5>Support 24/7</h5>
            <p>Free shpping on all order</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-3  col-sm-12">
      <div class="support-wrap">
          <div class="support-icon" style="display: inline-block; float: left; vertical-align: center">
            <img style="margin-top:10px" src="<?php echo base_url('assets/front/images/support/support-3.png');?>">
          </div>
          <div class="support-content" style="display: inline-block; float: left; margin-left: 20px">
            <h5>Money Return</h5>
            <p>Free shpping on all order</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
      <div class="support-wrap">
          <div class="support-icon" style="display: inline-block; float: left;">
            <img style="margin-top:10px" src="<?php echo base_url('assets/front/images/support/support-4.png');?>">
          </div>
          <div class="support-content" style="display: inline-block; float: left; margin-left: 20px">
            <h5>Order Discount</h5>
            <p>Free shpping on all order</p>
          </div>
        </div>
    </div>
  </div>

<section class="product-category section" style="padding: 0">
       <div class="row">
           <div class="title text-center">
               <h2>Trendy Products</h2>
           </div>
       </div>
       <div class="row">
           <?php for($i=0;$i<count($products);$i++):?>
           <div class="col-md-4">
               <div class="product-item">
                   <div class="product-thumb">
                       <span class="bage">Sale</span>
                       <img class="img-responsive" src="<?php echo $products[$i]['img'];?>" alt="product-img" />
                       <div class="preview-meta">
                           <ul>
                               <li>
                               <!-- product_id, product_name, product_price, product_img, product_desc -->
                               
                                   <span onclick='onClickDlg(<?php echo json_encode($products[$i]);?>)'>
                                       <i class="tf-ion-ios-search-strong"></i>
                                   </span>
                               </li>
                               
                               <li>
                                   <span onclick="addItemToCartByProductId(<?php echo $products[$i]['id'];?>)"><i class="tf-ion-android-cart"></i></span>
                               </li>
                           </ul>
                         </div>
                   </div>
                   <div class="product-content">
                       <h4><a href="product-single.html"><?php echo $products[$i]['name'];?></a></h4>
                       <p class="price">&#163;<?php echo $products[$i]['price'];?></p>
                   </div>
               </div>
           </div>
          <?php endfor;?>
       
            <!-- Modal -->
            <div class="modal product-modal fade" id="product-modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tf-ion-close"></i>
                </button>
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                                <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <div class="modal-image">
                                            <img class="img-responsive" id="modal_img" alt="product-img" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-short-details">
                                            <h2 class="product-title" id="modal_product_name"></h2>
                                            <p class="product-price" id="modal_product_price">&#163;</p>
                                            <p class="product-short-description" id="modal_product_desc">
                                                
                                            </p>
                                            <button onclick="addItemToCart()" id="modal_product_add_to_cart" class="btn btn-main" data-value="0">Add To Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div><!-- /.modal -->
       </div>
   </div>
</section>

<!-- Products section start -->

<section class="products bg-gray">
   <div class="container">
    <div class="row title">
      <h2>Our Clients</h2>
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px;" src="<?php echo base_url('assets/front/images/brands/brand-logo-1.png');?>">
      </div>
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px;" src="<?php echo base_url('assets/front/images/brands/brand-logo-2.png');?>">
      </div>
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px;" src="<?php echo base_url('assets/front/images/brands/brand-logo-3.png');?>">
      </div>
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px; margin-top: -25px" src="<?php echo base_url('assets/front/images/brands/brand-logo-4.png');?>">
      </div>
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px;" src="<?php echo base_url('assets/front/images/brands/brand-logo-5.png');?>">
      </div>
      <div class="col-md-2 col-sm-6">
        <img style="width:100%; padding: 30px;"  src="<?php echo base_url('assets/front/images/brands/brand-logo-5.png');?>">
      </div>
    </div>
   </div>
</section>
<!-- Products section end -->


<!--
Start Call To Action
==================================== -->

<?php echo $view_footer;?>

<script>
  function onClickDlg(product_info)
  {
    $('#product-modal').modal();
    $('#modal_img').attr('src', "<?php echo base_url();?>" + product_info.img);
    $('#modal_product_name').text(product_info.name);
    $('#modal_product_price').text('£' + product_info.price);
    $('#modal_product_desc').text(product_info.description);
    $('#modal_product_add_to_cart').attr('data-value', product_info.id);
  }

  function addItemToCart()
  {
    $.post("<?php echo base_url('user/do_add_cart');?>", {product_id:$('#modal_product_add_to_cart').attr('data-value')}, function(result){
      cart_data = result;
    });
    $('#product-modal').modal('hide');
  }

  function addItemToCartByProductId(product_id)
  {
    $.post("<?php echo base_url('user/do_add_cart');?>", {product_id:product_id}, function(result){
      cart_data = JSON.parse(result);
    });
  }

</script>
 </body>
 </html>

