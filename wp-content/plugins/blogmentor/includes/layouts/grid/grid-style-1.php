<?php
while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'item bm_layout' ); ?>>
		<div class="bm-blog-post-image entry-post-image">
			<div <?php echo $this->get_render_attribute_string( 'post-image-wrapper' ); ?>>
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( $settings['bm_post_image_size'] );
				} else {
					?>
					<img src="<?php echo BM_URL . 'assets/images/placeholder.jpg'; ?>"/>
				<?php
				}
				?>
			</div>
		</div>
        <div class="bm-blog-post-content bm_content_box">
            <?php
            if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
				$title_link = get_the_title();
				if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
					$title_link = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $title_link . '</a>';
				}
				echo '<' . $settings["title_tag"] . ' class="entry-post-title bm_title">' . $title_link . '</' . $settings["title_tag"] . '>';
            }?>
            <div class="bm-blog-post-meta entry-post-meta bm_meta">
                <?php
                if (isset($settings['show_meta_data']) && $settings['show_meta_data'] == 'yes' ) {
                    if (in_array('author', $settings['meta_data'])) {
                        bm_blog_layout_posted_by();
                    }
                    if (in_array('date', $settings['meta_data'])) {
                        bm_blog_layout_posted_on($settings['date_format']);
                    }
                    if (in_array('comments', $settings['meta_data'])) {
                        bm_blog_layout_comment_count();
                    }
                    if (in_array('tags', $settings['meta_data'])) {
                        bm_blog_layout_posted_tag();
                    }
                    if (in_array('category', $settings['meta_data'])) {
                        bm_blog_layout_posted_categories();
                    }
                }
                ?>
            </div>
            <div class="entry-post-content bm_content">
                <?php
                if (isset($settings['show_article_feed']) && $settings['show_article_feed'] == 'full_text' ) {
                    echo get_the_content();
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
                                $settings['read_more_text'] = __('Read More »', BM_DOMAIN);
                            }
                            $read_more = ' <div><a href="' . esc_url(get_permalink()) . '" rel="bookmark" class="bm-read-more entry-read-more">' . $settings['read_more_text'] . '</a><div>';
                        } else {
                            $read_more = "";
                        }
                        echo wp_trim_words($content, $settings['excerpt_length'], $read_more);
                    }
                }
                ?>
            </div>
        </div>
    </article>
<?php 
endwhile;
wp_reset_postdata();
 ?>