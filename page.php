<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php if ( !empty( get_the_content() ) ) {?> 
<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width ">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php } ?>

<?php
get_footer();
