<?php get_header(); ?>

<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">

        <?php get_template_part('parts/breadcrumb'); ?>
        <!-- row -->
        <div class="row">

            <?php get_sidebar('left-blog'); ?>

            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <!-- page heading-->
                    <h1 class="page-heading">
                        <span class="page-heading-title2"><?php the_title(); ?></span>
                    </h1>
                    <article class="entry-detail">
                        <div class="entry-meta-data">
                            <span class="cat">
                                <i class="fa fa-folder-o"></i>
                                <?php
                                    foreach((get_the_category()) as $cat) {
                                        echo "<a href='".get_category_link( $cat->cat_ID )."'>" . $cat->cat_name . '</a> ';
                                    }
                                ?>
                            </span>
                            <span class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span>
                        </div>
                        <?php
                            if ( has_post_thumbnail() ) {
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                                $image = matthewruddy_image_resize($image[0], 870, 613, true, false);
                        ?>
                            <div class="entry-photo">
                                <img src="<?=$image['url']?>" alt="<?php the_title(); ?>">
                            </div>
                        <?php } ?>
                        <div class="content-text clearfix">
                            <?php the_content(); ?>
                        </div>
                        <div class="entry-tags">
                            <span>Тэги:</span>
                            <?php the_tags(); ?>
                        </div>
                    </article>
                <?php endwhile; endif; ?>

                <?php get_template_part('parts/widgets/related-posts'); ?>

            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<?php get_footer(); ?>