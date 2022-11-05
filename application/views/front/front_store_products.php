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


<section class="products section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
                <?php echo form_open(base_url('store/do_search_products'), array('id' => 'sale_type_form'));?>
                
                <div class="widget">
					<h4 class="widget-title">Price</h4>
					
                        <div class="form-group">
                            <label >Min</label>
                            <input type="number" value="<?php echo $search_price_min?>" name="price_min" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label >Max</label>
                            <input type="number" value="<?php echo $search_price_max?>" name="price_max" class="form-control" placeholder="">
                        </div>                    
	            </div>
                    <button type="submit" class="btn btn-block btn-main"> Search </button>
                </form>
			</div>
			<div class="col-md-9">
				<div class="row">
					<?php for($i=0;$i<count($products);$i++):?>
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <?php if($products[$i]['is_trendy']):?>
                                <span class="bage">Sale</span>
                                <?php endif;?>
                                <img class="img-responsive" src="<?php echo base_url($products[$i]['img']);?>" alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
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
                                <h4><?php echo $products[$i]['name'];?></h4>
                                <p class="price">&#163;<?php echo $products[$i]['price'];?></p>
                            </div>
                        </div>
                    </div>
                    <?php endfor;?>
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
                                                <p class="product-price" id="modal_product_price">£</p>
                                                <p class="product-short-description" id="modal_product_desc">
                                                    
                                                </p>
                                                <button onclick="addItemToCart()" id="modal_product_add_to_cart" class="btn btn-main" data-value="0">Add To Cart</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>				
			</div>
		
		</div>
	</div>
</section>

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
      cart_data = JSON.parse(result);
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

