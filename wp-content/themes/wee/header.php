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
            
            <div class="support-link">
                <a href="/login/">Вход</a>
                <a href="/signup/">Помощь</a>
            </div>
            <?php //echo kt_menu_my_account(); ?>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
                    <img alt="<?php bloginfo('name'); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logowee.png" />
                    <br /><span class="logofont">интим товары для ярких эмоций</span>
                </a>
            </div>

            <div class="col-xs-5 col-sm-7 header-search-box">
                <form class="form-inline" role="search" method="get" id="searchform" action="/">
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Начинайте вводить..." name="s" id="s" />
                      </div>
                      <button id="searchsubmit" type="submit" class="pull-right btn-search"></button>
                </form>
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
    </div>
  
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <?php ubermenu( 'main' , array( 'theme_location' => 'vertical' ) ); ?>
                    <div class="box-vertical-megamenus">
                        <!--   <h4 class="title">
                             <span class="title-menu"><a href="/shop/">Каталог товаров</a></span>
                              <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>

                          </h4>-->

                  <!--  <div class="vertical-menu-content is-home">

                    <?php
                     /*   $taxonomy = 'product_cat';
                        $orderby = 'name';
                        $show_count = 0;
                        $pad_counts = 0; // 1 for yes, 0 for no
                        $hierarchical = 1; // 1 for yes, 0 for no
                        $title = '';
                        $empty = 0;
                        $args = array (
                            'taxonomy' => $taxonomy,
                            'orderby' => $orderby,
                            'show_count' => $show_count,
                            'pad_counts' => $pad_counts,
                            'hierarchical' => $hierarchical,
                            'title_li' => $title,
                            'hide_empty' => $empty
                        );
                    ?>

                    <?php
                        $all_categories = get_categories( $args );
                        if ($all_categories) {
                            echo "<ul class='vertical-menu-list'>";
                            foreach ($all_categories as $cat) {
                                if ($cat->category_parent == 0) {
                                    // var_dump($cat);
                                    $category_id = $cat->term_id;
                                    // var_dump($cat);
                                    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                                    $image = wp_get_attachment_url( $thumbnail_id );
                                    if ($cat->count > 0 ) {
                                        $parent = 'class="parent"';
                                    }
                                    echo "<li><a ".$parent." href='".get_term_link($cat, "product_cat")."'>".$cat->name . "</a>";
                                    $args2 = array(
                                        'taxonomy' => $taxonomy,
                                        'child_of' => 0,
                                        'parent' => $category_id,
                                        'orderby' => $orderby,
                                        'show_count' => $show_count,
                                        'pad_counts' => $pad_counts,
                                        'hierarchical' => $hierarchical,
                                        'title_li' => $title,
                                        'hide_empty' => $empty
                                    );

                                    $sub_cats = get_categories( $args2 );
                                    if($sub_cats) {
                                        echo "<div class=\"vertical-dropdown-menu\">";
                                        echo "<div class=\"vertical-groups col-sm-12\">";
                                        echo "<div class=\"mega-group col-sm-4\">";
                                        echo "<h4 class=\"mega-group-header\"><span>".$cat->name."</span></h4>";
                                        echo "<ul class=\"group-link-default\">";
                                        foreach($sub_cats as $sub_category) {
                                            if ($sub_cats->$sub_category == 0) {
                                                echo "<li><a href=".get_term_link($sub_category, "product_cat").">".$sub_category->cat_name . "</a></li>";
                                            }
                                        }
                                        echo "</ul>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                            }
                            echo "</ul>";
                        }*/
                    ?>

                    </div>-->
                </div>

                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
<?php
$bcs = "";
  if(function_exists('bcn_display')) {
    $bcs = bcn_display(true);
  }
  $bBlog = (strpos($bcs, "Блог") === FALSE)? FALSE : TRUE;
?>
                                    <li <?php if (!$bBlog) print("class=\"active\"");?>><a href="/">Главная</a></li>
                                  
                                    <li <?php if ($bBlog) print("class=\"active\"");?>><a href="/blog">Блог</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
                <script>
                    $(document).ready(function(){

                        var $menu = $("#top-cart");

                        $(window).scroll(function(){
                            if ( $(this).scrollTop() > 300 && $menu.hasClass("default") ){
                                $menu.removeClass("default").addClass("fixed");
                            } else if($(this).scrollTop() <= 300 && $menu.hasClass("fixed")) {
                                $menu.removeClass("fixed").addClass("default");
                            }
                        });//scroll

                        $menu.hover(function(){$('.cart-block2').css('visibility', 'visible');$('.cart-block2').css('visibility', 'hidden');});
                    });
                </script>
                <div style="float: right"><div id="top-cart" class="headcart-link default">

                    </div>




                </div>
            </div>
      
        </div>
    </div>
</div>
<!-- end header -->
<?php if ( is_home() || is_front_page() ) : ?>
    <?php get_template_part('parts/home/slider'); ?>
<?php endif; ?>