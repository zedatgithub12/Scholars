<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'online_food_delivery_pageleft_header' ); ?>

<div class="container space-top">
    <main id="main" role="main" class="middle-align">
        <div class="row">       
    		<div class="col-lg-4 col-md-4" id="sidebar">
    			<?php dynamic_sidebar('sidebar-2'); ?>
    		</div>		 
    		<div class="col-lg-8 col-md-8" id="content-ma" >
    			<?php while ( have_posts() ) : the_post(); ?>
                    <div class="feature-box">   
                        <?php the_post_thumbnail(); ?> 
                    </div>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content();
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'online-food-delivery' ),
                        'after'  => '</div>',
                    ) );
                    
                    //If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>
                <div class="clear"></div> 
            </div>  
        </div>
    </main>
</div>

<?php do_action( 'online_food_delivery_pageleft_footer' ); ?>

<?php get_footer(); ?>