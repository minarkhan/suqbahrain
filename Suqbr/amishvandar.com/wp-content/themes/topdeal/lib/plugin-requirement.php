<?php
/***** Active Plugin ********/
require_once( get_template_directory().'/lib/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'topdeal_register_required_plugins' );
function topdeal_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => esc_html__( 'WooCommerce', 'topdeal' ), 
            'slug'               => 'woocommerce', 
            'required'           => true, 
			'version'			 => '4.1.0'
        ),

		array(
            'name'               => esc_html__( 'Revslider', 'topdeal' ), 
            'slug'               => 'revslider',
			'source'             => get_template_directory() . '/lib/plugins/revslider.zip', 
            'required'           => true, 
            'version'            => '6.2.8'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Core', 'topdeal' ),
            'slug'      		 => 'sw_core',
			'source'             => get_template_directory() . '/lib/plugins/sw_core.zip', 
            'required'  		 => true,   
			'version'			 => '1.2.6'
			),
		
		array(
            'name'     			 => esc_html__( 'SW WooCommerce', 'topdeal' ),
            'slug'      		 => 'sw_woocommerce',
			'source'             => get_template_directory() . '/lib/plugins/sw_woocommerce.zip', 
            'required'  		 => true,
			'version'			 => '1.5.12'
        ),
		
		array(
            'name'     			 => esc_html__( 'SW Ajax Woocommerce Search', 'topdeal' ),
            'slug'      		 => 'sw_ajax_woocommerce_search',
			'source'             => get_template_directory() . '/lib/plugins/sw_ajax_woocommerce_search.zip', 
            'required'  		 => true,
			'version'			 => '1.1.12'
        ),
		
		array(
            'name'               => esc_html__( 'Sw Woocommerce Swatches', 'topdeal' ), 
            'slug'               => 'sw_wooswatches', 
			'source'             => get_template_directory() . '/lib/plugins/sw_wooswatches.zip', 
            'required'           => true, 
			'version'			 => '1.0.11'
        ),
		
		array(
            'name'               => esc_html__( 'Sw Woocommerce Catalog', 'topdeal' ), 
            'slug'               => 'sw-woocatalog', 
			'source'             => get_template_directory() . '/lib/plugins/sw-woocatalog.zip', 
            'required'           => true, 
			'version'			 => '1.0.3'
        ),
		
		array(
            'name'               => esc_html__( 'One Click Demo Import', 'topdeal' ), 
            'slug'               => 'one-click-demo-import', 
			'source'             => get_template_directory() . '/lib/plugins/one-click-demo-import.zip', 
            'required'           => true, 
        ),
		array(
            'name'               => esc_html__( 'Visual Composer', 'topdeal' ), 
            'slug'               => 'js_composer', 
            'source'             => get_template_directory() . '/lib/plugins/js_composer.zip',  
            'required'           => true, 
            'version'            => '6.2.0'
        ), 		
		array(
            'name'     			 => esc_html__( 'WordPress Importer', 'topdeal' ),
            'slug'      		 => 'wordpress-importer',
            'required' 			 => true,
        ), 
		array(
            'name'      		 => esc_html__( 'MailChimp for WordPress Lite', 'topdeal' ),
            'slug'     			 => 'mailchimp-for-wp',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'Contact Form 7', 'topdeal' ),
            'slug'     			 => 'contact-form-7',
            'required' 			 => false,
        ),
		array(
            'name'      		 => esc_html__( 'YITH Woocommerce Compare', 'topdeal' ),
            'slug'      		 => 'yith-woocommerce-compare',
            'required'			 => false
        ),
		 array(
            'name'     			 => esc_html__( 'YITH Woocommerce Wishlist', 'topdeal' ),
            'slug'      		 => 'yith-woocommerce-wishlist',
            'required' 			 => false
        ), 
		array(
            'name'     			 => esc_html__( 'WordPress Seo', 'topdeal' ),
            'slug'      		 => 'wordpress-seo',
            'required'  		 => false,
        ),

    );
		if( topdeal_options()->getCpanelValue('developer_mode') ): 
			$plugins[] = array(
				'name'               => esc_html__( 'Less Compile', 'topdeal' ), 
				'slug'               => 'lessphp', 
				'source'             => get_template_directory() . '/lib/plugins/lessphp.zip',  
				'required'           => true, 
				'version'			 => '4.0.1'
			);
		endif;
    $config = array();

    tgmpa( $plugins, $config );

}
add_action( 'vc_before_init', 'topdeal_vcSetAsTheme' );
function topdeal_vcSetAsTheme() {
    vc_set_as_theme();
}