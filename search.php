<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
	<div class="main-grid">
		<main id="main" class="main-content-full-width" role="main" tabindex="-1">
			    <div class="header-grid dark-gray">
        <header class="header-content">
            <h1 class="entry-title">Search Results</h1>
           
           
        </header>
    </div>
			<div id="search-results">
				<?php if ( have_posts() ) : ?>
					
				 
					<?php rewind_posts(); // Reset the loop to start from the beginning ?>
				
						<?php if ((get_post_type() === 'events') ): 
						 echo'<section class="events-grid">';
						 	while ( have_posts() ) : the_post();
							  get_template_part('template-parts/content', 'events');
							 endwhile; 
							   echo'</section>';
						 endif; ?>

						 <?php if ((get_post_type() === 'post') ): 
						 echo'<section class="main-content-full-width index">';
						 	while ( have_posts() ) : the_post();
							  get_template_part( 'template-parts/content', get_post_format() );
							 endwhile; 
							   echo'</section>';
						 endif; ?>
				
				

	<?php endif; ?>



				<?php
				if ( function_exists( 'foundationpress_pagination' ) ) :
					foundationpress_pagination();
				elseif ( is_paged() ) :
					?>
					<nav id="post-nav" aria-label="Post navigation">
						<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
						<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
					</nav>
				<?php endif; ?>

			</div>

		</main>

	</div>
</div>
<?php
get_footer();
