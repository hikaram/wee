<!-- Footer -->
<footer id="footer">
     <div class="container">
            <!-- introduce-box -->
            <div id="introduce-box" class="row">
                <div class="col-md-3">
                    <div id="address-box">
                        <a href="/"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/introduce-logowee.png" alt="" /></a>
                        <div id="address-list">
                            <span>Интим штуковины для ярких эмоций</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="introduce-title">Условия покупки</div>
                            <?php
                                wp_nav_menu( array(
                                        'menu' => 'Third Men',
                                        'theme_location' => 'third',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'container' => '',
                                        'menu_id' => 'introduce-company',
                                        'menu_class' => 'introduce-list',
                                        'container_class' => ''
                                ));
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="introduce-title">Помощь</div>
                            <?php
                                wp_nav_menu( array(
                                        'menu' => 'Third Men',
                                        'theme_location' => 'second',
                                        'link_before' => '',
                                        'link_after' => '',
                                        'container' => '',
                                        'menu_id' => '',
                                        'menu_class' => 'introduce-list',
                                        'container_class' => ''
                                ));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div id="contact-box">
                        <!--   <div class="introduce-title">Подписка на скидки</div>
                           <div class="input-group" id="mail-box">
                             <input type="text" placeholder="Ваш Email"/>
                             <span class="input-group-btn">
                               <button class="btn btn-default" type="button">OK</button>
                             </span>
                           </div>-->
                        <div class="introduce-title">Мы в соц. сетях</div>
                        <div class="social-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- /#introduce-box -->
            <!-- #trademark-box -->
            <div id="trademark-box" class="row">
                <div class="col-sm-12">
                    <ul id="trademark-list">
                        <li id="payment-methods">Принимаем к оплате</li>
                        <li>
                           <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/trademark-qiwi.jpg"  alt="ups"/>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/trademark-wu.jpg"  alt="ups"/>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/trademark-visa.jpg"  alt="ups"/>
                        </li>
                        <li>
                           <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/trademark-mc.jpg"  alt="ups"/>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/trademark-wm.jpg"  alt="ups"/>
                        </li>
                    </ul> 
                </div>
            </div> <!-- /#trademark-box -->
            <!-- #trademark-text-box -->
            <div id="trademark-text-box" class="row">
<?php $args = array (
        'taxonomy' => 'product_cat',
        'orderby' => 'name',
        'show_count' => 0,
        'pad_counts' => 0,
        'hierarchical' => 1,
        'title_li' => '',
        'hide_empty' => 0
    );
    $all_categories = get_categories( $args );
    if ($all_categories) {
        foreach ($all_categories as $cat) {
        if ($cat->category_parent != 0) continue;

?>                <div class="col-sm-12">
                    <ul id="trademark-search-list" class="trademark-list">
                        <li class="trademark-text-tit"><?php print(strtoupper($cat->name));?>:</li>
<?php
    $args2 = array(
        'hierarchical' => 1,
        'show_option_none' => '',
        'hide_empty' => 0,
        'parent' => $cat->term_id,
        'taxonomy' => 'product_cat'
        );
        $subcats = get_categories($args2);
        foreach ($subcats as $sc) {
?>                        <li><a href=<?php print("\"".get_term_link( (int)$sc->term_id, 'product_cat' )."\""); ?>><?php print($sc->name);?></a></li>
<?php } ?>
                    </ul>
                </div>
<?php } } /*                <div class="col-sm-12">
                    <ul id="trademark-tv-list" class="trademark-list">
                        <li class="trademark-text-tit">TVS:</li>
                        <li><a href="#" >Sonyo TV</a></li>
                        <li><a href="#" >Samsing TV</a></li>
                        <li><a href="#" >LGG TV</a></li>
                        <li><a href="#" >Onidai TV</a></li>
                        <li><a href="#" >Toshibao TV</a></li>
                        <li><a href="#" >Philipsi TV</a></li>
                        <li><a href="#" >Micromaxo TV</a></li>
                        <li><a href="#" >LED TV</a></li>
                        <li><a href="#" >LCD TV</a></li>
                        <li><a href="#" >Plasma TV</a></li>
                        <li><a href="#" >3D TV</a></li>
                        <li><a href="#" >Smart TV</a></li>
                    </ul>
                </div> */ ?>
            </div><!-- /#trademark-text-box -->
            <div id="footer-menu-box">
                <p class="text-center">&copy; 2015 Weewow.<br>При перепечатке материалов ссылка на сайт обязательна</p>
            </div><!-- /#footer-menu-box -->
        </div>
</footer>

<a href="#" class="scroll_top" title="Перемотать вверх">Вверх</a>
    
    <!-- Script-->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/select2/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/jquery.bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/jquery.countdown/jquery.countdown.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/jquery.actual.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/dropdown.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/jquery.jcarousellite.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/functions.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/theme-script.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/script.js"></script>
<script>
 /*$(document).ready(function() {
        
       
           
    console.log( "ready!" );
    });*/
    $(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images
  $('#contenhomeslider').bxSlider(
                {
                    nextText:'<i class="fa fa-angle-right"></i>',
                    prevText:'<i class="fa fa-angle-left"></i>',
                    auto: true
                }

            );
   /* $(".cart-block .cart-block-list").jCarouselLite({
    btnNext: ".cart-block .down",
    btnPrev: ".cart-block .up",
    vertical: true,
    visible: 1,
    auto: 5000,
    speed: 500,
    circular: false
 });*/
 
 /*$("#topcarousel .carousel-indicators li:first").addClass("active");*/
 
 
 $("#topcarousel .carousel-inner .item:first").addClass("active");
 $("#topcarousel").carousel({
 interval: false
 })
 
 $('.btn-vertical-slider').on('click', function () {
     
            if ($(this).attr('data-slide') == 'next') {
                $('#topcarousel').carousel('next');
            }
            if ($(this).attr('data-slide') == 'prev') {
                $('#topcarousel').carousel('prev');
            }
     
        });
 
});


var Head = {
    src:'<?php echo get_stylesheet_directory_uri() ?>/assets/css/style3.css',
    include: function () {
       var link=document.createElement('link');
       link.href=this.src;
       link.rel="stylesheet";
       document.getElementsByTagName('head')[0].appendChild(link);
    }
}
	

Head.include();
</script>


<?php wp_footer(); ?>

<!-- CarrotQuest BEGIN -->
<script type="text/javascript">
    (function(){
        if (typeof carrotquest === 'undefined') {
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
            s.src = '//cdn.carrotquest.io/api.min.js';
            var x = document.getElementsByTagName('head')[0]; x.appendChild(s);

            carrotquest = {}; window.carrotquestasync = []; carrotquest.settings = {};
            m = ['connect', 'track', 'identify', 'auth'];
            function Build(name, args){return function(){window.carrotquestasync.push(name, arguments);} }
            for (var i = 0; i < m.length; i++) carrotquest[m[i]] = Build(m[i]);
        }
    })();
    carrotquest.connect('2645-5efcb529bc4a6bbe8c9d86afca4');
</script>
<!-- CarrotQuest END -->

</body>
</html>
