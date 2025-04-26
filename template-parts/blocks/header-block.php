<?php
/**
 * Heading Block Template.
 *
 * @param array       $block    The block settings and attributes.
 * @param string      $content  The block inner HTML (empty).
 * @param bool        $is_preview True during AJAX preview.
 * @param int|string  $post_id  The post ID this block is saved to.
 */

// Get custom fields
$section_background_color = get_field('section_background_color');
$section_text_color = get_field('section_text_color');
$section_heading = get_field('section_heading');

// Create id attribute allowing for custom "anchor" value.
$id = !empty($block['anchor']) ? $block['anchor'] : 'header-block-' . $block['id'];

// Create class attributes
$className = 'block-header-block' . (!empty($block['className']) ? ' ' . $block['className'] : '');
$aligngridName = 'block-header-block-grid' . (!empty($block['align']) ? '-align' . $block['align'] : '');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo esc_attr($section_background_color); ?>">
    <div class="block-header-block-container">
        <div class="<?php echo esc_attr($aligngridName); ?>">
            <div class="header-blocks cards-container">
                <?php if (have_rows('repeater_content_header_block')): ?>
                    <?php $counter = 0; ?>
                    <?php while (have_rows('repeater_content_header_block')): the_row(); ?>
                        <?php 
                        $counter++;
                        $heading = get_sub_field('heading');
                        $sub_heading = get_sub_field('sub_heading');
                        $content = get_sub_field('content');
                        $icon = get_sub_field('icon');
                        $enable_tabs = get_sub_field('enable_tabs');
                        $page_link = get_sub_field('page_link');
                        $background_color = get_sub_field('background_color');
                        $background_image = get_sub_field('background_image');
                        $small = $background_image['sizes']['small-square'] ?? '';
                        $medium = $background_image['sizes']['square'] ?? '';
                        
                        // Get the number of blocks
                        $num_blocks = count(get_field('repeater_content_header_block'));

                        // Determine the layout class based on the number of blocks
                        $layout_class = 'layout-' . $num_blocks;
                        ?>
                        
                        <div class="header-block <?php echo esc_attr($background_color) . ' ' . esc_attr($layout_class); ?>">  
                            <div class="card-section">
                                  <?php if ($icon): ?>
                                    <div class="icon-container">
                                    <img class="icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['title']); ?>">
                                    </div>
                                    <?php endif; ?>
                                <?php if ($heading): ?>
                                    <?php if ($counter === 1): ?>
                                        <h1><?php echo esc_html($heading); ?></h1>
                                    <?php else: ?>
                                        <span class="heading"><?php echo esc_html($heading); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ($sub_heading): ?>
                                        <p class="subheader"><?php echo esc_html($sub_heading); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if ($enable_tabs): ?>
                                    <?php get_template_part('template-parts/content', 'tab'); ?>
                                <?php endif; ?>
                              
                                <?php if ($content): ?>
                                    <?php echo $content; ?>
                                <?php endif; ?>
                            </div>

                            <?php if ($page_link): ?>
                                <div class="card-section align-self-bottom">
                                    <a href="<?php echo esc_url($page_link['url']); ?>">
                                        <i class="fa-regular fa-arrow-up-right"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

