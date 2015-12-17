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
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
                    <img alt="<?php bloginfo('name'); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logowee.png" />
                    <br /><span class="logofont">интим товары для ярких эмоций</span>
                </a>
            </div>
            <div class="col-xs-5 col-sm-5 header-search-box">
                <form class="form-inline">
                      <div class="form-group input-serach">
                        <input type="text"  placeholder="Начинайте вводить...">
                      </div>
                      <button type="submit" class="pull-right btn-search"></button>
                </form>
            </div>
            <div class="col-xs-4 col-sm-4 text-right">
                <div id="user-info-top" class="user-info">
                    <div class="dropdown">
                        <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Помощь</span></a>
                        <?php
                            wp_nav_menu( array(
                                    'menu' => 'Third Men',
                                    'theme_location' => 'second',
                                    'link_before' => '',
                                    'link_after' => '',
                                    'container' => '',
                                    'menu_id' => '',
                                    'menu_class' => 'dropdown-menu mega_dropdown',
                                    'container_class' => ''
                            ));
                        ?>
                    </div>

                </div>
                <div class="support-link"><a href="#">Войти</a></div>
            </div>
        </div>
    </div>
    <?php
        // wp_nav_menu( array(
        //         'menu' => 'Primary Menu',
        //         'theme_location' => 'primary',
        //         'link_before' => '',
        //         'link_after' => '',
        //         'container' => '',
        //         'menu_id' => '',
        //         'menu_class' => 'nav pull-right',
        //         'container_class' => ''
        // ));
    ?>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Каталог товаров</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                    <div class="vertical-menu-content is-home">
                    <?php
                        $taxonomy = 'product_cat';
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
                        }
                    ?>
                        <div class="all-category"><span class="open-cate">Весь каталог</span></div>
                    </div>
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
                                    <?php /*<li class="dropdown">
                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Fashion</a>
                                        <ul class="dropdown-menu mega_dropdown" role="menu" style="width: 830px;">
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<!php echo get_stylesheet_directory_uri() !>/assets/data/men.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">MEN'S</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Skirts</a></li>
                                                    <li class="link_container"><a href="#">Jackets</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Pants</a></li>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<!php echo get_stylesheet_directory_uri() !>/assets/data/women.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">WOMEN'S</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Skirts</a></li>
                                                    <li class="link_container"><a href="#">Jackets</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Pants</a></li>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<!php echo get_stylesheet_directory_uri() !>/assets/data/kid.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Kids</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Shoes</a></li>
                                                    <li class="link_container"><a href="#">Clothing</a></li>
                                                    <li class="link_container"><a href="#">Tops</a></li>
                                                    <li class="link_container"><a href="#">Scarves</a></li>
                                                    <li class="link_container"><a href="#">Accessories</a></li>
                                                </ul>
                                            </li>
                                             <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <a href="#">
                                                            <img class="img-responsive" src="<!php echo get_stylesheet_directory_uri() !>/assets/data/trending.png" alt="sport">
                                                        </a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">TRENDING</a>
                                                    </li>
                                                    <li class="link_container"><a href="#">Men's Clothing</a></li>
                                                    <li class="link_container"><a href="#">Kid's Clothing</a></li>
                                                    <li class="link_container"><a href="#">Women's Clothing</a></li>
                                                    <li class="link_container"><a href="#">Accessories</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Sports</a></li>
                                    <li class="dropdown">
                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Foods</a>
                                            <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">Asian</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Vietnamese Pho</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Noodles</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Seafood</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Sausages</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Meat Dishes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Desserts</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">European</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Greek Potatoes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Famous Spaghetti</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Famous Spaghetti</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Chicken</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Italian Pizza</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">French Cakes</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="link_container group_header">
                                                        <a href="#">FAST</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Hamberger</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Pizza</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Noodles</a>
                                                    </li>
                                                    <li class="link_container group_header">
                                                        <a href="#">Sandwich</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Salad</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Paste</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                    <li class="link_container">
                                                        <a href="#">Tops</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="block-container col-sm-3">
                                                <ul class="block">
                                                    <li class="img_container">
                                                        <img src="<!php echo get_stylesheet_directory_uri() !>/assets/data/banner-topmenu.jpg" alt="Banner">
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="category.html" class="dropdown-toggle" data-toggle="dropdown">Digital</a>
                                        <ul class="dropdown-menu container-fluid">
                                            <li class="block-container">
                                                <ul class="block">
                                                    <li class="link_container"><a href="#">Mobile</a></li>
                                                    <li class="link_container"><a href="#">Tablets</a></li>
                                                    <li class="link_container"><a href="#">Laptop</a></li>
                                                    <li class="link_container"><a href="#">Memory Cards</a></li>
                                                    <li class="link_container"><a href="#">Accessories</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">Furniture</a></li>
                                    <li><a href="category.html">Jewelry</a></li> */?>
                                    <li <?php if ($bBlog) print("class=\"active\"");?>><a href="/blog">Блог</a></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content"></div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<?php if ( is_home() || is_front_page() ) : ?>
    <?php get_template_part('parts/home/slider'); ?>
<?php endif; ?>