<?php 
global $post;
$theme_options = ecomall_get_theme_options();
$post_format = get_post_format(); /* Video, Audio, Gallery, Quote */
$post_class = array( 'post-item hentry' );
if( is_sticky() && !is_paged() ){
	$post_class[] = 'sticky';
}
$show_blog_thumbnail = $theme_options['ts_blog_thumbnail'];
$blog_thumb_size = 'ecomall_blog_thumb';

if( $theme_options['ts_blog_columns'] == '1' ){
	$blog_thumb_size = 'full';
}

if( $theme_options['ts_blog_excerpt_max_words'] == -1 && empty($post->post_excerpt) ){
	$theme_options['ts_blog_read_more'] = 0;
}

?>
<article <?php post_class( $post_class ) ?>>
	<?php if( $post_format != 'quote' ): ?>
		<div class="entry-format">

		<?php 
		if( $show_blog_thumbnail ){
		
			if( $post_format == 'gallery' || $post_format === false || $post_format == 'standard' ){
				if( $post_format != 'gallery' ){
				?>
				<a class="thumbnail <?php echo esc_attr($post_format); ?>" href="<?php the_permalink() ?>">
				<?php }else{ ?>
				<div class="thumbnail gallery loading">	
				<?php } ?>
					<figure>
					<?php 
						if( $post_format == 'gallery' ){
							$gallery = get_post_meta($post->ID, 'ts_gallery', true);
							if( $gallery != '' ){
								$gallery_ids = explode(',', $gallery);
							}
							else{
								$gallery_ids = array();
							}
							
							if( has_post_thumbnail() ){
								array_unshift($gallery_ids, get_post_thumbnail_id());
							}
							foreach( $gallery_ids as $gallery_id ){
								echo '<a class="thumbnail gallery" href="'.esc_url(get_the_permalink()).'">';
								echo wp_get_attachment_image( $gallery_id, $blog_thumb_size, 0, array('class' => 'thumbnail-blog') );
								echo '</a>';
							}
							
							if( empty($gallery_ids) ){
								$show_blog_thumbnail = false;
							}
						}
					
						if( $post_format === false || $post_format == 'standard' ){
							if( has_post_thumbnail() ){
								the_post_thumbnail($blog_thumb_size, array('class' => 'thumbnail-blog'));
							}
							else{
								$show_blog_thumbnail = false;
							}
						}
					?>
					</figure>
				<?php 
				if( $post_format != 'gallery' ){
				?>
				</a>
				<?php }else{ ?>
				</div>
				<?php } ?>
			<?php	
			}
			
			if( $post_format == 'video' ){
				$video_url = get_post_meta($post->ID, 'ts_video_url', true);
				if( $video_url ){
					echo do_shortcode('[ts_video src="'.esc_url($video_url).'"]');
				}
				else{
					$show_blog_thumbnail = false;
				}
			}
			
			if( $post_format == 'audio' ){
				$audio_url = get_post_meta($post->ID, 'ts_audio_url', true);
				if( strlen($audio_url) > 4 ){
					$file_format = substr($audio_url, -3, 3);
					if( in_array($file_format, array('mp3', 'ogg', 'wav')) ){
						echo do_shortcode('[audio '.$file_format.'="'.$audio_url.'"]');
					}
					else{
						echo do_shortcode('[ts_soundcloud url="'.$audio_url.'" width="100%" height="166"]');
					}
				}
				else{
					$show_blog_thumbnail = false;
				}
			}
			
			if( !in_array($post_format, array('gallery', 'standard', 'video', 'audio', 'quote', false)) ){
				$show_blog_thumbnail = false;
			}
		}
		?>
		</div>
		
		<div class="entry-content <?php echo !$show_blog_thumbnail?'no-featured-image':'' ?>">
		
			<?php if( $theme_options['ts_blog_categories'] ): ?>
				<div class="entry-meta-top">
					<div class="cats-link">
						<?php echo get_the_category_list(', '); ?>
					</div>
				</div>
			<?php endif; ?>
		
			<?php if( $theme_options['ts_blog_title'] ): ?>
				<!-- Blog Title -->
				<header>
					<h3 class="heading-title entry-title">
						<a class="post-title" href="<?php the_permalink() ; ?>"><?php the_title(); ?></a>
					</h3>
				</header>
			<?php endif; ?>

			<?php if( $theme_options['ts_blog_excerpt'] ): ?>
				<!-- Blog Excerpt -->
				<?php
					$max_words = (int)$theme_options['ts_blog_excerpt_max_words']?(int)$theme_options['ts_blog_excerpt_max_words']:140;
					$strip_tags = $theme_options['ts_blog_excerpt_strip_tags']?true:false;
				?>
				<div class="entry-summary">
					<div class="short-content">
					<?php
						if( $max_words != '-1' ){
							ecomall_the_excerpt_max_words($max_words, $post, $strip_tags, '', true);
						}
						else if( !empty($post->post_excerpt) ){
							the_excerpt();
						}
						else{
							the_content();
						}
					?>
					</div>
					<?php 
					if( $post_format === false || $post_format == 'standard' ){
						wp_link_pages();
					}
					?>
				</div>
			<?php endif; ?>
			
			<?php if( $theme_options['ts_blog_date'] || $theme_options['ts_blog_author'] || $theme_options['ts_blog_comment'] ): ?>
				<div class="entry-meta-bottom">
					<?php if( $theme_options['ts_blog_author'] ):?>
						<span class="vcard author">
							<span><?php esc_html_e('BY', 'ecomall'); ?></span>
							<?php the_author_posts_link(); ?>
						</span>
					<?php endif; ?>
				
					<?php if( $theme_options['ts_blog_date'] ) : ?>
						<span class="date-time"><?php echo get_the_time( get_option('date_format') ); ?></span>
					<?php endif; ?>
					
					<?php if( $theme_options['ts_blog_comment'] ): ?>
					<span class="comment-count">
						<?php
						$comment_count = ecomall_get_post_comment_count();
						echo sprintf( _n('%d comment', '%d comments', $comment_count, 'ecomall'), $comment_count );
						?>
					</span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<?php if( $theme_options['ts_blog_read_more'] ): ?>
				<!-- Blog Read More Button -->
				<div class="readmore">
					<a class="button button-readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'ecomall'); ?></a>
				</div>
			<?php endif; ?>
			
		</div>
	
	<?php else: ?>
		<blockquote>
			<p><?php 
			$quote_content = get_the_excerpt();
			if( !$quote_content ){
				$quote_content = get_the_content();
			}
			echo do_shortcode($quote_content);
			?>
			</p>
			
			<?php if( $theme_options['ts_blog_date'] || $theme_options['ts_blog_author'] ) : ?>
			<div class="entry-meta-middle">
				<!-- Blog Author -->
				<?php if( $theme_options['ts_blog_author'] ):?>
					<span class="vcard author">
						<span><?php esc_html_e('BY', 'ecomall'); ?></span>
						<?php the_author_posts_link(); ?>
					</span>
				<?php endif; ?>
				
				<!-- Blog Date Time -->
				<?php if( $theme_options['ts_blog_date'] ) : ?>
				<span class="date-time">
					<?php echo get_the_time( get_option('date_format') ); ?>
				</span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			
		</blockquote>
	<?php endif; ?>
	
</article>