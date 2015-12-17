<?php get_header(); ?>
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
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- Content page -->
                    <div class="content-text clearfix">
                        <?php the_content(); ?>
                    </div>
                    <!-- ./Content page -->
                <?php endwhile; endif; ?>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<?php get_footer(); ?>