<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Online Food Delivery
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('online_food_delivery_preloader_hide',false)!= '' || get_theme_mod('online_food_delivery_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'online_food_delivery_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'online_food_delivery_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'online-food-delivery' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'online-food-delivery' );?></span></a>
		<div id="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-9 align-self-center">
						<div class="logo">
			     	 	<?php if ( has_custom_logo() ) : ?>
		     	    	<div class="site-logo"><?php the_custom_logo(); ?></div>
	            <?php endif; ?>
	            <?php if( get_theme_mod( 'online_food_delivery_site_title',true) != '') { ?>
		            <?php $blog_info = get_bloginfo( 'name' ); ?>
		            <?php if ( ! empty( $blog_info ) ) : ?>
			            <?php if ( is_front_page() && is_home() ) : ?>
			              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			            <?php else : ?>
			              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			            <?php endif; ?>
		            <?php endif; ?>
			        <?php }?>
			        <?php if( get_theme_mod( 'online_food_delivery_site_tagline',true) != '') { ?>
		            <?php
		            $description = get_bloginfo( 'description', 'display' );
		            if ( $description || is_customize_preview() ) :
		            ?>
			            <p class="site-description">
			              <?php echo esc_html($description); ?>
			            </p>
		            <?php endif; ?>
			        <?php }?>
				    </div>
					</div>
					<div class="<?php if( get_theme_mod( 'online_food_delivery_topbar_phoneno') != '') { ?>col-lg-5 col-md-3<?php } else {?>col-lg-7 col-md-6 <?php }?> col-3 align-self-center px-md-0">
						<div class="menubox <?php if( get_theme_mod( 'online_food_delivery_sticky_header') != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?> ps-lg-5">
							<?php if(has_nav_menu('primary')){ ?>
						   	<div class="toggle-menu responsive-menu text-end">
			           	<button role="tab" onclick="online_food_delivery_menu_open()"><i class="<?php echo esc_attr(get_theme_mod('online_food_delivery_responsive_open_menu_icon','fas fa-bars'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','online-food-delivery'); ?></span></button>
			         	</div>
			         	<div id="menu-sidebar" class="nav side-menu">
			            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'online-food-delivery' ); ?>">
			              <?php 
			                wp_nav_menu( array( 
			                  'theme_location' => 'primary',
			                  'container_class' => 'main-menu-navigation clearfix' ,
			                  'menu_class' => 'clearfix',
			                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
			                  'fallback_cb' => 'wp_page_menu',
			                ) ); 
			              ?>
			              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="online_food_delivery_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('online_food_delivery_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','online-food-delivery'); ?></span></a>
			            </nav>
			        	</div>
			      	<?php }?>
			      </div>
					</div>
					<div class="col-lg-2 col-md-2 align-self-center text-md-end text-center header-icons">
						<div class="search-box d-inline-block">
	        		<button type="button" onclick="online_food_delivery_search_show()"><i class="fas fa-search"></i></button>
	        	</div>
		        <div class="search-outer">
		          <div class="serach_inner">
		          	<?php get_search_form(); ?>
		          </div>
		        	<button type="button" class="closepop" onclick="online_food_delivery_search_hide()">X</button>
		        </div>
						<?php if(class_exists('woocommerce')){ ?>
							<a href="<?php the_permalink(get_option('woocommerce_myaccount_page_id')); ?>" class="d-inline-block mx-3"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e('My Account', 'online-food-delivery'); ?></span></a>
							<a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" class="d-inline-block"><i class="fas fa-shopping-bag"></i><span class="screen-reader-text"><?php esc_html_e( 'Cart','online-food-delivery' );?></span></a>
						<?php }?>
					</div>
					<?php if(get_theme_mod('online_food_delivery_topbar_phoneno') != ''){?>
						<div class="col-lg-2 col-md-3 text-md-end text-center align-self-center phone px-md-0">
							<a href="tel:<?php echo esc_attr(get_theme_mod('online_food_delivery_topbar_phoneno')); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html(get_theme_mod('online_food_delivery_topbar_phoneno')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('online_food_delivery_topbar_phoneno')); ?></span></a>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</header>