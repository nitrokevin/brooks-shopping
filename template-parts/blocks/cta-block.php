<?php

/**
 * Nav Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
$section_background_color = get_field('section_background_color');
$section_text_color = get_field('section_text_color');
$section_heading = get_field('section_heading');
$cta_heading = get_field('cta_heading');
$cta_content = get_field('cta_content');
$button_text = get_field('button_text');
$cta_page_link = get_field('cta_page_link');
$cta_color = get_field('cta_color');
$cta_image = get_field('cta_image');
if($cta_image){
$small = $cta_image['sizes']['small-square'];
$medium = $cta_image['sizes']['square'];

}
// Create id attribute allowing for custom "anchor" value.
$id = 'cta-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-cta-block';
$aligngridName = 'block-cta-block-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
	$aligngridName .= ' ' . $block['aligngridName'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
	$aligngridName .= '-align' . $block['align'];
}


?>
<section id="<?php echo esc_attr( $id ); ?>" class="block-cta-block-container">

        <div class="cta-block">
            <?php if ( $cta_heading ) : ?>
                <div class="cta-header <?php echo esc_attr( $cta_color ); ?>">
                    <?php echo esc_html( $cta_heading ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $cta_image ) : ?>
                <div class="image-container">
                    <div class="header-image" data-interchange="[<?php echo esc_url( $small ); ?>, small], [<?php echo esc_url( $medium ); ?>, medium]"></div>
                </div>
            <?php endif; ?>

            <?php if ( $cta_content ) : ?>
                <div class="cta-content">
                    <?php echo  $cta_content ; ?>
                </div>
            <?php endif; ?>

            <div class="cta-link">
                <a href="<?php echo esc_url( $cta_page_link['url'] ); ?>" class="button expanded <?php echo esc_attr( $cta_color ); ?>">
                   <?php echo  $cta_page_link['title'] ; ?>
                </a>
            </div>
        </div>
   
</section>
