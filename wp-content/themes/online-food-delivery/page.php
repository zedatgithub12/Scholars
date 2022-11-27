<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Online Food Delivery
 */
get_header(); ?>

<?php do_action( 'online_food_delivery_page_header' ); ?>

<div class="container space-top">
    <div class="middle-align">
        <main id="main" role="main" class="content-aa">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="feature-box">   
                    <?php the_post_thumbnail(); ?>
                </div>
                <h1><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content();?></div>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'online-food-delivery' ),
                    'after'  => '</div>',
                ) );
                
                    //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>             
        </main>
    </div>
</div>
<div class="clearfix"></div>

<?php do_action( 'online_food_delivery_page_footer' ); ?>

<?php get_footer(); ?>