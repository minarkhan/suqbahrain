<?php 

if ( !defined( 'ICL_LANGUAGE_CODE' ) && !defined('TOPDEAL_THEME') ){
	define( 'TOPDEAL_THEME', 'topdeal_theme' );
}else{
	define( 'TOPDEAL_THEME', 'topdeal_theme'.ICL_LANGUAGE_CODE );
}
update_option( 'sw_purchase_code', 'valid' );
/**
 * Variables
 */
require_once ( get_template_directory().'/lib/activation.php' );			// Custom functions
require_once ( get_template_directory().'/lib/defines.php' );
require_once ( get_template_directory().'/lib/mobile-layout.php' );
require_once ( get_template_directory().'/lib/classes.php' );		// Utility functions
require_once ( get_template_directory().'/lib/utils.php' );			// Utility functions
require_once ( get_template_directory().'/lib/init.php' );			// Initial theme setup and constants
require_once ( get_template_directory().'/lib/cleanup.php' );		// Cleanup
require_once ( get_template_directory().'/lib/nav.php' );			// Custom nav modifications
require_once ( get_template_directory().'/lib/widgets.php' );		// Sidebars and widgets
require_once ( get_template_directory().'/lib/scripts.php' );		// Scripts and stylesheets
require_once ( get_template_directory().'/lib/metabox.php' );	// Custom functions
if( class_exists( 'WooCommerce' ) ){
	require_once ( get_template_directory().'/lib/plugins/currency-converter/currency-converter.php' ); // currency converter
	require_once ( get_template_directory().'/lib/woocommerce-hook.php' );	// Utility functions
	
	if( class_exists( 'WC_Vendors' ) ) :
		require_once ( get_template_directory().'/lib/wc-vendor-hook.php' );			/** WC Vendor **/
	endif;
	
	if( class_exists( 'WeDevs_Dokan' ) ) :
		require_once ( get_template_directory().'/lib/dokan-vendor-hook.php' );			/** Dokan Vendor **/
	endif;
	
	if( class_exists( 'WCMp' ) ) :
		require_once ( get_template_directory().'/lib/wc-marketplace-hook.php' );			/** WC MarketPlace Vendor **/
	endif;
}

function topdeal_template_load( $template ){ 
	if( !is_user_logged_in() && topdeal_options()->getCpanelValue('maintaince_enable') ){
		$template = get_template_part( 'maintaince' );
	}
	return $template;
}
add_filter( 'template_include', 'topdeal_template_load' );

add_filter( 'topdeal_widget_register', 'topdeal_add_custom_widgets' );
function topdeal_add_custom_widgets( $topdeal_widget_areas ){
	if( class_exists( 'sw_woo_search_widget' ) ){
		$topdeal_widget_areas[] = array(
			'name' => esc_html__('Widget Search', 'topdeal'),
			'id'   => 'search',
			'before_widget' => '<div id="%1$s" class="widget %1$s %2$s"><div class="widget-inner">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		);
	}
	return $topdeal_widget_areas;
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Feture Tech BD', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Hello,Greetings from Future Tech BD team! Need help? Contact the developer <a href="mailto:arkobd1@gmail.com">here</a>.<br/> For more Wordpress theme please visit: <a href="http://futuretechbd.xyz" target="_blank">Future Tech BD</a><br/><br/>
<div align="center">
<a href="http://futuretechbd.xyz/">
         <img alt="Qries" src="http://futuretechbd.xyz/wp-content/uploads/2020/01/ftbdlogo.png"
         width=180" height="60">
      </a></div></p>';
}