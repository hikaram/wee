<?php
/*
Template Name: Home page
*/
get_header(); ?>

	<?php get_template_part('parts/home/services'); ?>

	<div class="page-top">
	    <div class="container">

	    	<h1 class="page-heading"><span class="page-heading-title2"><?php the_title(); ?></span></h1>
	    	<div class="content-text clearfix">
	    		<?php the_content(); ?>
	    	</div>

	    </div>
	</div>

	<?php get_template_part('parts/home/page-top'); ?>

	<div class="content-page">
	    <div class="container">

	    	<?php get_template_part('parts/home/categories'); ?>

	    	<?php /*How it is moved to categories get_template_part('parts/home/banner-bottom');*/  ?>

	    </div>
	</div>

	<div class="container">

		<?php get_template_part('parts/home/brand-showcase'); ?>

	</div>

<!-- 	<div id="content-wrap">
	    <div class="container">
	    	<?php // get_template_part('parts/home/hot-categories'); ?>
		</div>
	</div> -->

<?php get_footer(); ?>