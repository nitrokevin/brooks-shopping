<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="header-grid dark-gray">
		<header class="header-content">
			<h1 class="entry-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
			<p class="subheader">At the Brooks</p>
			<div class="header-functions-grid">
			<span class="header-search">
				<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="input-group-field" value="" name="s" id="s" aria-label="Search" placeholder="<?php esc_attr_e('Search News', 'foundationpress'); ?>">
        <input type="hidden" name="post_type" value="post"> <!-- Restrict search to news (regular posts) -->
        <div class="input-group-button">
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'foundationpress'); ?>" class="button">
        </div>
    </div>
</form>
			</span>
           
            </div>
		</header>
	</div>
	<div class="main-grid">
		<main class="main-content-full-width index" id="post-container">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<hr>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			 
			<?php endif; // End have_posts() check. ?>


		</main>
		<button id="load-more" class="button primary" data-paged="1">Load More News</button>
	</div>
</div>
<?php get_footer();
