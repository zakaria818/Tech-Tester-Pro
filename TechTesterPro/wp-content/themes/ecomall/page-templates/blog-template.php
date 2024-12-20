<?php
/**
 *	Template Name: Blog Template
 */	
get_header();

global $post;
setup_postdata($post);

$page_options = ecomall_get_page_options();

$blog_columns = ecomall_get_theme_options('ts_blog_columns');
$extra_class  = 'columns-' . $blog_columns;

$default_posts_per_page = get_option( 'posts_per_page' );

$page_column_class = ecomall_page_layout_columns_class( apply_filters('ecomall_blog_page_layout', $page_options['ts_page_layout']) );

$show_breadcrumb = ( !is_home() && !is_front_page() && $page_options['ts_show_breadcrumb'] );
$show_page_title = ( !is_home() && !is_front_page() && $page_options['ts_show_page_title'] );

if( $show_breadcrumb || $show_page_title ){
	$extra_class .= ' show_breadcrumb_'.ecomall_get_theme_options('ts_breadcrumb_layout');
}

ecomall_breadcrumbs_title($show_breadcrumb, $show_page_title, get_the_title());
	
?>
<div class="page-template blog-template page-container container-post <?php echo esc_attr($extra_class) ?> <?php echo esc_attr($page_column_class['main_class']); ?>">
	<!-- Page slider -->
	<?php if( $page_options['ts_page_slider'] && $page_options['ts_page_slider_position'] == 'before_main_content' ): ?>
	<div class="top-slideshow">
		<div class="top-slideshow-wrapper">
			<?php ecomall_show_page_slider(); ?>
		</div>
	</div>
	<?php endif; ?>

	<!-- Left Sidebar -->
	<?php if( $page_column_class['left_sidebar'] ): ?>
		<div id="left-sidebar" class="ts-sidebar">
			<aside>
			<?php if( is_active_sidebar($page_options['ts_left_sidebar']) ): ?>
				<?php dynamic_sidebar( $page_options['ts_left_sidebar'] ); ?>
			<?php endif; ?>
			</aside>
		</div>
	<?php endif; ?>			
	
	<div id="main-content">	
		<div id="primary" class="site-content">
			
			<?php if( get_the_content() ): ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
			</article>
			<?php endif; ?>
			
			<?php
				$paged = 1;
				if( is_paged() ){
					$paged = get_query_var('page');
					if( !$paged ){
						$paged = get_query_var('paged');
					}
				}
				
				$args = array(
						'post_type' 		=> 'post'
						,'paged'			=> $paged
					);
					
				$args = apply_filters('ecomall_blog_template_query_args', $args);
				
				$posts = new WP_Query( $args );
				if( $posts->have_posts() ):
					echo '<div class="list-posts">';
					while( $posts->have_posts() ) : $posts->the_post();
						
						get_template_part( 'content', get_post_format() ); 

					endwhile;
					echo '</div>';
					
					wp_reset_postdata();
				else:
					echo '<div class="alert alert-error">'.esc_html__('Sorry. There are no posts to display', 'ecomall').'</div>';
				endif;
				
				ecomall_pagination($posts);
			?>

		</div>
	</div>
	
	
	<!-- Right Sidebar -->
	<?php if( $page_column_class['right_sidebar'] ): ?>
		<div id="right-sidebar" class="ts-sidebar">
			<aside>
			<?php if( is_active_sidebar($page_options['ts_right_sidebar']) ): ?>
				<?php dynamic_sidebar( $page_options['ts_right_sidebar'] ); ?>
			<?php endif; ?>
			</aside>
		</div>
	<?php endif; ?>
		
</div><!-- #container -->
<?php get_footer(); ?>