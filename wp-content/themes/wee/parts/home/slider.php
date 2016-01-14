<!-- Home slider-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            
            <div class="col-sm-9">
                <div class="homeslider">
                    <?php if( have_rows('slides', 11) ): ?>
                    <div class="content-slide">
                        <ul id="contenhomeslider">
                        <?php while ( have_rows('slides', 11) ) : the_row();
                            $slide_thumb  = get_sub_field('slide_thumb');
                            $slide_params = array( 'width' => 900, 'height' => 450, 'crop' => true );
                            $slide_params_2 = array( 'width' => 234, 'height' => 450, 'crop' => true );
                        ?>
                          <li><img alt="" src=<?php print("\"". bfi_thumb( $slide_thumb, $slide_params ) ."\""); ?> title="" /></li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            
              <div class="col-xs-12 col-sm-3 page-top-right">
                  <br />
                <div class="latest-deals">
                <div class="latest-deal-title">Товар дня</div>
                <div class="latest-deal-content">

<?php
                                    $args = array(
                                        'post_type'      => 'product',
                                        'meta_query'     => array(
                                            'relation' => 'OR',
                                            array( // Simple products type
                                                'key'           => '_sale_price',
                                                'value'         => 0,
                                                'compare'       => '>',
                                                'type'          => 'numeric'
                                            ),
                                            array( // Variable products type
                                                'key'           => '_min_variation_sale_price',
                                                'value'         => 0,
                                                'compare'       => '>',
                                                'type'          => 'numeric'
                                            )
                                        )
                                    );

                                    $loop = new WP_Query( $args );


                                if ( $loop->have_posts() ) {
                                    while ( $loop->have_posts() ) : $loop->the_post();
                                	wc_get_template_part( 'content', 'product-cart' );
                                	wp_reset_query();
                                	break;
                        	    endwhile;
                                }



                ?><!--ul data-responsive="{&quot;0&quot;:{&quot;items&quot;:1},&quot;600&quot;:{&quot;items&quot;:3},&quot;1000&quot;:{&quot;items&quot;:1}}" data-autoplayhoverpause="true" data-autoplaytimeout="1000" data-nav="true" data-loop="true" data-dots="false" class="product-list owl-carousel1">
                
                        <li>
                            <div data-countdown="2015/12/27" class="count-down-time"><span>00</span><b></b><span>00</span><b></b><span>00</span></div>
                             <div class="left-block hAlign">
                                <table width="100%">
                                    <tbody><tr><td align="center">
                                    <a href="#" class="vAlign">

                                        <img width="300" height="270" alt="16035.jpg" class="attachment-post-thumbnail wp-post-image" src="http://wee.citycouponsupport.ru/wp-content/uploads/2015/10/16035-300x270.jpg">                                                   
                                    </a>
                                    </td></tr>
                                </tbody></table>
                                </div>
                            <div class="right-block">
                                <div class="product-name"><a href="#">Стеклянный анальный стимулятор ICICLES № 14</a></div>
                                <div class="content_price">
                                    <span class="price product-price">3 466 <strong>&#8381;.</strong></span>                                    
                                </div>
                                <a class=" rs_rs_addtocart  product_type_simple" data-quantity="1" data-product_sku="Стеклянный анальный стимулятор ICICLES № 14" data-product_id="44553" rel="nofollow" href="/cart/"><span></span>В корзину</a>                                
                            </div>
                        </li>                                                                                                                                                
                            
                   </ul-->                                 
                </div>
            </div>
            </div>
            
            
        </div>
    </div>
</div>
<!-- END Home slideder-->
