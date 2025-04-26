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
// Create id attribute allowing for custom "anchor" value.
$id = 'nav-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-nav-block';
$aligngridName = 'block-nav-block-grid';
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
    <div class="block-nav-block-container "> 
		<div class="<?php echo esc_attr($aligngridName); ?> " >
				<div class="nav-blocks cards-container">
				<?php
				if (have_rows('repeater_content_nav_block')) {
					$counter = 0; 
				
					while (have_rows('repeater_content_nav_block')) { the_row(); 
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');
					$button_text = get_sub_field('button_text');
					$icon = get_sub_field('icon');
					$page_link = get_sub_field('page_link');
					$background_color = get_sub_field('background_color');
					$background_image = get_sub_field('background_image');
					if($background_image){
					$small = $background_image['sizes']['small-square'];
					$medium = $background_image['sizes']['square'];
				
					}
					$counter++;
					?>

					<div class="nav-block <?php echo $background_color ?>">  
						
						 <div class="card-section">
							<?php if($heading){ ?><span class="heading"><?php echo $heading ?> <?php if ($icon && isset($icon['url'])): ?>
                        <span class="icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($heading); ?>">
                        </span>
                    <?php endif; ?></span><?php } ?>
						
							<?php if($content){ ?>
						<p><?php echo $content ?></p>
						 <?php } ?>
						 </div>
							<div class="card-section align-self-bottom">
								<?php if($page_link){ ?>
						<a href="<?php echo $page_link['url'] ?>" class=""><i class="fa-regular fa-arrow-up-right"></i></a>
						<?php } ?>
							</div>
						
					</div>
					<?php } ?>
				<?php } ?>	
				
			</div>
		
		</div>
	</div>
</section>
