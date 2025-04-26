<?php

/**
 * Info Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
$section_background_color = get_field('section_background_color');
$section_text_color = get_field('section_text_color');
$section_heading = get_field('section_heading');
// Create id attribute allowing for custom "anchor" value.
$id = 'info-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'info-block';
$aligngridName = 'info-block-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
	$aligngridName .= ' ' . $block['aligngridName'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
	$aligngridName .= '-align' . $block['align'];
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  <?php echo $section_background_color; ?> " >
    <div class="info-block-container "> 
		<div class="<?php echo esc_attr($aligngridName); ?> " >
			<div class="info-block-item section-heading"><strong><?php echo $section_heading; ?></strong></div>
			<?php
				if (have_rows('repeater_content_info_block')) {
					$counter = 0; 
				
					while (have_rows('repeater_content_info_block')) { the_row(); 
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					$icon = get_sub_field('icon');
					$page_link = get_sub_field('page_link');
					$background_color = get_sub_field('background_color');
					$counter++;
					?>

					<div class="info-block-item">  
						
						
						
						<?php if($icon){ ?>
							
							<img class="icon" src="<?php 
								$icon_src = wp_get_attachment_image_url($icon['id'], 'thumbnail');
								$icon_srcset = wp_get_attachment_image_srcset($icon['id'], 'thumbnail');
								echo esc_url($icon_src); ?>"
								srcset="<?php echo esc_attr($icon_srcset); ?>"
								sizes="(max-width: 100vw) 480px" alt="<?php echo $icon['alt']; ?> "/>
								
								<?php } ?>
								<?php if($heading){ ?><div class="item-heading"><?php echo $heading ?></div><?php } ?>
							<?php if($content){ ?>
						 <p><?php echo $content ?></p>
						 <?php } ?>
							
						
					</div>
					<?php } ?>
				<?php } ?>	
		</div>
	</div>
</section>
