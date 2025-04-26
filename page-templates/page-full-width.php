<?php
/*
Template Name: Alternative Style
*/
get_header(); ?>

<?php if ( !empty( get_the_content() ) ) {?> 
<div class="main-container">
	<div class="header-grid page-alt dark-gray">
				<header class="header-content">
					<div class="header-content-grid">
					<div class="header-content-title">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p class="subheader">At the Brooks</p>
					</div>
					<div class="header-content-image">
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
					</div>
					</div>
				</header>
			</div>
	<div class="main-grid">
		<main class="main-content-full-width ">
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</main>
	</div>
</div>
<?php } ?>

<?php
get_footer();
