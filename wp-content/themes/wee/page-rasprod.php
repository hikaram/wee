<?php
/*
Template Name: Contact
*/
get_header(); ?>
<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">

        <?php get_template_part('parts/breadcrumb'); ?>
        <!-- row -->
        <div class="row">

            <?php get_sidebar('left'); ?>

            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?php the_title(); ?></span>
                </h1>
                <div id="rasprod" class="page-rasprod">
                   
                            
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
                    <ul class="grid product-list clearfix">
                                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                        <?php wc_get_template_part( 'content', 'product' ); ?>
                                    <?php endwhile; ?>
                                </ul>
                                <?php } else { ?>
                                    <?php echo __( 'No products found' ); ?>
                                <?php } ?>
                                <?php wp_reset_postdata(); ?>
                            
                      
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<?php get_footer(); ?>