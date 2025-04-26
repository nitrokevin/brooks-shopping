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
		<main class="stores-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'stores' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
	</div>
</div>
<?php
// Get the post ID (for single page, this is the current post ID)
$post_id = get_the_ID();

// Specify the taxonomy you want to retrieve terms for
$taxonomy = 'store_category'; // Replace with your custom taxonomy name

// Get the terms associated with the post
$terms = get_the_terms($post_id, $taxonomy);

// Initialize $term as null
$term = null;

// Check if terms exist and assign the first term (if multiple terms exist, adjust logic as needed)
if ( $terms && !is_wp_error($terms) ) {
    $term = $terms[0]; // Use the first term in the array
}
?>
<div class="main-container">
    <?php if ( $term ) : ?>
        <div class="main-grid">
            <div class="main-content">
                <p class="subheader">Explore more places to <?php echo esc_html( $term->name ); ?> at The Brooks</p>
                
            </div>
        </div>
    <?php endif; ?>

    <section class="store-grid">
        <?php
        // Custom query to respect custom post ordering
       $args = array(
    'post_type'      => 'stores',
    'tax_query'      => $term ? array(
        array(
            'taxonomy' => $term->taxonomy,
            'field'    => 'slug',
            'terms'    => $term->slug,
        ),
    ) : array(),
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'posts_per_page' => -1, // Show all stores
    'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    'post__not_in'   => array($post_id), // Exclude the current store
);


        $custom_query = new WP_Query( $args );

        if ( $custom_query->have_posts() ) :
            while ( $custom_query->have_posts() ) : $custom_query->the_post();
                get_template_part( 'template-parts/content', 'stores' );
            endwhile;

            // Add pagination
            if ( function_exists( 'foundationpress_pagination' ) ) :
                foundationpress_pagination( array( 'query' => $custom_query ) );
            elseif ( is_paged() ) :
        ?>
                <nav id="post-nav">
                    <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ), $custom_query->max_num_pages ); ?></div>
                    <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
                </nav>
        <?php
            endif;
        else :
          
        endif;

        // Reset post data
        wp_reset_postdata();
        ?>
    </section>
</div>

<?php get_footer();
