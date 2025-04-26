<?php
/**
 * Template for displaying taxonomy archive pages
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

// Get the current taxonomy term
$term = get_queried_object(); 
$category_background_image = get_field('category_image', $term);

if ($category_background_image) {;
$small = $category_background_image['sizes']['fp-small'];
$medium = $category_background_image['sizes']['fp-medium'];
$large = $category_background_image['sizes']['fp-large'];
$xlarge = $category_background_image['sizes']['fp-xlarge'];
};?>

<div class="main-container">
    
    <?php if ( $term ) : ?>
        <div class="header-grid <?php echo esc_html( $term->slug ); ?>"  <?php if ($category_background_image) { ?> data-interchange="[<?php echo $small; ?>, small], [<?php echo $medium;?>, medium], [<?php echo $large;?>, large], [<?php echo $xlarge;?>, xlarge]"<?php } ?>>
            <div class="header-content">
                <h1><?php echo esc_html( $term->name ); ?></h1>
                <p class="subheader">At the Brooks</p>
                <p><?php echo esc_html( $term->description ); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <section class="store-grid">
        <?php
        // Custom query to respect custom post ordering
        $args = array(
            'post_type' => 'stores', // Adjust to the relevant post type
            'tax_query' => array(
                array(
                    'taxonomy' => $term->taxonomy,
                    'field'    => 'slug',
                    'terms'    => $term->slug,
                ),
            ),
            'orderby' => 'menu_order', // Adjust to your plugin's ordering key if needed
            'order'   => 'ASC', // Change to 'DESC' if you want descending order
            'posts_per_page' => get_option( 'posts_per_page' ), // Use the same pagination settings
            'paged' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
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
            get_template_part( 'template-parts/content', 'none' );
        endif;

        // Reset post data
        wp_reset_postdata();
        ?>
    </section>
</div>

<?php get_footer(); ?>
