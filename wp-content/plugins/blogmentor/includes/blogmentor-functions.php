<?php

/**
 * Return post category array.
 */
if (!function_exists('bm_blog_elements_post_categories')) {

    function bm_blog_elements_post_categories() {

        $terms = get_terms(
                array(
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }

        return $options;
    }

}

/**
 * Return post author array.
 */
if (!function_exists('bm_blog_elements_post_author')) {

    function bm_blog_elements_post_author() {

        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'role__not_in' => array('customer', 'subscriber'),
        );
        $authors = get_users($args);

        $options = array();
        if (!empty($authors) && !is_wp_error($authors)) {
            foreach ($authors as $author) {
                $options[$author->ID] = $author->user_login;
            }
        }

        return $options;
    }

}

/**
 * Return post tags array.
 */
if (!function_exists('bm_blog_elements_post_tags')) {

    function bm_blog_elements_post_tags() {

        $terms = get_terms(
                array(
                    'taxonomy' => 'post_tag',
                    'hide_empty' => true,
                )
        );

        $options = array();
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->term_id] = $term->name;
            }
        }

        return $options;
    }

}

/**
 * Return post by author
 * */
if (!function_exists('bm_blog_layout_posted_by')) {

    function bm_blog_layout_posted_by() {
        printf(
                /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
                '<span class="byauthor">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>', '<i class="fa fa-user" aria-hidden="true"></i>', __('Posted by', BM_DOMAIN), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
        );
    }

}

/**
 * Return post by author
 * */
if (!function_exists('bm_blog_layout_2_posted_by')) {

    function bm_blog_layout_2_posted_by() {
        printf(
                /* translators: 1: SVG icon. 2: post author, only visible to screen readers. 3: author link. */
                '<span class="byauthor">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>', __(get_avatar(get_the_author_meta('ID'), 40)), __('By', BM_DOMAIN), esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())
        );
    }

}

/**
 * Return post by date and time
 * */
if (!function_exists('bm_blog_layout_posted_on')) { // Not Use

    function bm_blog_layout_posted_on($settings) {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }
			if($settings == 'MDY') {
				$time_string = get_the_date('F j, Y');
			} else if($settings == 'ymd') {
				$time_string = get_the_date('Y-m-d');
			} else if($settings == 'mdy') {
				$time_string = get_the_date('m/d/Y');
			} else if($settings == 'dmy') {
				$time_string = get_the_date('d/m/Y');
			}  else {
				$time_string = get_the_date('F j, Y');
			}
        //$time_string = sprintf(
             // $time_string, esc_attr(get_the_date(DATE_W3C)), esc_html(get_the_date()), esc_attr(get_the_modified_date(DATE_W3C)), esc_html(get_the_modified_date())
       // );

        printf(
                '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>', '<i class="fa fa-clock" aria-hidden="true"></i>', esc_url(get_permalink()), $time_string
        );
    }

}

/**
 * Return post by categories
 * */
