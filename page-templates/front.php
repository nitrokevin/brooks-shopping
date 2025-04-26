<?php
/*
Template Name: Front
*/
get_header();
$slider = get_field('slider'); ?>
<?php if (($slider == 0)) { ?>
<header class="front-hero" role="banner" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'featured-xlarge' ); ?>, xlarge]" data-type="background">

        <div class="marketing">
    
		<div class="tagline">
			<h1><?php bloginfo( 'description' ); ?></h1>
		</div>
	</div>
</header>
<?php } ?>
<?php if (($slider == 1)) { ?>
<header class="front-hero" role="banner">
    <?php get_template_part('template-parts/form-off-canvas'); ?>
<?php $notifications = get_theme_mod('notification_slider_repeater', []);
 if (($notifications)) { ?>
    <div class="swiper notice-carousel">
        <div class="swiper-wrapper">
            <?php 
            if (!empty($notifications)) {
                foreach ($notifications as $notification) { ?>
                    <div class="swiper-slide">
                        <a href="<?php echo esc_html($notification['slide_link']); ?>">
                        <p><?php echo esc_html($notification['slide_header']); ?></p>
                        <p><strong><?php echo esc_html($notification['slide_text']); ?></strong></p>
                        </a>
                    </div>
                <?php }
            } ?>
        </div>
          <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
    </div>
    <?php } ?>
    <div class="swiper featured-carousel">
        <div class="swiper-wrapper">

            <?php if (have_rows('repeater_featured_slider')) { 
                while (have_rows('repeater_featured_slider')) { 
                    the_row();
                    
                    $media_type = get_sub_field('media_type');
                    $slider_image = get_sub_field('slider_image');
                    $slider_video_teaser = get_sub_field('slider_video_teaser');
                    $slider_video_full = get_sub_field('slider_video_full');
                    $slider_content = get_sub_field('slider_content');

                    if ($media_type == 1 && $slider_image) { 
                        // Image Slider
                        $small_image = $slider_image['sizes']['featured-small'] ?? $slider_image['url'];
                        $medium_image = $slider_image['sizes']['featured-medium'] ?? $slider_image['url'];
                        $large_image = $slider_image['sizes']['featured-large'] ?? $slider_image['url'];
                        $xlarge_image = $slider_image['sizes']['featured-xlarge'] ?? $slider_image['url'];
                        ?>
                        <li class="swiper-slide">
                            <header class="front-hero" role="banner" 
                                data-interchange="[<?php echo esc_url($small_image); ?>, small], 
                                                  [<?php echo esc_url($medium_image); ?>, medium], 
                                                  [<?php echo esc_url($large_image); ?>, large], 
                                                  [<?php echo esc_url($xlarge_image); ?>, xlarge]" 
                                data-type="background">
                                <div class="marketing">
                                    <div class="tagline">
                                        <?php echo $slider_content ?>
                                    </div>
                                </div>
                            </header>
                        </li>
                    <?php } elseif ($media_type == 2 && $slider_video_teaser) { 
                        // Video Slider
                        ?>
                        <li class="swiper-slide">
                            <header class="front-hero video-slide" role="banner">
                                <div class="video-wrapper">
                                    <video class="slider-video" autoplay muted loop playsinline>
                                        <source src="<?php echo esc_url($slider_video_teaser); ?>" type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="marketing">
                                        <div class="tagline">
                                             <?php echo $slider_content ?>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </li>
                    <?php } ?>
                <?php } // End while ?>
            <?php } // End if ?>
        </div>
    </div>
</header>
<?php } ?>


<?php do_action( 'foundationpress_before_content' ); ?>
<?php if ( !empty( get_the_content() ) ) {?> 
<div class="main-container front-page">
	<div class="main-grid">
		<main class="main-content-full-width">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php } ?>
<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();