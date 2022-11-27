<?php
/**
 * The template for displaying search forms in Online Food Delivery
 *
 * @package Online Food Delivery
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'online-food-delivery' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type to search', 'placeholder', 'online-food-delivery' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'online-food-delivery' ); ?>">
</form>