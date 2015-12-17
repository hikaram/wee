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
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2"><?php single_cat_title(); ?></span>
                </h2>

                <?php wp_corenavi(); ?>

                <ul class="blog-posts">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <li class="post-item">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-sm-5">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );
                                            $image = matthewruddy_image_resize($image[0], 345, 243, true, false);
                                    ?>
                                        <div class="entry-thumb image-hover2">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?=$image['url']?>" alt="<?php the_title(); ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="entry-ci">
                                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
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
                                            <div class="entry-excerpt"><?php the_excerpt(); ?></div>
                                            <div class="entry-more">
                                                <a href="<?php the_permalink(); ?>">Читать полностью</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </li>
                    <?php endwhile; endif; ?>
                </ul>

                <?php wp_corenavi(); ?>

            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<?php get_footer(); ?>