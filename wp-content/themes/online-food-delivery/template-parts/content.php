<?php
/**
 * The template part for displaying slider
 *
 * @package Online Food Delivery
 * @subpackage online_food_delivery
 * @since Online Food Delivery 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="services-box mb-5">    
    <?php if(has_post_thumbnail() && get_theme_mod( 'online_food_delivery_feature_image_hide',true) != '') { ?>
      <div class="service-image">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
          <?php  the_post_thumbnail(); ?>
          <span class="screen-reader-text"><?php the_title(); ?></span>
        </a>
      </div>
    <?php }?>
    <div class="lower-box">
      <div class="tc-category">
        <?php the_category(); ?>
      </div>
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'online_food_delivery_date_hide',true) != '' || get_theme_mod( 'online_food_delivery_comment_hide',true) != '' || get_theme_mod( 'online_food_delivery_author_hide',true) != '' || get_theme_mod( 'online_food_delivery_time_hide',true) != '') { ?>
        <div class="metabox py-1 px-2 mb-3">
          <?php if( get_theme_mod( 'online_food_delivery_date_hide',true) != '') { ?>
            <span class="entry-date me-2"><i class="far fa-calendar-alt me-1"></i><?php echo esc_html( get_the_date() ); ?></span>
          <?php } ?>

          <?php if( get_theme_mod( 'online_food_delivery_author_hide',true) != '') { ?>
            <span class="entry-author me-2"><i class="fas fa-user me-1"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if( get_theme_mod( 'online_food_delivery_comment_hide',true) != '') { ?>
            <i class="fas fa-comments me-1"></i><span class="entry-comments me-2"> <?php comments_number( __('0 Comments','online-food-delivery'), __('0 Comments','online-food-delivery'), __('% Comments','online-food-delivery') ); ?></span>
          <?php } ?>

          <?php if( get_theme_mod( 'online_food_delivery_time_hide',false) != '') { ?>
            <span class="entry-time"><i class="fas fa-clock me-1"></i> <?php echo esc_html( get_the_time() ); ?></span>
          <?php }?>
        </div>
      <?php } ?>
      <?php if(get_theme_mod('online_food_delivery_post_content') == 'Full Content'){ ?>
        <?php the_content(); ?>
      <?php }
      if(get_theme_mod('online_food_delivery_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
        <?php if(get_the_excerpt()) { ?>
          <p><?php $excerpt = get_the_excerpt(); echo esc_html( online_food_delivery_string_limit_words( $excerpt, esc_attr(get_theme_mod('online_food_delivery_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('online_food_delivery_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
      <?php }?>
      <?php if ( get_theme_mod('online_food_delivery_post_button_text','Read More') != '' ) {?>
        <div class="read-btn mt-4">
          <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('online_food_delivery_post_button_text',__( 'Read More','online-food-delivery' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('online_food_delivery_post_button_text',__( 'Read More','online-food-delivery' )) ); ?></span>
          </a>
        </div>
      <?php }?>
    </div>
  </div>
</article>