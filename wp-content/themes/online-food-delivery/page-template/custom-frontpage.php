<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Online Food Delivery
 */
get_header(); ?>

<main id="main" role="main">
  
  <?php if( get_theme_mod( 'online_food_delivery_slider_hide_show', false) != ''){ ?>
    <div class="slider-section position-relative">
      <section id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"> 
          <?php $online_food_delivery_slider_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'online_food_delivery_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $online_food_delivery_slider_pages[] = $mod;
              }
            }
            if( !empty($online_food_delivery_slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $online_food_delivery_slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <div class="slider-bgimage">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
                  <p class="mb-3"><?php $excerpt = get_the_excerpt(); echo esc_html( online_food_delivery_string_limit_words( $excerpt,15) ); ?></p>
                  <div class="slider-search">
                    <?php get_search_form(); ?>
                  </div>
                </div>
              </div>
              <div class="social-icons">
                <?php if(get_theme_mod('online_food_delivery_facebook_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'online-food-delivery'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('online_food_delivery_twitter_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'online-food-delivery'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('online_food_delivery_linkedin_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'online-food-delivery'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('online_food_delivery_instagram_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'online-food-delivery'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('online_food_delivery_whatsapp_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_whatsapp_url')); ?>"><i class="fab fa-whatsapp"></i><span class="screen-reader-text"><?php echo esc_html('WahtsApp', 'online-food-delivery'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('online_food_delivery_pinterest_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('online_food_delivery_pinterest_url')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'online-food-delivery'); ?></span></a>
                <?php }?>
              </div>
            </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','online-food-delivery');?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','online-food-delivery');?></span>
          </a>
        </div> 
      </section> 
    </div>
  <?php }?>

  <?php do_action( 'online_food_delivery_before_product_section' ); ?>

  <?php if(get_theme_mod('online_food_delivery_section_title') != '' || get_theme_mod('online_food_delivery_section_text') != '' || get_theme_mod('online_food_delivery_product_category') != ''){ ?>
    <section id="food-category" class="py-5 text-center">
      <div class="container">
        <div class="food-head mb-5">
          <?php if(get_theme_mod('online_food_delivery_section_title') != ''){ ?>
            <h2><?php echo esc_html(get_theme_mod('online_food_delivery_section_title')); ?></h2>
          <?php }?>
          <?php if(get_theme_mod('online_food_delivery_section_text') != ''){ ?>
            <p><?php echo esc_html(get_theme_mod('online_food_delivery_section_text')); ?></p>
          <?php }?>
        </div>
        <?php if(class_exists('woocommerce') && get_theme_mod('online_food_delivery_product_category') != ''){ ?>
          <div class="row">
            <?php 
              $args = array( 
                'post_type' => 'product',
                'product_cat' => get_theme_mod('online_food_delivery_product_category'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="col-lg-3 col-md-6">
                  <div class="product-box mb-4">
                    <div class="product-image position-relative">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                      <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                    </div>
                    <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                    <div class="pro-button">
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                    </div>
                  </div> 
                </div>
              <?php endwhile;
              wp_reset_postdata();
            ?>
          </div>
        <?php }?>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'online_food_delivery_after_product_section' ); ?>

  <div id="content-ma" class="py-5">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</main>

<?php get_footer(); ?>