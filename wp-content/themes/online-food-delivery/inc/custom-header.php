<?php
/**
 * @package Online Food Delivery
 * @subpackage online-food-delivery
 * @since online-food-delivery 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses online_food_delivery_header_style()
*/

function online_food_delivery_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'online_food_delivery_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 80,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'online_food_delivery_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'online_food_delivery_custom_header_setup' );

if ( ! function_exists( 'online_food_delivery_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see online_food_delivery_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'online_food_delivery_header_style' );
function online_food_delivery_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$online_food_delivery_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}
		";
	   	wp_add_inline_style( 'online-food-delivery-basic-style', $online_food_delivery_custom_css );
	endif;
}
endif; // online_food_delivery_header_style
