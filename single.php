<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main class="main-content-full-width post">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<div class="main-grid">
		<div class="main-content">
			<a href="/news" class="button large news-button">Back to News</a><br />
						 <?php the_post_navigation( array(
  'prev_text' => __( '<span class="nav-next-prev-text button">Previous News</span>' ),
  'next_text' => __( '<span class="nav-next-prev-text button">Next News</span>'  ),
) ); ?></div>
</div>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer();