if (!function_exists('bm_blog_layout_posted_categories')) {

    function bm_blog_layout_posted_categories() {
        $categories_list = get_the_category_list(__(', ', BM_DOMAIN));
        if ($categories_list) {
            printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                    '<span class="cat-links"><i class="fa fa-list-alt" aria-hidden="true"></i>
%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>', '', __('Posted in', BM_DOMAIN), $categories_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by tags
 * */
if (!function_exists('bm_blog_layout_posted_tag')) {

    function bm_blog_layout_posted_tag() {
        /* translators: used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list('', __(', ', BM_DOMAIN));
        if ($tags_list) {
            printf(
                    /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of tags. */
                    '<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>', '<i class="fa fa-tags" aria-hidden="true"></i>', __('Tags:', BM_DOMAIN), $tags_list
            ); // WPCS: XSS OK.
        }
    }

}

/**
 * Return post by comment count
 * */
if (!function_exists('bm_blog_layout_comment_count')) {

    function bm_blog_layout_comment_count() {
        if (!post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            echo '<i class="fa fa-comments" aria-hidden="true"></i>' . esc_html(get_comments_number());

            /* translators: %s: Name of current post. Only visible to screen readers. */
            //comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', BM_DOMAIN), get_the_title()));

            echo '</span>';
        }
    }

}

/**
 * Return post by image size not in use
 * */
if (!function_exists('bm_blog_layout_image_size')) {

    function bm_blog_layout_image_size() {
        global $_wp_additional_image_sizes;
        $wp_image_sizes = array();
        foreach (get_intermediate_image_sizes() as $_size) {

            if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {

                $wp_image_sizes[$_size] = $_size . ' (' . get_option("{$_size}_size_w") . 'X' . get_option("{$_size}_size_h") . ')';
            } elseif (isset($_wp_additional_image_sizes[$_size])) {

                $wp_image_sizes[$_size] = $_size . ' (' . $_wp_additional_image_sizes[$_size]['width'] . 'X' . $_wp_additional_image_sizes[$_size]['height'] . ')';
            }
        }
        return $wp_image_sizes;
    }

}

/**
 * Return post by image size not in use
 * */
if (!function_exists('bm_metro_style_layout')) {

	function bm_metro_style_layout($columns='1',$metro_column='3',$metro_style='style-1'){
		$i=($columns!='') ? $columns : 1;
		if(!empty($metro_column)){
			//style-3
			if($metro_column=='3' && $metro_style=='style-1'){
				$i=($i<=10) ? $i : ($i%10);
			}
		}
		return $i;
	}

}



/**
 * Return post pagination
 * */
if ( ! function_exists( 'bm_post_pagination' ) ) {
	function bm_post_pagination( $total_pages ) {
		return paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $total_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
	}
}



/**
 * Return post by post detail
 * */
if (!function_exists('bm_get_blog_details')) {

	function bm_get_blog_details($post_arr, $settings, $image_class) {
		if (!empty($post_arr) && !is_wp_error($post_arr)) {
			foreach ($post_arr as $post) {
				if ($post != null && !empty($post->ID)) {
					if (has_post_thumbnail($post->ID)) {
						$image = get_the_post_thumbnail_url($post->ID, $settings['bm_post_image_size'] );
						if (!empty($image) && !is_wp_error($image)) {
							$blog_img = $image;
						} else {
							$blog_img = BM_URL . 'assets/images/placeholder.jpg';
						}
					} else {
						$blog_img = BM_URL . 'assets/images/placeholder.jpg';
					}
					?>
					<div class="blog-part img-box bm_content_box">
						<div <?php echo $image_class; ?>>
							<a href="<?php echo esc_url(get_permalink($post->ID)) ?>" class="blog-img"><img src="<?php echo esc_url($blog_img); ?>" alt="blog-img" /></a>
						</div>
						<div class="blog-detail">
							<?php if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
								$title_link = $post->post_title;
								if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
									$title_link = '<a href="' . esc_url( get_permalink($post->ID) ) . '" rel="bookmark">' . $title_link . '</a>';
								}
								echo $post_title = '<' . $settings['title_tag'] . ' class="blog-header bm_title">' . $title_link . '</' . $settings['title_tag'] . '>';
							}
							if ($settings['show_meta_data'] == "yes") {
								$meta_data = '';
								if (in_array('comments', $settings['meta_data'])) {
									$meta_data = $post->comment_count . ' comments | ';
								}
								if (in_array('date', $settings['meta_data'])) {
									$meta_data .= get_the_date('d M, Y', $post->ID);
								}
								?>
								<span class="blog-span bm_meta"><?php echo $meta_data; ?></span>
							<?php }

							if (isset($settings['show_article_feed']) && $settings['show_article_feed'] == 'full_text' ) {
								$content = $post->post_content;
								if (empty($content)) {
									$content = $post->post_excerpt;
								}
								?><p class="blog-p bm_content"><?php echo $content; ?></p><?php
							} else {
								if (isset($settings['show_excerpt']) && $settings['show_excerpt'] == 'yes' ) {
									$content = get_the_content();
									if (isset($settings['excerpt_from']) && $settings['excerpt_from'] == 'excerpt') {
										if (!empty(get_the_excerpt())) {
											$content = get_the_excerpt();
										}
									} else {
										$content = get_the_content();
									}
									if (isset($settings['show_read_more']) && $settings['show_read_more'] == "yes") {
										if (empty($settings['read_more_text'])){
											$settings['read_more_text'] = 'Read More »';
										}
										$read_more = ' <a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="entry-read-more">' . $settings['read_more_text'] . '</a>';
									} else {
										$read_more = "";
									}
								?>
								<p class="blog-p bm_content"><?php echo wp_trim_words($content, $settings['excerpt_length'], $read_more); ?></p>
							<?php
								}
							}
							?>
						</div>
					</div>
					<?php
				}
			}
		}
	}

}
