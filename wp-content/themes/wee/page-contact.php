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
                <div id="contact" class="page-content page-contact">
                    <div id="message-box-conact"></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="ymap">
                                <img src="http://dummyimage.com/870x250/dedede/cccccc.gif&amp;text=Yandex+Map" alt="placeholder+image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="page-subheading">Напишите нам</h3>
                            <?php echo do_shortcode('[contact-form-7 id="24" title="Контактная форма 1"]'); ?>
                        </div>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="col-xs-12 col-sm-6" id="contact_form_map">
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<?php get_footer(); ?>