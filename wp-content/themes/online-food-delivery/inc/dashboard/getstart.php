<?php
//about theme info
add_action( 'admin_menu', 'online_food_delivery_gettingstarted' );
function online_food_delivery_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'online-food-delivery'), esc_html__('Get Started', 'online-food-delivery'), 'edit_theme_options', 'online_food_delivery_guide', 'online_food_delivery_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function online_food_delivery_admin_theme_style() {
   wp_enqueue_style('online-food-delivery-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'online_food_delivery_admin_theme_style');

//guidline for about theme
function online_food_delivery_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'online-food-delivery' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="online_food_delivery_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'online-food-delivery' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="online_food_delivery_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'online-food-delivery' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="online_food_delivery_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'online-food-delivery' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Online food delivery Theme', 'online-food-delivery' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'online-food-delivery' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'online-food-delivery'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'online-food-delivery'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Online food delivery is a phenomenal and bold theme that works on any platform. In the world of the internet, everyone wants their business online. So, this theme is your chance to do your business online with no effort. The theme is responsive, and users can easily operate with their mobile phones. This fantastic theme is suitable for any food delivery company, grocery store, or supermarket. Users can use this theme according to their desire and wish as it is completely customizable. The theme is user-friendly, with all the necessary plugins. The layout of this theme is niche specific. Users can also change background color, images, texts, or anything according to their choice. This SEO-friendly online food delivery theme is perfect for beginners to start their online journey. The clean-coded theme is the one where you dont need to learn any coding language. So, this clean code theme can be used without any coding skills. The theme is loaded with features and customization options. Such as the theme includes responsive design, favicon, logo, title, tagline customization, advanced Color options, 100+ Font Family Options, Background Image Option, Simple and Mega Menu Option, Enable-Disable options on all sections, and many more', 'online-food-delivery' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Online food delivery Theme Information', 'online-food-delivery' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'online-food-delivery' ); ?></a></p>
				<p><a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'online-food-delivery' ); ?></a></p>
				<p><a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'online-food-delivery' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Online food delivery Pro Theme', 'online-food-delivery' ); ?></h4>
				<P><?php esc_html_e( 'The premium food ordering WordPress theme is food intend theme. It is created for restaurant businesses, online food shops, and supermarkets. Users can use this theme as a home delivery site to provide service. Users can use this theme to make the website look amazing and eye-catching for their audiences. The mobile responsive nature of this theme gives a beautiful design appearance to any screen size. It can adjust according to the size of the screens. The theme is designed with a great color panel and amazing fonts.
               The food ordering WordPress theme has personalization options so users can adjust the theme according to their wishes and nature. This theme can be used by anyone, including organic foods stores and nutritionist health coaches. The theme is divided into sections, such as the service section, gallery section, testimonial section, and many more. Moreover, the fantastic features of this theme include Call to Action Button (CTA), social media integration, and SEO-friendly, optimized codes. So, what are you waiting for? Start your online journey now with this amazing food ordering WordPress theme.', 'online-food-delivery' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'online-food-delivery' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'online-food-delivery' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode0', 'online-food-delivery' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'online-food-delivery' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'online-food-delivery' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'online-food-delivery' ); ?></P>
					<a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'online-food-delivery' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'online-food-delivery'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'online-food-delivery' ); ?></P>
					<a href="<?php echo esc_url( ONLINE_FOOD_DELIVERY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'online-food-delivery'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>