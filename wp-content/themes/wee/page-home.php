<?php
/*
Template Name: Home page
*/
get_header(); ?>


	

	<?php get_template_part('parts/home/page-top'); ?>

	<div class="content-page">
	    <div class="container">

	    	<?php get_template_part('parts/home/categories'); ?>

	    	<?php /*How it is moved to categories get_template_part('parts/home/banner-bottom');*/  ?>

	    </div>
	</div>

	<?php get_template_part('parts/home/noviny'); ?>


	<div class="container">

		<?php get_template_part('parts/home/brand-showcase'); ?>

	</div>

	<div class="container">

		<?php get_template_part('parts/home/aboutmag'); ?>

	</div>

	<?php get_template_part('parts/home/services'); ?>

<!-- 	<div id="content-wrap">
	    <div class="container">
	    	<?php // get_template_part('parts/home/hot-categories'); ?>
		</div>
	</div> -->

<?php get_footer(); ?>