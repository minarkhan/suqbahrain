<?php 

add_filter( 'wcmp_sold_by_text_after_products_shop_page', 'topdeal_custom_filter_soldby' );
function topdeal_custom_filter_soldby(){
	return false;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'topdeal_custom_action_soldby', 11 );
function topdeal_custom_action_soldby(){
	global $post;
	if ('Enable' === get_wcmp_vendor_settings('sold_by_catalog', 'general') ) {
		$vendor = get_wcmp_product_vendors($post->ID);
		if ($vendor) {
			$sold_by_text = apply_filters('wcmp_sold_by_text', __('Sold By', 'topdeal'), $post->ID);
			echo '<a class="by-vendor-name-link" style="display: block;" href="' . $vendor->permalink . '">' . $sold_by_text . ' <span>' . $vendor->user_data->display_name . '</span></a>';
			do_action('after_sold_by_text_shop_page', $vendor);
		}
	}
}