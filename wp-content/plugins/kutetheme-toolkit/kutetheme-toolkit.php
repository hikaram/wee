<?php
/*
Plugin Name: KutethemeToolkit
Plugin URI: http://kutethemes.com/demo/kuteshop/
Description: A Toolkit for Kute theme
Version: 1.1.3
Author: KuteTheme
Author URI: http://kutethemes.com/
Text Domain: kutetheme
@package Kutetheme toolkit
@author KuteTheme
*/
 
define("KUTETHEME_PLUGIN_PATH", trailingslashit( plugin_dir_path(__FILE__) ) );
define("KUTETHEME_PLUGIN_URL", trailingslashit( plugin_dir_url(__FILE__) ) );


if( ! function_exists('kt_check_active_plugin') ){
    function kt_check_active_plugin( $key ){
        $active_plugins = (array) get_option( 'active_plugins', array() );

		if ( is_multisite() ){
		  $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) ); 
		}
        return in_array( $key, $active_plugins ) || array_key_exists( $key, $active_plugins );
    }
}
/**
 * Render data option for carousel
 * 
 * @param $data array. All data for carousel
 * 
 */
if( ! function_exists( '_data_carousel' ) ){
    function _data_carousel( $data ){
        $output = "";
        foreach($data as $key => $val){
            if($val){
                $output .= ' data-'.$key.'="'.esc_attr( $val ).'"';
            }
        }
        return $output;
    }
}
if( ! function_exists('kt_get_all_attributes') ){
    function kt_get_all_attributes( $tag, $text ) {
        preg_match_all( '/' . get_shortcode_regex() . '/s', $text, $matches );
        $out = array();
        if( isset( $matches[2] ) )
        {
            foreach( (array) $matches[2] as $key => $value )
            {
                if( $tag === $value )
                    $out[] = shortcode_parse_atts( $matches[3][$key] );  
            }
        }
        return $out;
    }
}
if( ! function_exists( 'kt_custom_blog_excerpt_length' ) ){
    function kt_custom_blog_excerpt_length(){
        return 23;
    }
}
load_plugin_textdomain( 'kutetheme', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );

require_once KUTETHEME_PLUGIN_PATH.'mobile-detect/edo-mobile-detect.php';
//Mailchimp
if( ! class_exists( 'KT_Mailchimp' ) ){
    require_once KUTETHEME_PLUGIN_PATH.'mailchimp/mailchimp.php';
}

//CMB2
require_once KUTETHEME_PLUGIN_PATH .'cmb2/init.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/kt_header_field_type.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/kt_page_field_type.php';
require_once KUTETHEME_PLUGIN_PATH .'option_post_type.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/admin.php';

// Woocommerce products filter
//require_once KUTETHEME_PLUGIN_PATH.'woocommerce-products-filter/index.php';

// Post types
require_once KUTETHEME_PLUGIN_PATH .'post-types/post-types.php';

/**
 * Initialising Visual Composer
 * 
 */ 
if ( class_exists( 'Vc_Manager', false ) ) {
    
    if ( ! function_exists( 'js_composer_bridge_admin' ) ) {
		function js_composer_bridge_admin( $hook ) {
			wp_enqueue_style( 'js_composer_bridge', KUTETHEME_PLUGIN_URL . 'js_composer/css/style.css', array() );
		}
	}
    add_action( 'admin_enqueue_scripts', 'js_composer_bridge_admin', 15 );


    require_once KUTETHEME_PLUGIN_PATH.'js_composer/visualcomposer.php';
}

//Shortcodes
require_once KUTETHEME_PLUGIN_PATH .'shortcodes.php';

//Product brand
require_once KUTETHEME_PLUGIN_PATH .'brands/product_brand.php';

//Tax Metabox
require_once KUTETHEME_PLUGIN_PATH .'kt_tax_metabox.php';

