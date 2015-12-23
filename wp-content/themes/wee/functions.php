<?php
	include_once(TEMPLATEPATH.'/includes/BFI_Thumb.php');
	include_once(TEMPLATEPATH.'/includes/resize.php');

	add_filter( 'wpseo_canonical', '__return_false' );

	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'second', 'Second Menu' );
	register_nav_menu( 'leftstatic', 'Left Static Menu' );
	register_nav_menu( 'third', 'Third Menu' );
	add_theme_support( 'post-thumbnails' );

	include_once(TEMPLATEPATH.'/newfields.php');


	function vish_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Календарь'),
			'id' => 'calendar',
			'description' => __( 'Календарь' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}

	add_action( 'widgets_init', 'vish_widgets_init' );

    function get_numerics ($str) {
        preg_match_all('/\d+/', $str, $matches);
        return $matches[0];
    }

	function custom_excerpt_length( $length ) {
		return 31;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );
	// remove version info from head and feeds
	function complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'complete_version_removal');

	add_filter( 'login_headerurl', 'namespace_login_headerurl' );
	function namespace_login_headerurl( $url ) {
	    $url = home_url( '/' );
	    return $url;
	}

	add_filter( 'login_headertitle', 'namespace_login_headertitle' );
	/**
	 * Replaces the login header logo title
	 *
	 * @param $title
	 */
	function namespace_login_headertitle( $title ) {
	    $title = get_bloginfo( 'name' );
	    return $title;
	}

	add_action( 'login_head', 'namespace_login_style' );
	/**
	 * Replaces the login header logo
	 */
	function namespace_login_style() {
	    echo '<style>.login h1 a { background-image: url( ' . get_template_directory_uri() . '/img/logo.png ) !important; background-size: 260px 33px;  height: 33px; width: 260px; margin: 0 auto; }</style>';
	}
	// remove unnecessary header info
	function remove_header_info() {
	    remove_action('wp_head', 'rsd_link');
	    remove_action('wp_head', 'wlwmanifest_link');
	    remove_action('wp_head', 'wp_generator');
	    remove_action('wp_head', 'start_post_rel_link');
	    remove_action('wp_head', 'index_rel_link');
	    remove_action('wp_head', 'adjacent_posts_rel_link');         // for WordPress <  3.0
	    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // for WordPress >= 3.0
	}
	add_action('init', 'remove_header_info');

	// remove extra CSS that 'Recent Comments' widget injects
	function remove_recent_comments_style() {
	    global $wp_widget_factory;
	    remove_action('wp_head', array(
	        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
	        'recent_comments_style'
	    ));
	}
	add_action('widgets_init', 'remove_recent_comments_style');

 	function my_search_form( $form ) {
		$form = '<form role="search" class="search-from" method="get" id="searchform" action="' . home_url( '/' ) . '" >
					<input class="search-field" type="text" name="s" placeholder="'.__('[:en]search[:ru]поиск[:ua]пошук').'" value="'.get_search_query().'" />
                    <button type="submit"></button>
                </form>';

		return $form;
	}

	add_filter( 'get_search_form', 'my_search_form' );	
	
	function SearchFilter($query) {
	    // If 's' request variable is set but empty
	    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
	        $query->is_search = true;
	        $query->is_home = false;
	    }
	    return $query;
	}
	add_filter('pre_get_posts','SearchFilter');	
	
	function my_bcn_allowed_html($allowed_html)
	{
	$allowed_html['li'] = array(
	'title' => true,
	'class' => true,
	'id' => true,
	'dir' => true,
	'align' => true,
	'lang' => true,
	'xml:lang' => true,
	'aria-hidden' => true,
	'data-icon' => true,
	'itemref' => true,
	'itemid' => true,
	'itemprop' => true,
	'itemscope' => true,
	'itemtype' => true,
	'property' => true,
	'xmlns:v' => true
	);

	$allowed_html['span'] = array(
	'title' => true,
	'class' => true,
	'id' => true,
	'dir' => true,
	'align' => true,
	'lang' => true,
	'xml:lang' => true,
	'aria-hidden' => true,
	'data-icon' => true,
	'itemref' => true,
	'itemid' => true,
	'itemprop' => true,
	'itemscope' => true,
	'itemtype' => true,
	'rel' => true,
	'typeof' => true,
	'property' => true,
	'xmlns:v' => true
	);

	$allowed_html['div'] = array(
	'title' => true,
	'class' => true,
	'id' => true,
	'dir' => true,
	'align' => true,
	'lang' => true,
	'xml:lang' => true,
	'aria-hidden' => true,
	'data-icon' => true,
	'itemref' => true,
	'itemid' => true,
	'itemprop' => true,
	'itemscope' => true,
	'itemtype' => true,
	'rel' => true,
	'typeof' => true,
	'property' => true,
	'xmlns:v' => true
	);

	$allowed_html['a'] = array(
	'title' => true,
	'class' => true,
	'id' => true,
	'dir' => true,
	'align' => true,
	'lang' => true,
	'xml:lang' => true,
	'aria-hidden' => true,
	'data-icon' => true,
	'itemref' => true,
	'itemid' => true,
	'itemprop' => true,
	'itemscope' => true,
	'itemtype' => true,
	'rel' => true,
	'typeof' => true,
	'property' => true,
	'xmlns:v' => true,
	'href' => true
	);

	return $allowed_html;
	}
	add_filter('bcn_allowed_html', 'my_bcn_allowed_html');
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

	function shrink_previous_post_link($format, $link){
	    $in_same_cat = false;
	    $excluded_categories = '';
	    $previous = true;
	    $link='%title';
	    $format='&larr; %link';


	    if ( $previous && is_attachment() )
	        $post = & get_post($GLOBALS['post']->post_parent);
	    else
	        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

	    if ( !$post )
	        return;

	    $title = $post->post_title;

	    if ( empty($post->post_title) )
	        $title = $previous ? __('Previous Post') : __('Next Post');

	    $rel = $previous ? 'prev' : 'next';

	    //Save the original title
	    $original_title = $title;

	    //create short title, if needed
	    // if (strlen($title)>40){
	    //     $first_part = mb_substr($title, 0, 23);
	    //     $last_part = mb_substr($title, -17);
	    //     $title = $first_part."...".$last_part;
	    // }    

	    $string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" title="'.$original_title.'">';
	    $link = str_replace('%title', $title, $link);   
	    $link = $string . $link . '</a>';

	    $format = str_replace('%link', $link, $format);

	    echo $format;   
	}

	function shrink_next_post_link($format, $link){
	    $in_same_cat = false;
	    $excluded_categories = '';
	    $previous = false;
	    $link='%title';
	    $format='%link &rarr;';

	    if ( $previous && is_attachment() )
	        $post = & get_post($GLOBALS['post']->post_parent);
	    else
	        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);

	    if ( !$post )
	        return;

	    $title = $post->post_title;

	    if ( empty($post->post_title) )
	        $title = $previous ? __('Previous Post') : __('Next Post');

	    $rel = $previous ? 'prev' : 'next';

	    //Save the original title
	    $original_title = $title;

	    //create short title, if needed
	    // if (strlen($title)>40){
	    //     $first_part = mb_substr($title, 0, 23);
	    //     $last_part = mb_substr($title, -17);
	    //     $title = $first_part."...".$last_part;
	    // }   

	    $string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" title="'.$original_title.'">';
	    $link = str_replace('%title', $title, $link);   
	    $link = $string . $link . '</a>';

	    $format = str_replace('%link', $link, $format);

	    echo $format;   
	}

	add_filter('next_post_link', 'shrink_next_post_link',10,2);
	add_filter('previous_post_link', 'shrink_previous_post_link',10,2);
	function smarty_modifier_mb_truncate(
				$string,
				$length = 80,
				$etc = '...',
				$charset='UTF-8',
				$break_words = false,
				$middle = false) {

		if ($length == 0) return '';

		if (strlen($string) > $length) {
			$length -= min($length, strlen($etc));
			if (!$break_words && !$middle) {
				$string = preg_replace('/\s+?(\S+)?$/', '',
								 mb_substr($string, 0, $length+1, $charset));
			}
			if(!$middle) {
				return mb_substr($string, 0, $length, $charset) . $etc;
			} else {
				return mb_substr($string, 0, $length/2, $charset) .
								 $etc .
								 mb_substr($string, -$length/2, $charset);
			}
		} else {
			return $string;
		}
	}

	function my_theme_add_editor_styles() {
	    add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'init', 'my_theme_add_editor_styles' );

	/**
	 * Unlimited Search Posts
	 */
	function jc_limit_search_posts() {
		if ( is_search())
			set_query_var('posts_per_page', -1);
	}
	add_filter('pre_get_posts', 'jc_limit_search_posts');

	function override_mce_options($initArray) {
		$opts = '*[*]';
		$initArray['valid_elements'] = $opts;
		$initArray['extended_valid_elements'] = $opts;
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'override_mce_options');

	function wp_corenavi() {
		global $wp_query;
		$pages = '';
		$max = $wp_query->max_num_pages;
		if (!$current = get_query_var('paged')) $current = 1;
		$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
		$a['total'] = $max;
		$a['current'] = $current;

		$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
		$a['mid_size'] = 5; //сколько ссылок показывать слева и справа от текущей
		$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
		$a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
		$a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"
		$a['type'] = 'array'; //текст ссылки "Следующая страница"

		$pages = paginate_links($a);
	    if( is_array( $pages ) ) {
	        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	        echo '<div class="sortPagiBar clearfix"><div class="bottom-pagination"><nav><ul class="pagination">';
	        foreach ( $pages as $page ) {
				echo "<li>$page</li>";
	        }
	       	echo '</ul></nav></div></div>';
	    }
	}

	// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
	function joints_related_posts() {
	    global $post;
	    $tags = wp_get_post_tags( $post->ID );
	    if($tags) {
	        foreach( $tags as $tag ) {
	            $tag_arr .= $tag->slug . ',';
	        }
	        $args = array(
	            'tag' => $tag_arr,
	            'numberposts' => 3, /* You can change this to show more */
	            'post__not_in' => array($post->ID)
	        );
	        $related_posts = get_posts( $args );
	        if($related_posts) {
	        echo '<div class="single-box">';
	        echo '<h2>Схожие записи</h2>';
	        echo '<ul class="related-posts owl-carousel" data-dots="false" data-loop="false" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true">';
	            foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
	                <li class="post-item">
	                	<article class="entry">
			                <div class="entry-thumb image-hover2">
			                    <a href="<?php the_permalink(); ?>">
			                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/data/blog-1.jpg" alt="Blog">
			                    </a>
			                </div>
			                <div class="entry-ci">
			                    <h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			                </div>
	                    </article>
	                </li>
	            <?php endforeach; }
	            }
	    wp_reset_postdata();
	    echo '</ul>';
	    echo '</div>';
	}

	add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
	function jk_woocommerce_breadcrumbs() {
	    return array(
	            'delimiter'   => '<span class="navigation-pipe"></span>',
	            'wrap_before' => '<nav class="breadcrumb clearfix" itemprop="breadcrumb">',
	            'wrap_after'  => '</nav>',
	            'before'      => '',
	            'after'       => '',
	            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	        );
	}

	/* woocommerce_before_single_product_summary hook */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

	/* woocommerce_before_single_product_summary hook */
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

	/* woocommerce_single_product_summary hook */
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10 );

	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

	// Remove "Sale" icon from product archive page
	// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 20 );

	// Remove "Sale" icon from product single page
	// remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 20 );

	/**
	 * @desc Remove in all product type
	 */
	function wc_remove_all_quantity_fields( $return, $product ) {
	    return true;
	}
	add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );

	include_once(TEMPLATEPATH.'/functions2.php');




?>
