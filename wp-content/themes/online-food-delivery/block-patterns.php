<?php
/**
 * Online Food Delivery: Block Patterns
 *
 * @package Online Food Delivery
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'online-food-delivery',
		array( 'label' => __( 'Online Food Delivery', 'online-food-delivery' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'online-food-delivery/banner-section',
		array(
			'title'      => __( 'Banner Section', 'online-food-delivery' ),
			'categories' => array( 'online-food-delivery' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/banner-image.png\",\"id\":3990,\"dimRatio\":0,\"focalPoint\":{\"x\":\"0.51\",\"y\":\"0.96\"},\"isDark\":false,\"align\":\"full\",\"className\":\"online-food-delivery-banner-section\"} -->\n<div class=\"wp-block-cover alignfull is-light online-food-delivery-banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-3990\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/banner-image.png\" style=\"object-position:51% 96%\" data-object-fit=\"cover\" data-object-position=\"51% 96%\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"className\":\"online-food-delivery-banner-column-section mx-lg-5 px-lg-5\"} -->\n<div class=\"wp-block-columns online-food-delivery-banner-column-section mx-lg-5 px-lg-5\"><!-- wp:column {\"width\":\"50%\",\"className\":\"online-food-delivery-banner-text-section px-lg-5  px-sm-0\"} -->\n<div class=\"wp-block-column online-food-delivery-banner-text-section px-lg-5  px-sm-0\" style=\"flex-basis:50%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"40px\"}}} -->\n<h1 style=\"font-size:40px\">We Deliver The Taste Of Life</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p style=\"font-size:15px\">Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:search {\"label\":\"\",\"placeholder\":\"Enter your food name\",\"buttonText\":\"Find Food\",\"buttonPosition\":\"button-inside\",\"textColor\":\"white\"} /--></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"online-food-delivery-banner-second-section\"} -->\n<div class=\"wp-block-column online-food-delivery-banner-second-section\"><!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"4%\",\"backgroundColor\":\"white\",\"className\":\"social-icons mx-5\"} -->\n<div class=\"wp-block-column social-icons mx-5 has-white-background-color has-background\" style=\"flex-basis:4%\"><!-- wp:social-links {\"size\":\"has-small-icon-size\",\"className\":\"is-style-logos-only\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\",\"orientation\":\"horizontal\"}} -->\n<ul class=\"wp-block-social-links has-small-icon-size is-style-logos-only\"><!-- wp:social-link {\"url\":\"#\",\"service\":\"facebook\"} /--></ul>\n<!-- /wp:social-links -->\n\n<!-- wp:social-links {\"size\":\"has-small-icon-size\",\"className\":\"is-style-logos-only\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<ul class=\"wp-block-social-links has-small-icon-size is-style-logos-only\"><!-- wp:social-link {\"url\":\"#\",\"service\":\"twitter\"} /--></ul>\n<!-- /wp:social-links -->\n\n<!-- wp:social-links {\"size\":\"has-small-icon-size\",\"className\":\"is-style-logos-only\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<ul class=\"wp-block-social-links has-small-icon-size is-style-logos-only\"><!-- wp:social-link {\"url\":\"#\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links -->\n\n<!-- wp:social-links {\"size\":\"has-small-icon-size\",\"className\":\"is-style-logos-only\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<ul class=\"wp-block-social-links has-small-icon-size is-style-logos-only\"><!-- wp:social-link {\"url\":\"#\",\"service\":\"instagram\"} /--></ul>\n<!-- /wp:social-links -->\n\n<!-- wp:social-links {\"size\":\"has-small-icon-size\",\"className\":\"is-style-logos-only\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<ul class=\"wp-block-social-links has-small-icon-size is-style-logos-only\"><!-- wp:social-link {\"url\":\"#\",\"service\":\"pinterest\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'online-food-delivery/product-section',
		array(
			'title'      => __( 'Product Section', 'online-food-delivery' ),
			'categories' => array( 'online-food-delivery' ),
			'content'    => "<!-- wp:group {\"className\":\"online-food-delivery-product-section pt-5\"} -->\n<div class=\"wp-block-group online-food-delivery-product-section pt-5\"><!-- wp:heading {\"textAlign\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Browse Food Category</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"15px\"}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:15px\">Buy the most appetizing pizza you have never eaten before in your life</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"categories\":[18],\"className\":\"online-food-delivery-product-column-section pt-3\"} /--></div>\n<!-- /wp:group -->",
		)
	);
}