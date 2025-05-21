<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$link   = get_field('link');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		if ( has_post_thumbnail( $post->ID )){
		if ( is_single() ) {
			 ?>
					<div class="header-image-wrap">
					<img 
						src="<?php 
							$image_src = get_the_post_thumbnail_url(null, 'fp-small'); 
							echo esc_url($image_src); ?>" 
						srcset="<?php 
							$image_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'fp-small'); 
							echo esc_attr($image_srcset); ?>" 
						sizes="(max-width: 100vw) 50vw" 
						alt="<?php 
							$thumbnail_id = get_post_thumbnail_id();
							$image_title = get_post_meta($thumbnail_id, '_wp_attachment_image_title', true);
							echo esc_attr($image_title); ?>" 
					/>
				</div>
		<?php } else { ?>
			<div class="image-container">
				<div class="header-image" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-small'); ?>, medium]">
				</div>
			</div>
			<?php
		}
	}
	?>
		

	<div class="content">
	<div class="entry-content">
		<?php 	if ( is_single() ) { 
			echo '<div class="entry-title-container">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</div>';
			foundationpress_entry_meta(); 
			echo '<hr>';
			echo '<br />';
			if ( ! empty( $link ) ) {
				echo '<a href="' . esc_url( $link ) . '" class="button">'
					. esc_html( 'Discover ' . get_the_title( url_to_postid( $link ) ) )
					. '</a>';
			}
			the_content();
			
			
		} else { the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			foundationpress_entry_meta(); 
			the_excerpt();
		} ?>
		
	</div>
	</div>
</article>
