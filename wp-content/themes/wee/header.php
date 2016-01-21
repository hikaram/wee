<!DOCTYPE html>
<html class="cf" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    ?></title>


    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/jquery.bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/owl.carousel/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/owl.carousel/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/lib/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/reset.css" />
    <link type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/polyfill.object-fit.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/responsive.css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- HEADER -->
<div id="header" class="header">
          <div class="top-header">
        <div class="container">
            <?php echo kt_get_hotline(); ?>
            <?php echo kt_get_wpml(); ?>
              <?php echo kt_menu_my_account(); ?>
            <div class="support-link">                
                <a href="/help/">Помощь</a>
                <a href="tel:+74957777777"><i>+7(495)777-77-77</i></a>
            </div>
          
            
            <!--<div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="#">Compare</a></li>
                        <li><a href="#">Wishlists</a></li>
                    </ul>
                </div>
            </div-->
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div id="tophead" class="default clearfix">
    <div class="container main-header default">
        <div class="row">
            <div class="col-xs-12 col-sm-2 logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
                    <img alt="WEEWOW: удобный магазин интим товаров" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logowee.png" width="200" />
                  <!--  <br /><span class="logofont">интим товары для ярких эмоций</span>-->
                </a>
            </div>
  <span style="float: left; margin-top: -12px;"><a href="/rasprodaja/" class="topicon"><span class="ubermenu-target-title ubermenu-target-text">Скидки</span></a></span>
            <div class="col-xs-5 col-sm-7 header-search-box" style="padding-left: 25px;">
          
             <!--  <form class="form-inline" role="search" method="get" id="searchform" action="/">
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Начинайте вводить..." name="s" id="s" />
                      </div>
                      <button id="searchsubmit" type="submit" class="pull-right btn-search"></button>
                </form>-->
                <?php //echo do_shortcode("[wpdreams_ajaxsearchpro id=1]"); ?>
                <?php dynamic_sidebar('search');?> 
                 <?php  //echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
            </div>
            <?php 
                if( kt_is_wc() ): 
                    do_action('kt_mini_cart');
                endif; 
             ?>
            <!--<div class="col-xs-4 col-sm-4 text-right">
                <div class="support-link" style="display: inline-block; float: right;"><a href="/wp-login.php">Войти</a></div>
                <div id="user-info-top" class="user-info" style="display: inline-block; float: right; margin: 0 5px 0 0;">
                    <div class="dropdown">
                        <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Помощь</span></a>
                        <?php
                           /* wp_nav_menu( array(
                                    'menu' => 'Third Men',
                                    'theme_location' => 'second',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'container' => '',
                                    'menu_id' => '',
                                    'menu_class' => 'dropdown-menu mega_dropdown',
                                    'container_class' => ''
                            ));*/
                        ?>
                    </div>

                </div>

            </div>-->
            
        </div>
          
                     
        <div id="top-menu" class="clearfix container">
                    <?php ubermenu( 'top' ); ?>
                    <!--<ul>
                        <li><a class="tmenu-icon1" href="/category/seks-igrushki/">Секс игрушки</a></li>
                        <li><a class="tmenu-icon2" href="#">Фетиш и BDSM</a></li>
                        <li><a class="tmenu-icon3" href="#">Эротическое бельё</a></li>
                        <li><a class="tmenu-icon4" href="/category/intimnaya-kosmetika/">Интимная косметика</a></li>
                        <li><a class="tmenu-icon5" href="/category/priyatnye-melochi/">Приятные мелочи</a></li>
                        <li><a class="tmenu-icon6" href="#">Скидки</a></li>
                    </ul>-->
                </div>
    </div>
   </div>
  
    <!-- END MANIN HEADER -->
  
</div>
<!-- end header -->
<?php if ( is_home() || is_front_page() ) : ?>
    <?php get_template_part('parts/home/slider'); ?>
<?php endif; ?>