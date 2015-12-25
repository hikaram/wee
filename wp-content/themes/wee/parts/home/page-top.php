<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 page-top-left">
                <div class="popular-tabs">
                      <ul class="nav-tab">
                        <li class="active"><a data-toggle="tab" href="/rasprodaja/">Распродажа</a></li>
                      </ul>
                      <div class="tab-container">
                            <div id="tab-1" class="tab-panel active" style="display: inline-block;">
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

                                ?>
                                <?php if ( $loop->have_posts() ) { ?>
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php wc_get_template_part( 'content', 'product-cart' ); ?>
                                    <?php endwhile; ?>
                                </ul>
                                <?php } else { ?>
                                    <?php echo __( 'No products found' ); ?>
                                <?php } ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---->