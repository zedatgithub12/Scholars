<?php
$upl_all_post = $blog_posts->posts;
$total_upl_post = count($upl_all_post);
$i = 0;
?>
	<div class="upl-main">
		<div class="upl-container">
			<?php
			if ($total_upl_post > 0)
			{ ?>
				<div class="upl-left-section bm_content_box">
				<?php
				if ( has_post_thumbnail($upl_all_post[$i]->ID) ) {
					$thumbimg = wp_get_attachment_url( get_post_thumbnail_id($upl_all_post[$i]->ID) );
				} else {
					$thumbimg = BM_URL . 'assets/images/placeholder.jpg';
				}
				?>
				<div <?php echo $this->get_render_attribute_string( 'post-image-wrapper' ); ?>>
					<div class="upl-image" style="background-image: url('<?php echo $thumbimg; ?>')"></div>
				</div>
				<div class="upl-author"><img src="<?php echo get_avatar_url($upl_all_post[$i]->post_author); ?>"></div>
				<?php
				if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
					$title_link = wp_trim_words( $upl_all_post[$i]->post_title, 12, NULL);

					if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
						$title_link = '<a href="' . esc_url( get_permalink($upl_all_post[$i]->ID) ) . '" rel="bookmark">' . $title_link . '</a>';
					}
					echo '<div class="upl-title bm_title">' . $title_link . '</div>';
				}
				if (isset($settings['show_metro_excerpt']) && $settings['show_metro_excerpt'] == 'yes' ) {
					$content = $upl_all_post[$i]->post_content;

					if (isset($settings['metro_excerpt_from']) && $settings['metro_excerpt_from'] == 'excerpt') {
						if (!empty($upl_all_post[$i]->post_excerpt)) {
							$content = $upl_all_post[$i]->post_excerpt;
						}
					} else {
						$content = $upl_all_post[$i]->post_content;
					}

					if (isset($settings['show_metro_read_more']) && $settings['show_metro_read_more'] == "yes") {
						if (empty($settings['metro_metro_read_more_text'])){
							$settings['metro_metro_read_more_text'] = __('Read More »', BM_DOMAIN);
						}
						$read_more = ' <a href="' . esc_url(get_permalink($upl_all_post[$i]->ID)) . '" rel="bookmark" class="entry-read-more">' . $settings['metro_metro_read_more_text'] . '</a>';
					} else {
						$read_more = "";
					}
					?>
					<div class="upl-excerpt bm_content"> <?php echo wp_trim_words($content, 30, NULL); ?> </div>
				<?php
				}
				if (isset($settings['show_meta_data']) && $settings['show_meta_data'] == 'yes' ) { ?>
					<div class="upl-cat-date bm_meta">
						<?php
						$post_author = get_the_author_meta('first_name', $upl_all_post[$i]->post_author);
						if(empty($post_author)){
							$post_author = get_the_author_meta('display_name', $upl_all_post[$i]->post_author);
						}
						if($settings['date_format'] == 'MDY') {
							$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'ymd') {
							$post_date = get_the_date('Y-m-d', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'mdy') {
							$post_date = get_the_date('m/d/Y', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'dmy') {
							$post_date = get_the_date('d/m/Y', $upl_all_post[$i]->ID).' ';
						} else {
							$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
						}
						if (!empty($post_author) && !empty($post_date)) {
							echo $post_author . ' | ' . $post_date;
						} else {
							echo $post_author . ' ' . $post_date;
						}?>
					</div>
				<?php
				} ?>
			</div>
			<?php $i++; } ?>

			<?php
			if ($total_upl_post > 1) {

				if ( has_post_thumbnail($upl_all_post[$i]->ID) ) {
					$thumbimg = wp_get_attachment_url( get_post_thumbnail_id($upl_all_post[$i]->ID) );
				} else {
					$thumbimg = BM_URL . 'assets/images/placeholder.jpg';
				}

			?>
			<div class="upl-right-section">
				<div class="upl-top bm_content_box">
					<div <?php echo $this->get_render_attribute_string( 'post-image-wrapper' ); ?>>
						<div class="upl-image" style="background-image: url('<?php echo $thumbimg; ?>')"></div>
					</div>
					<div class="upl-author">
						<img src="<?php echo get_avatar_url($upl_all_post[$i]->post_author); ?>">
					</div>
					<?php
					if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
						$title_link = wp_trim_words( $upl_all_post[$i]->post_title, 15, NULL);
						if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
							$title_link = '<a href="' . esc_url( get_permalink($upl_all_post[$i]->ID) ) . '" rel="bookmark">' . $title_link . '</a>';
						}
						echo '<div class="upl-title bm_title">' . $title_link . '</div>';
					}
					if (isset($settings['show_metro_excerpt']) && $settings['show_metro_excerpt'] == 'yes' ) {
						$content = $upl_all_post[$i]->post_content;
						if (isset($settings['metro_excerpt_from']) && $settings['metro_excerpt_from'] == 'excerpt') {
							if (!empty($upl_all_post[$i]->post_excerpt)) {
								$content = $upl_all_post[$i]->post_excerpt;
							}
						} else {
							$content = $upl_all_post[$i]->post_content;
						}
						if (isset($settings['show_metro_read_more']) && $settings['show_metro_read_more'] == "yes") {
							if (empty($settings['metro_read_more_text'])){
								$settings['metro_read_more_text'] = 'Read More »';
							}
							$read_more = ' <a href="' . esc_url(get_permalink($upl_all_post[$i]->ID)) . '" rel="bookmark" class="entry-read-more">' . $settings['metro_read_more_text'] . '</a>';
						} else {
							$read_more = "";
						}
						?>
						<div class="upl-excerpt bm_content"> <?php echo wp_trim_words($content, 12, NULL); ?> </div>
					<?php
					}
					if (isset($settings['show_meta_data']) && $settings['show_meta_data'] == 'yes' ) { ?>
						<div class="upl-cat-date bm_meta">
						<?php
							$post_author = get_the_author_meta('first_name', $upl_all_post[$i]->post_author);
							if(empty($post_author)){
								$post_author = get_the_author_meta('display_name', $upl_all_post[$i]->post_author);
							}
							if($settings['date_format'] == 'MDY') {
								$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'ymd') {
								$post_date = get_the_date('Y-m-d', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'mdy') {
								$post_date = get_the_date('m/d/Y', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'dmy') {
								$post_date = get_the_date('d/m/Y', $upl_all_post[$i]->ID).' ';
							} else {
								$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
							}
							if (!empty($post_author) && !empty($post_date)) {
								echo $post_author . ' | ' . $post_date;
							} else {
								echo $post_author . ' ' . $post_date;
							}?>
						</div>
					<?php
					} ?>
				</div>
			<?php $i++;}

			if($total_upl_post > 2) {
				if ( has_post_thumbnail($upl_all_post[$i]->ID) ) {
					$thumbimg = wp_get_attachment_url( get_post_thumbnail_id($upl_all_post[$i]->ID) );
				} else {
					$thumbimg = BM_URL . 'assets/images/placeholder.jpg';
				}
			?>
				<div class="upl-bottom bm_content_box">
					<div <?php echo $this->get_render_attribute_string( 'post-image-wrapper' ); ?>>
						<div class="upl-image" style="background-image: url('<?php echo $thumbimg; ?>')"></div>
					</div>
					<div class="upl-author">
						<img src="<?php echo get_avatar_url($upl_all_post[$i]->post_author); ?>">
					</div>
					<?php
					if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
						$title_link = wp_trim_words( $upl_all_post[$i]->post_title, 15, NULL);
						if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
							$title_link = '<a href="' . esc_url( get_permalink($upl_all_post[$i]->ID) ) . '" rel="bookmark">' . $title_link . '</a>';
						}
						echo '<div class="upl-title bm_title">' . $title_link . '</div>';
					}
					if (isset($settings['show_metro_excerpt']) && $settings['show_metro_excerpt'] == 'yes' ) {
						$content = $upl_all_post[$i]->post_content;

						if (isset($settings['metro_excerpt_from']) && $settings['metro_excerpt_from'] == 'excerpt') {
							if (!empty($upl_all_post[$i]->post_excerpt)) {
								$content = $upl_all_post[$i]->post_excerpt;
							}
						} else {
							$content = $upl_all_post[$i]->post_content;
						}

						if (isset($settings['show_metro_read_more']) && $settings['show_metro_read_more'] == "yes") {
							if (empty($settings['metro_read_more_text'])){
								$settings['metro_read_more_text'] = 'Read More »';
							}
							$read_more = ' <a href="' . esc_url(get_permalink($upl_all_post[$i]->ID)) . '" rel="bookmark" class="entry-read-more">' . $settings['metro_read_more_text'] . '</a>';
						} else {
							$read_more = "";
						}
						?>
						<div class="upl-excerpt bm_content"> <?php echo wp_trim_words($content, 12, NULl); ?> </div>
					<?php
					}
					if (isset($settings['show_meta_data']) && $settings['show_meta_data'] == 'yes' ) { ?>
						<div class="upl-cat-date bm_meta">
						<?php
							$post_author = get_the_author_meta('first_name', $upl_all_post[$i]->post_author);
							if(empty($post_author)){
								$post_author = get_the_author_meta('display_name', $upl_all_post[$i]->post_author);
							}
							if($settings['date_format'] == 'MDY') {
								$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'ymd') {
								$post_date = get_the_date('Y-m-d', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'mdy') {
								$post_date = get_the_date('m/d/Y', $upl_all_post[$i]->ID).' ';
							} else if($settings['date_format'] == 'dmy') {
								$post_date = get_the_date('d/m/Y', $upl_all_post[$i]->ID).' ';
							} else {
								$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
							}
							if (!empty($post_author) && !empty($post_date)) {
								echo $post_author . ' | ' . $post_date;
							} else {
								echo $post_author . ' ' . $post_date;
							}?>
						</div>
					<?php
					} ?>
				</div>
			<?php $i++;
			} ?>
			</div>
		</div>
	</div>

	<div class="upl-second-section">
		<?php
		for($i = 3; $i < $total_upl_post; $i++) {

			if ( has_post_thumbnail($upl_all_post[$i]->ID) ) {
				$thumbimg = wp_get_attachment_url( get_post_thumbnail_id($upl_all_post[$i]->ID) );
			} else {
				$thumbimg = BM_URL . 'assets/images/placeholder.jpg';
			}
			?>
			<div class="upl-second bm_content_box">
				<div <?php echo $this->get_render_attribute_string( 'post-image-wrapper' ); ?>>
					<div class="upl-image" style="background-image: url('<?php echo $thumbimg; ?>')"></div>
				</div>
				<div class="upl-author">
					<img src="<?php echo get_avatar_url($upl_all_post[$i]->post_author); ?>">
				</div>
				<?php
				if (isset($settings['show_title']) && $settings['show_title'] == 'yes') {
					$title_link = wp_trim_words( $upl_all_post[$i]->post_title, 15, NULL);

					if (isset($settings['show_title_link']) && $settings['show_title_link'] == 'yes') {
						$title_link = '<a href="' . esc_url( get_permalink($upl_all_post[$i]->ID) ) . '" rel="bookmark">' . $title_link . '</a>';
					}
					echo '<div class="upl-title bm_title">' . $title_link . '</div>';
				}

				if (isset($settings['show_metro_excerpt']) && $settings['show_metro_excerpt'] == 'yes' ) {
					$content = $upl_all_post[$i]->post_content;
					if (isset($settings['metro_excerpt_from']) && $settings['metro_excerpt_from'] == 'excerpt') {
						if (!empty($upl_all_post[$i]->post_excerpt)) {
							$content = $upl_all_post[$i]->post_excerpt;
						}
					} else {
						$content = $upl_all_post[$i]->post_content;
					}
					if (isset($settings['show_metro_read_more']) && $settings['show_metro_read_more'] == "yes") {
						if (empty($settings['metro_read_more_text'])){
							$settings['metro_read_more_text'] = 'Read More »';
						}
						$read_more = ' <a href="' . esc_url(get_permalink($upl_all_post[$i]->ID)) . '" rel="bookmark" class="entry-read-more">' . $settings['metro_read_more_text'] . '</a>';
					} else {
						$read_more = "";
					}
					?>
					<div class="upl-excerpt bm_content"> <?php echo wp_trim_words($content, 12, NULL); ?> </div>
				<?php
				}
				if (isset($settings['show_meta_data']) && $settings['show_meta_data'] == 'yes' ) { ?>
					<div class="upl-cat-date bm_meta"><?php
						$post_author = get_the_author_meta('first_name', $upl_all_post[$i]->post_author);
						if(empty($post_author)){
							$post_author = get_the_author_meta('display_name', $upl_all_post[$i]->post_author);
						}
						if($settings['date_format'] == 'MDY') {
							$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'ymd') {
							$post_date = get_the_date('Y-m-d', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'mdy') {
							$post_date = get_the_date('m/d/Y', $upl_all_post[$i]->ID).' ';
						} else if($settings['date_format'] == 'dmy') {
							$post_date = get_the_date('d/m/Y', $upl_all_post[$i]->ID).' ';
						} else {
							$post_date = get_the_date('F j, Y', $upl_all_post[$i]->ID).' ';
						}
						if (!empty($post_author) && !empty($post_date)) {
							echo $post_author . ' | ' . $post_date;
						} else {
							echo $post_author . ' ' . $post_date;
						}?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
<?php
wp_reset_postdata();
 ?>