<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Online Food Delivery
 */
get_header(); ?>

<main id="main" role="main" class="theme-main-box pt-5">
    <div class="container">
        <?php
        $online_food_delivery_left_right = get_theme_mod( 'online_food_delivery_theme_options','Right Sidebar');
        if($online_food_delivery_left_right == 'Left Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>

                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                      
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                      
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php }else if($online_food_delivery_left_right == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($online_food_delivery_left_right == 'One Column'){ ?>
            <?php
                the_archive_title( '<h1 class="entry-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                    <div class="navigation my-3">
                        <?php online_food_delivery_post_navigation();?>
                        <div class="clearfix"></div>
                    </div>
                <?php }?>
            <?php }?>
            <?php if ( have_posts() ) :
                /* Start the Loop */
                  
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content' ); 
                  
                endwhile;
                wp_reset_postdata();
                else :

                    get_template_part( 'no-results' ); 

                endif; 
            ?>
            <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                    <div class="navigation my-3">
                        <?php online_food_delivery_post_navigation();?>
                        <div class="clearfix"></div>
                    </div>
                <?php }?>
            <?php }?>
        <?php }else if($online_food_delivery_left_right == 'Three Columns'){ ?>
            <div class="row">
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
                <div class="col-lg-4 col-md-4">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($online_food_delivery_left_right == 'Four Columns'){ ?>
            <div class="row">
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
                <div class="col-lg-3 col-md-6">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
                <div class="col-lg-3 col-md-6"><?php get_sidebar(); ?></div>
            </div>
        <?php }else if($online_food_delivery_left_right == 'Grid Layout'){ ?>  
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <div class="row">
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                              
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/grid-layout' ); 
                              
                            endwhile;
                            wp_reset_postdata();
                            else :

                                get_template_part( 'no-results' ); 

                            endif; 
                        ?>
                    </div>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
            </div>
        <?php }else {?>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <?php
                        the_archive_title( '<h1 class="entry-title">', '</h1>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'top' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        wp_reset_postdata();
                        else :

                            get_template_part( 'no-results' ); 

                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'online_food_delivery_navigation_hide',true) != '') { ?>
                        <?php if( get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'bottom' || get_theme_mod( 'online_food_delivery_post_navigation_position','bottom') == 'both')  { ?>
                            <div class="navigation my-3">
                                <?php online_food_delivery_post_navigation();?>
                                <div class="clearfix"></div>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="col-lg-4 col-md-4"><?php get_sidebar(); ?></div>
            </div>
        <?php } ?>
    </div>
</main>

<?php get_footer(); ?>