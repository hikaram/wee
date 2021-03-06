<?php
$taxonomy = 'product_cat';
$orderby = 'name';
$show_count = 0;
$pad_counts = 0; // 1 for yes, 0 for no
$hierarchical = 1; // 1 for yes, 0 for no
$title = '';
$empty = 0;
$args = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
);
$all_categories = get_categories($args);
$colors = array("dpurple"); //"red", "green", "orange", "blue", "blue2", "gray");
$colorindex = 0;
if ($all_categories) {
    foreach ($all_categories as $cat) {
        if ($cat->category_parent != 0) continue;

        $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
        $catimagelink = ($thumbnail_id) ? wp_get_attachment_url($thumbnail_id) : get_stylesheet_directory_uri() . "/assets/data/fashion.png"; // default
        ?>

<!-- Horizontal Banner(s) -->
<?php
    $term_meta = get_option("taxonomy_" . $cat->term_id);
    $banner_l = NULL;
    $bannerlink_l = "#";
    if ((isset($term_meta['leftbanner_meta'])) && ($term_meta['leftbanner_meta'])) $banner_l = $term_meta['leftbanner_meta'];
    if ((isset($term_meta['leftbannerlink_meta'])) && ($term_meta['leftbannerlink_meta'])) $bannerlink_l = $term_meta['leftbannerlink_meta'];
    $banner_r = NULL;
    $bannerlink_r = "#";
    if ((isset($term_meta['rightbanner_meta'])) && ($term_meta['rightbanner_meta'])) $banner_r = $term_meta['rightbanner_meta'];
    if ((isset($term_meta['rightbannerlink_meta'])) && ($term_meta['rightbannerlink_meta'])) $bannerlink_r = $term_meta['rightbannerlink_meta'];
    if (($banner_l) || ($banner_r)) { ?>
<div class="row banner-bottom">
  <div class=<?php print("\"".((($banner_l) && ($banner_r))? "col-sm-6" : "col-sm-12")."\""); ?>>
    <?php if ($banner_l) { ?>
    <div class="banner-boder-zoom">
      <a href=<?php print("\"" . $bannerlink_l . "\""); ?>><img alt="ads" class="img-responsive" src=<?php
                        print("\"" . $banner_l . "\""); ?>/></a>
    </div>
    <?php if ($banner_r) { /*both banners*/ ?>
  </div>
  <div class="col-sm-6">
<?php }
   } ?>
    <?php if ($banner_r) { ?>
    <div class="banner-boder-zoom">
      <a href=<?php
        //$banner = get_stylesheet_directory_uri() . "/assets/data/ads18.jpg";
        //$bannerlink = "#";
        print("\"" . $bannerlink_r . "\""); ?>><img alt="ads" class="img-responsive" src=<?php
                        print("\"" . $banner_r . "\""); ?>/></a>
    </div>
    <?php } ?>
  </div>
</div>
<?php } ?>
<!-- end banner bottom -->

        <!-- featured category fashion -->
        <div class="category-featured">
            <nav class="navbar nav-menu nav-menu-<?php
            if ($colorindex >= sizeof($colors)) $colorindex = 0;
            print($colors[$colorindex++]); ?> show-brand">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-brand"><a href=<?php print("\"" .get_term_link($cat->slug,'product_cat'). "\"");?>><!--img alt=<?php
                    print("\"" .get_term_link($cat->slug,'product_cat')."\"");?> src=<?php print("\"" . $catimagelink . "\""); ?>/--><?php echo $cat->name; ?>
                        </a></div>
                    <!--span class="toggle-menu"></span-->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php 
                            $sc_ids = array();
                            $args2 = array(
                                'hierarchical' => 1,
                                'show_option_none' => '',
                                'hide_empty' => 0,
                                'parent' => $cat->term_id,
                                'taxonomy' => 'product_cat'
                            );
                            $subcats = get_categories($args2);
                            $bFirst = TRUE;
                            $iSCPos = 0;
                            foreach ($subcats as $sc) {
                            array_push($sc_ids, $sc->term_id);
			    $iSCPos++;
                            }
                	/*2101 <div class="collapse navbar-collapse navcategory">
                                    <ul style="position: relative; vertical-align: top;"
                                    class="nav navbar-nav owl-carousel" data-pagination="false" data-dots="false" data-loop="true" data-autoWidth="true"
                                        data-nav="true" data-navigation="true" data-navigationText='["1","2"]'
                                        data-margin="0" data-autoplayTimeout="1000"
                                        data-autoplayHoverPause="true"
                                        data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>

                        <!--ul class="nav navbar-nav"-->

                            <?php
                            if ($iSCPos == 400000) {
                            ?>
                        </ul>
                        <ul class="togMenu">
                            <?php
                            }

                            ?>

                            <li<?php if ($bFirst) {
                                $bFirst = FALSE;
                                print(" class=\"active\"");
                            } ?>>
                                <a class="tab" data-toggle="tab" href=<?php if ($bFirst) {
                                    $bFirst = FALSE;
//                                    print($sc->term_url);
                                } else {
                                    print("\"#tab-" . $sc->term_id . "\"");
                                } ?>><?php print($sc->name); ?></a>
                            <?php if ($iSCPos < 400) { ?><a href="<?=get_term_link($sc->slug,'product_cat')?>" class="link"><?=$sc->name ?></a><?php } ?>
                            </li>
                            <?php $iSCPos++;
                            } ?>
                        </ul>
                        <?php if ($iSCPos >= 40000) {
                            ?><div class="moreMenu"><span>Еще</span></div>
                        <?php } ?>
                    </div> */ 2101?>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
                <!-- <div id="elevator-1" class="floor-elevator">
                       <a href="#" class="btn-elevator up disabled fa fa-angle-up"></a>
                       <a href="#elevator-2" class="btn-elevator down fa fa-angle-down"></a>
                 </div>-->
            </nav>
            <?php /*<div class="category-banner">
                <div class="col-sm-6 banner">
                    <?php
                    $term_meta = get_option("taxonomy_" . $cat->term_id);
                    ?>
                    <a href=<?php
                    $banner = get_stylesheet_directory_uri() . "/assets/data/ads2.jpg";
                    $bannerlink = "#";
                    if (isset($term_meta['leftbanner_meta'])) $banner = $term_meta['leftbanner_meta'];
                    if (isset($term_meta['leftbannerlink_meta'])) $bannerlink = $term_meta['leftbannerlink_meta'];
                    print("\"" . $bannerlink . "\""); ?>><img alt="ads2" class="img-responsive" src=<?php
                        print("\"" . $banner . "\""); ?>/></a>
                </div>
                <div class="col-sm-6 banner">
                    <a href=<?php
                    $banner = get_stylesheet_directory_uri() . "/assets/data/ads3.jpg";
                    $bannerlink = "#";
                    if (isset($term_meta['rightbanner_meta'])) $banner = $term_meta['rightbanner_meta'];
                    if (isset($term_meta['rightbannerlink_meta'])) $bannerlink = $term_meta['rightbannerlink_meta'];
                    print("\"" . $bannerlink . "\""); ?>><img alt="ads3" class="img-responsive" src=<?php
                        print("\"" . $banner . "\""); ?>/></a>
                </div>
            </div> */?>
            <div class="product-featured clearfix">
        	<div class="banner-featured">
        	  <div class="banner-featured-int">
                    <div class="featured-text"><span>Наш выбор</span></div>
                    <div class="banner-img">
                        <a href=<?php
                        $banner = get_stylesheet_directory_uri() . "/assets/data/f1.jpg";
                        $bannerlink = "#";
                        if ((isset($term_meta['featuredbanner_meta'])) && ($term_meta['featuredbanner_meta'])) $banner = $term_meta['featuredbanner_meta'];
                        if ((isset($term_meta['featuredbannerlink_meta'])) && ($term_meta['featuredbannerlink_meta'])) $bannerlink = $term_meta['featuredbannerlink_meta'];
                        print("\"" . $bannerlink . "\""); ?>><img alt="Featurered 1" src=<?php
                            print("\"" . $banner . "\""); ?>/></a>
                    </div>
                  </div>
                </div>
                <div class="category-sections">
                    <ul>
                    <?php foreach ($subcats as $sc) {
                    ?><li><a href=<?php print("\"".get_term_link($sc->slug,'product_cat')."\""); ?>><?php print($sc->name);?></a></li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="product-featured-content">
                    <div class="product-featured-list">
                        <div class="tab-container">

                            <!-- tab product -->
                            <?php
                            $bFirst = TRUE;
                            foreach ($sc_ids as $sc_id) {
                                ?>
                                <div class="tab-panel<?php if ($bFirst) {
                                    $bFirst = FALSE;
                                    print(" active");
                                } ?>" id="tab-<?php print($sc_id); ?>">
                                    <ul class="product-list owl-carousel" data-pagination="false" data-dots="false" data-loop="true"
                                        data-nav="true" data-navigation="true" data-navigationText='["1","2"]'
                                        data-margin="0" data-autoplayTimeout="1000" data-items="3"
                                        data-autoplayHoverPause="true"
                                        data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                        <?php
                                        $args1 = array(
                                            'post_type' => 'product',
                                            'post_status' => 'publish',
                                            'ignore_sticky_posts' => 1,
                                            'posts_per_page' => '10',
                                            'meta_query' => array(
                                                array(
                                                    'key' => '_visibility',
                                                    'value' => array('catalog', 'visible'),
                                                    'compare' => 'IN'
                                                )
                                            ),
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                                                    'terms' => $sc_id,
                                                    'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                                                )
                                            )
                                        );
                                        //  $args1 = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => $cat->term_id, 'orderby' => 'rand' );
                                        $loop = new WP_Query($args1);
                                        while ($loop->have_posts()) : $loop->the_post();
                                            global $product; ?>

                                            <li>
                                                <div class="left-block">
                                            	    <!--div class="left-block-inside"-->
                                                    <?php
                                                    //$wthumbnail_id = get_woocommerce_term_meta(  $loop->post->ID, 'thumbnail_id', true );
                                                    //$wimage = wp_get_attachment_url( $wthumbnail_id );

                                                    $product = new WC_product($loop->post->ID);
                                                    $image_id = $product->get_image_id();
                                                    $image_link = wp_get_attachment_url($image_id);

                                                    $price = intval(get_post_meta($loop->post->ID, '_regular_price', true));
                                                    $sale = intval(get_post_meta($loop->post->ID, '_sale_price', true));

                                                    //$product = wc_get_product( $loop->post->ID );
                                                    //$attachment_ids = $product->get_gallery_attachment_ids();
                                                    //var_dump($attachment_ids);
                                                    ?>

                                                    <a href="<?php echo get_permalink($loop->post->ID) ?>">
                                                        <img class="img-responsive" <?php /*style="height: 199px; "*/ ?>
                                                             alt="<?php echo esc_attr($loop->post->post_title); ?>"
                                                             src="<?php
                                                             echo $image_link;
                                                             ?>" /></a>
                                                    <!--  <div class="quick-view">
                                            <a title="Рекомендуем" class="heart" href="#"></a>
                                    <?php
                                                    if ($sale < $price) {
                                                        $disc = intval(($price - $sale) * 100 / $price);
                                                        print("<a title=\"Скидка " . $disc . "%\" class=\"compare\" href=\"#\"></a>");
                                                    } ?>
                                            <a title="Лидер продаж" class="search" href="#"></a>
                                    </div>-->
                                                    <!--/div-->
                                                    <!--div class="add-to-cart">
                                                        <a title="Добавить в корзину"
                                                           data-product_id="<?php echo $loop->post->ID; ?>"
                                                           class="button add_to_cart_button"
                                                           href="/?add-to-cart=<?php echo $loop->post->ID; ?>">Добавить
                                                            в корзину</a>
                                                    </div-->
                                                </div>
                                                <div class="right-block">
                                                    <div style="height: 65px;">
                                                    <h5 class="product-name"><a
                                                            <?php $sPName = esc_attr($loop->post->post_title); $sP75Name = $sPName;
                                                              $bNeedTitle = false;
                                                              if (mb_strlen($sPName, 'UTF-8') > 55) {
                                                                $sP75Name = mb_substr($sPName, 0, 55, 'UTF-8')."..."; $bNeedTitle = true;
                                                              } ?>
                                                            href="<?php echo get_permalink($loop->post->ID); 
                                                            if ($bNeedTitle) print("\" title=\"".$sPName); ?>"><?php 
                                                            print($sP75Name);
                                                            ?></a>
                                                    </h5>
                                                    </div>

                                                    <div class="content_price">
                                                        <del><span
                                                                class="amount"><?php print($price . "<span style=\"text-decoration: none;\" class=\"rur\">&nbsp;руб.</span>"); 
                                                                ?></span></del><br />
                                                        <ins style="text-decoration:none;">
                                                            <span
                                                                class="amount"><?php 
                                                                print($sale . "<span class=\"rur\">&nbsp;руб.</span>");
                                                                /*print($sale . "&nbsp;&#8381;.");*/ ?></span>
                                                        </ins>
                                                    </div>
                                                    <div class="featured-add-cart-button">
                                                        <a title="Добавить в корзину"
                                                           data-product_id="<?php echo $loop->post->ID; ?>"
                                                           class="button add_to_cart_button"
                                                           href="/?add-to-cart=<?php echo $loop->post->ID; ?>">В корзину</a>
                                                    </div>

                                                    
                                                    <?php /*<div class="product-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div> */ ?>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php } // end of foreach by subcategories
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end featured category fashion -->

        <?php
    } //foreach
} // all categories
?>
