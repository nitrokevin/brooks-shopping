<div class="swiper smooth-slide-carousel">

	  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

    <div class="swiper-wrapper">
        	<?php if ( (have_rows('repeater_content_carousel') )) { 
            while ((have_rows('repeater_content_carousel')) ){ the_row();
                 $carousel_link = get_sub_field('link');
                $carousel_image = get_sub_field('carousel_image');
                $carousel_background_color = get_sub_field('carousel_background_color');
                ?>
                <div class="swiper-slide <?php echo esc_attr($carousel_background_color); ?>">
                 
				<?php if($carousel_image){ ?>
				<div class="image image-decoration">
				<a href="<?php echo $carousel_link ?>">
				<img src="<?php 
					$image_src = wp_get_attachment_image_url($carousel_image['id'], 'square');
					$image_srcset = wp_get_attachment_image_srcset($carousel_image['id'], 'square');
					echo esc_url($image_src); ?>"
					srcset="<?php echo esc_attr($image_srcset); ?>"
					sizes="(max-width: 100vw) 480px" alt="<?php echo $carousel_image['alt']; ?> "/>
					</a>
				</div>
				
			<?php } ?>
                </div>
            <?php } ?>
        <?php } ?>

	
    </div>
</div>
