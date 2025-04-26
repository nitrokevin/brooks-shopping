<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$store_logo    = get_field('store_logo');
$store_phone   = get_field('store_phone');
$store_website = get_field('store_website');
$store_opening = get_field('store_opening');
$store_instagram = get_field('store_instagram');
$store_facebook = get_field('store_facebook');
$store_x = get_field('store_x');
$store_tiktok = get_field('store_tiktok');


$is_single_view = is_single() && in_the_loop();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ($is_single_view) : ?>
        <div class="header-image-wrap">
            <img 
                src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'fp-medium')); ?>" 
                srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'fp-medium')); ?>" 
                sizes="(max-width: 100vw) 50vw" 
                alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_title', true)); ?>" 
            />
        </div>
    <?php endif; ?>

    <div class="content">
        <header>
            <?php if ($store_logo && wp_attachment_is_image($store_logo)) {
    $image_srcset = wp_get_attachment_image_srcset($store_logo, 'square');
    $image_url = wp_get_attachment_image_url($store_logo, 'square');
    $store_logo_alt = get_post_meta($store_logo, '_wp_attachment_image_alt', true);

   if ($store_website) {
   echo '<a href="' . esc_url(get_permalink()) . '">';
}
echo wp_get_attachment_image($store_logo, 'square', false, [
    'srcset' => esc_attr($image_srcset),
    'sizes'  => '(max-width: 767px) 450px, (min-width: 768px) 550px',
    'alt'    => esc_attr($store_logo_alt),
    'class'  => 'store-logo'
]);
if ($store_website) {
    echo '</a>';
}

}
 ?>
        </header>

        <div class="entry-content">
            <?php if ($is_single_view) : ?>
                <div class="store-details">
                    <?php if ($store_phone) : ?>
                        <p><strong>T:</strong> <?php echo esc_html($store_phone); ?></p>
                    <?php endif; ?>

                    <?php if ($store_website) : ?>
                        <span class="website-social">
                       
                        <ul class="social-links menu">
                            <li> <a href="<?php echo esc_url($store_website); ?>" class="button" target="_blank">Visit the <?php the_title(); ?> Website</a></li>
			            	<?php if ($store_facebook) : ?>
				            	<li><a href="<?php echo esc_url($store_facebook); ?> " rel="noreferrer" class="icon" target="_blank" aria-label="Facebook">
							    	<span class="fa-stack fa-2x">
				                	<i class="fas fa-circle fa-stack-2x"></i>
				                	<i class="fab fa-facebook-f  fa-stack-1x "></i>
                                      </span>
                                  </a></li>
			            	<?php endif; ?>
                            <?php if ($store_instagram) : ?>
				            	<li><a href="<?php echo esc_url($store_instagram); ?> " rel="noreferrer" class="icon" target="_blank" aria-label="Instagram">
							    	<span class="fa-stack fa-2x">
				                	<i class="fas fa-circle fa-stack-2x"></i>
				                	<i class="fab fa-instagram  fa-stack-1x "></i>
                                      </span>
                                  </a></li>
			            	<?php endif; ?>
                            <?php if ($store_x) : ?>
				            	<li><a href="<?php echo esc_url($store_x); ?> " rel="noreferrer" class="icon" target="_blank" aria-label="X">
							    	<span class="fa-stack fa-2x">
				                	<i class="fas fa-circle fa-stack-2x"></i>
				                	<i class="fab fa-x-twitter  fa-stack-1x "></i>
                                      </span>
                                  </a></li>
			            	<?php endif; ?>
                             <?php if ($store_tiktok) : ?>
				            	<li><a href="<?php echo esc_url($store_tiktok); ?> " rel="noreferrer" class="icon" target="_blank" aria-label="TikTok">
							    	<span class="fa-stack fa-2x">
				                	<i class="fas fa-circle fa-stack-2x"></i>
				                	<i class="fab fa-tiktok  fa-stack-1x "></i>
                                      </span>
                                  </a></li>
			            	<?php endif; ?>
                        </ul>
                        </span>
                        <hr>
                    <?php endif; ?>

                    <?php if ($store_opening) : ?>
                        <strong>Opening Hours</strong>
                        <p><?php echo nl2br(esc_html($store_opening)); ?></p>
                        <hr>
                    <?php endif; ?>
                </div>

                <div class="store-content">
                    <?php echo wp_kses_post(get_the_content()); ?>
                    <hr>
                </div>
            <?php else : ?>
                <div class="store-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="store-link">
                    <a href="<?php the_permalink(); ?>" class="button expanded">Explore <?php the_title(); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</article>
