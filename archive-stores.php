<?php
/**
 * The template for displaying archive pages
 *
 * Custom version to group posts by taxonomy terms.
 *
 * @package FoundationPress
 */

get_header();
$term = get_queried_object(); 
?>

<div class="main-container">

    <?php
    // Get all terms from the taxonomy 'store_category'
    $store_categories = get_terms( array(
        'taxonomy'   => 'store_category',
        'hide_empty' => true, // Show only terms with posts
    ) );

    if ( ! empty( $store_categories ) && ! is_wp_error( $store_categories ) ) {
        foreach ( $store_categories as $store_category ) {
            // Retrieve ACF image for the current store category term
            $category_background_image = get_field('category_image', $store_category);

            if (!empty($category_background_image)) {
                $small  = $category_background_image['sizes']['fp-small'] ?? '';
                $medium = $category_background_image['sizes']['fp-medium'] ?? '';
                $large  = $category_background_image['sizes']['fp-large'] ?? '';
                $xlarge = $category_background_image['sizes']['fp-xlarge'] ?? '';
            }
            ?>

            <div class="header-grid <?php echo esc_html($store_category->slug); ?>"
                <?php if (!empty($store_category->slug)) { ?>
                    data-term="<?php echo esc_html($store_category->slug); ?>"
                <?php } ?>
                <?php if (!empty($category_background_image)) { ?>
                    data-interchange="[<?php echo esc_url($small); ?>, small], 
                                     [<?php echo esc_url($medium); ?>, medium], 
                                     [<?php echo esc_url($large); ?>, large], 
                                     [<?php echo esc_url($xlarge); ?>, xlarge]"
                <?php } ?>>
                
                <div class="header-content">
                    <h1><?php echo esc_html( $store_category->name ); ?></h1>
                    <p class="subheader">At the Brooks</p>
                    <p><?php echo esc_html( $store_category->description ); ?></p>
                </div>
            </div>

            <?php
            // Query posts for the current term
            $args = array(
                'post_type'      => 'stores', // Adjust if your posts are of a custom post type
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'store_category',
                        'field'    => 'slug',
                        'terms'    => $store_category->slug,
                    ),
                ),
                'posts_per_page' => -1, // Show all posts for the term
            );
            $term_query = new WP_Query( $args );

            if ( $term_query->have_posts() ) :
                echo '<section class="store-grid">';
                while ( $term_query->have_posts() ) :
                    $term_query->the_post();
                    get_template_part( 'template-parts/content', 'stores' );
                endwhile;
                echo '</section>';
                wp_reset_postdata();
            else :
                echo '<p>' . esc_html__( 'No posts available under this category.', 'foundationpress' ) . '</p>';
            endif;
        }
    } else {
        echo '<p>' . esc_html__( 'No categories found.', 'foundationpress' ) . '</p>';
    }
    ?>

</div>

<?php get_footer(); ?>
