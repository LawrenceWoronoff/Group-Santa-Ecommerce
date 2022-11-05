   <script src="<?php echo base_url('assets/front/plugins/jquery/dist/jquery.min.js');?>"></script>
   <!-- Bootstrap 3.1 -->
   <script src="<?php echo base_url('assets/front/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/instafeed/instafeed.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/ekko-lightbox/dist/ekko-lightbox.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/syo-timer/build/jquery.syotimer.min.js');?>"></script>

   <script src="<?php echo base_url('assets/front/plugins/slick/slick.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/slick/slick-animation.min.js');?>"></script>
   <script src="<?php echo base_url('assets/front/plugins/jquery-repeater-form/jquery.repeater.min.js');?>"></script>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script> -->
   <script src="<?php echo base_url('assets/front/plugins/google-map/gmap.js');?>"></script>

   <!-- Google Mapl
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
   <script type="text/javascript" src="plugins/google-map/gmap.js"></script> -->
   <!-- Main Js File -->
    <footer class="footer section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="social-media">
                        <li>
                            <a href="https://www.facebook.com/themefisher">
                                <i class="tf-ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/themefisher">
                                <i class="tf-ion-social-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/themefisher">
                                <i class="tf-ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/themefisher/">
                                <i class="tf-ion-social-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="footer-menu text-uppercase">
                        <li>
                            <a href="<?php echo base_url('store');?>">HOME</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('store/products');?>">PRODUCTS</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('store/products');?>">How IT WORKS</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('store/products');?>">FAQ</a>
                        </li>
                        <li>
                            <a href="#">CONTACT US</a>
                        </li>
                        
                    </ul>
                    <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="mailto:zeusbackforyou@gmail.com">Zeus</a></p>
                </div>
            </div>
        </div>
    </footer>
    
   <script>
        const SERVER_BASE_URL = '<?php echo base_url();?>';
        var data = <?php echo json_encode($this->session->userdata(USER_SESSION_CART_KEY));?>;
        if(data === null)
        {
            cart_data = [];
        }
        else
        {
            cart_data = data;
        }
        $(document).ready(function(){
            $("#cart_dropdown").mouseenter(function(){
                $(this).children("li.dropdown-slide").children("div.cart-dropdown").children("div.media").remove();
                $(this).children("li.dropdown-slide").children("div.cart-dropdown").children("div.cart-summary").remove();
                $(this).children("li.dropdown-slide").children("div.cart-dropdown").children("ul.cart-buttons").remove();
                var total_price = 0.0;
                for(var i = 0; i < cart_data.length;i++) {
                    total_price = parseFloat(total_price) + parseFloat(cart_data[i].count * cart_data[i].price);
                    var text = "<div class='media'> <a class="+ "'pull-left'" + "href=" + "'#!'" + ">" 
                                    +"<img class=" + "'media-object'" +  "src=" + "'" + SERVER_BASE_URL + cart_data[i].img + "' " +  "alt='image'/>"
                                    + "</a>"
                                    + "<h4 class=" + "'media-heading'" + "><a href=" + "'#!'" +">" + cart_data[i].name + "</a></h4>"
                                    +"<div class=" + "'media-body'" + ">"
                                        + "<div class="+ "'cart-price'" +   ">"
                                            +"<span>" + cart_data[i].count + " x " +"</span>"
                                            + "<span>"+ cart_data[i].price + "</span>"
                                        +"</div>"
                                    + "<h5>"+ "<strong>" + "£" + (cart_data[i].count * cart_data[i].price).toFixed(2) +"</strong>"+"</h5>"
                                + "</div>" 
                                + "<button onClick='removeItemFromCartInDropDown(" + cart_data[i].id + ")'" + "class=" +"'btn-link remove'" + "><i class=" + "'tf-ion-close'" + ">" +"</i>"
                                +"</button></div>";
                    $(this).children("li.dropdown-slide")
                                .children("div.cart-dropdown")
                                .append(text);
                }
                var text1 =  "<div class='cart-summary'> <span>" +"Total" +"</span>"
                            + "<span class=" + "'total-price'"+ ">" +"£" + total_price.toFixed(2) +"</span></div>" 
                            +"<ul class='text-center cart-buttons'>"
                            +"<li><a href='<?php echo base_url('user/view_cart');?> '" + " class='btn btn-small'>View Cart</a></li>"
                            <?php if($this->session->userdata(IS_LOGGED_IN)):?>
                            +"<li><a href='<?php echo base_url('user/check_out');?> '" + " class='btn btn-small btn-solid-border'>Checkout</a></li>"
                            <?php endif;?>
                            +"</ul>";
                $(this).children("li.dropdown-slide")
                    .children("div.cart-dropdown")
                    .append( text1 )
            });
            
            $("#cart_dropdown").mouseleave(function(){
                
            });
        });

        function removeItemFromCartInDropDown(product_id)
        {
            cart_data = cart_data.filter((item, index) => {item.id != product_id});
            $.post("<?php echo base_url('user/do_remove_cart');?>", {product_id:product_id}, function(result){
                cart_data = JSON.parse(result);
            });
            location.reload();
        }

    </script>

   <script src="<?php echo base_url('assets/front/js/script.js');?>"></script>