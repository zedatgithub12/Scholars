<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Online Food Delivery
 */
?>
    <footer role="contentinfo">
        <?php //Set widget areas classes based on user choice
            $online_food_delivery_widget_areas = get_theme_mod('online_food_delivery_footer_widget_layout', '4');
            if ($online_food_delivery_widget_areas == '3') {
                $cols = 'col-lg-4 col-md-4';
            } elseif ($online_food_delivery_widget_areas == '4') {
                $cols = 'col-lg-3 col-md-3';
            } elseif ($online_food_delivery_widget_areas == '2') {
                $cols = 'col-lg-6 col-md-6';
            } else {
                $cols = 'col-lg-12 col-md-12';
            }
        ?>
        <div class="footertown">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-1'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-2'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-3'); ?>
                      </div>
                    <?php endif; ?> 
                    <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                      <div class="sidebar-column <?php echo esc_attr( $cols ); ?>">
                        <?php dynamic_sidebar( 'footer-4'); ?>
                      </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div id="footer">
        	<div class="container">
                <p class="mb-0"><?php online_food_delivery_credit_link(); ?> <?php echo esc_html(get_theme_mod('online_food_delivery_footer_copy',__('By ThemesCaliber','online-food-delivery'))); ?></p>
            </div>
        </div>

        <?php if( get_theme_mod( 'online_food_delivery_show_back_to_top',true) != '' || get_theme_mod('online_food_delivery_responsive_show_back_to_top',true) != '') { ?>
            <?php $online_food_delivery_scroll_lay = get_theme_mod( 'online_food_delivery_back_to_top_alignment','Right');
            if($online_food_delivery_scroll_lay == 'Left'){ ?>
                <a href="#" class="scrollup left"><span><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?><?php if(get_theme_mod('online_food_delivery_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('online_food_delivery_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?></span></a>
            <?php }else if($online_food_delivery_scroll_lay == 'Center'){ ?>
                <a href="#" class="scrollup center"><span><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?><?php if(get_theme_mod('online_food_delivery_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('online_food_delivery_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?></span></a>
            <?php }else{ ?>
                <a href="#" class="scrollup right"><span><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?><?php if(get_theme_mod('online_food_delivery_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('online_food_delivery_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('online_food_delivery_back_to_top_text',__('Back to Top', 'online-food-delivery' )) ); ?></span></a>
            <?php }?>
        <?php }?>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>