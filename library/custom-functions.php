<?php
	
	
/** IMAGE FUNCTIONS */

/** ACF Responsive Images */
add_filter( 'acf_the_content', 'wp_make_content_images_responsive' );

	// REMOVE P TAG FROM IMAGES
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee);
    return $pee;
}
add_filter( 'acf_the_content', 'img_unautop', 30 );


	// REMOVE P TAG FROM Buttons
  function a_unautop($aa) {
    $aa = preg_replace('/<p>\\s*?(<a .*?><a.*?><\\/a>|<a.*?>)?\\s*<\\/p>/s', '$1', $aa);
    return $aa;
}
add_filter( 'acf_the_content', 'a_unautop', 30 );

add_post_type_support( 'page', 'excerpt' );
// GUTENBURG
add_theme_support( 'align-wide' );
function custom_block_categories( $categories ) {
  return array_merge(
      $categories,
      [
          [
              'slug'  => 'avidd',
              'title' => __( 'AVIDD Blocks', 'avidd' ),
          ],
      ]
  );
}
add_action( 'block_categories_all', 'custom_block_categories', 10, 2 );

add_filter(
    'acf/pre_save_block',
    function( $attributes ) {
        if ( empty( $attributes['anchor'] ) ) {
            $attributes['anchor'] = 'acf-block-' . uniqid();
        }
        return $attributes;
    }
);

// change buttons in WYSWIG post editor, edit color palette
function my_mce4_options($init) {
  include 'colors.php';

  $default_colours = '"fefefe", "White",
                      "000000", "Black",
                       "'.$primary_color = substr($primary_color, 1).'" ,"primary",
                       "'.$secondary_color = substr($secondary_color, 1).'","secondary",
                       "'.$light_gray = substr($light_gray, 1).'", "dark gray",
                       "'.$medium_gray = substr($medium_gray, 1).'", "dark gray",
                       "'.$dark_gray = substr($dark_gray, 1).'", "dark gray",
                       "'.$theme_color_1 = substr($theme_color_1, 1).'", "theme color 1",
                       "'.$theme_color_2 = substr($theme_color_2, 1).'", "theme color 2",
                       "'.$theme_color_3 = substr($theme_color_3, 1).'", "theme color 3",
                       "'.$theme_color_4 = substr($theme_color_4, 1).'", "theme color 4",
                      ';
  $init['textcolor_map'] = '['.$default_colours.']';
  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

  
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

add_filter( 'tiny_mce_before_init', 'custom_mce_before_init' );
function custom_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'Standard Button main colour',
            'selector' => 'a',
            'classes' => 'button',
        ),
    
      array(
        'title' => 'Standard Button Green',
        'selector' => 'a',
        'classes' => 'button secondary',
    ),
      array(
        'title' => 'Standard Button Blue',
        'selector' => 'a',
        'classes' => 'button theme-color-2',
    ),
        array(
        'title' => 'Standard Button Orange',
        'selector' => 'a',
        'classes' => 'button theme-color-1',
    ),
       array(
        'title' => 'Sub Heading',
        'selector' => 'p',
        'classes' => 'subheader',
    ),



    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

  


/**  PASTE AS TEXT */
add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');
function ag_tinymce_paste_as_text( $init ) {
	$init['paste_as_text'] = true;
	return $init;
}


//Responsive native video embed

function alx_embed_html( $html ) {
  return '<div class="responsive-embed">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'alx_embed_html' );

function oembed_related( $html, $url, $attr, $post_id ) {
  if ( strpos ( $html, 'feature=oembed' ) !== false )
    return str_replace( 'feature=oembed',
      'feature=oembed&amp;rel=0&modestbranding=1&showinfo=0', $html );
  else
    return $html;
}
add_filter('embed_oembed_html', 'oembed_related', 10, 4 );


// Fix a long-standing issue with ACF, where fields sometimes aren't shown
// in previews (ie. from Preview > Open in new tab).
if ( class_exists( 'acf_revisions' ) )
{
	// Reference to ACF's <code>acf_revisions</code> class
	// We need this to target its method, acf_revisions::acf_validate_post_id
	$acf_revs_cls = acf()->revisions;

	// This hook is added the ACF file: includes/revisions.php:36 (in ACF PRO v5.11)
	remove_filter( 'acf/validate_post_id', array( $acf_revs_cls, 'acf_validate_post_id', 10 ) );
}

function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyCf4nsA8K3CiVJXfztkpl2pmAfD5Dpq06E';
  return $api;	
  }

  // Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

// Register the shortcode for opening times
function opening_times_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'title' => esc_html__('Opening Hours', 'avidd'), 
        ),
        $atts,
        'opening_times'
    );
    $opening_times = get_theme_mod('opening_times');
    if ( ! empty( $opening_times ) ) {
        ob_start(); // Start output buffering
        // echo '<div class="opening-hours-title heading">';
        // echo esc_html($atts['title']); 
        // echo '</div>';
        // Output the opening times list
        echo '<ul class="opening-times">';
        foreach ( $opening_times as $time ) {
            $day = isset( $time['day'] ) ? esc_html( $time['day'] ) : '';
            $hours = isset( $time['hours'] ) ? esc_html( $time['hours'] ) : '';
            ?>
            <li>
                <?php echo $day; ?><br />
                <strong><?php echo $hours; ?></strong>
            </li>
            <?php
        }
        echo '</ul>';
        echo '<small>';
        echo '* Individual store opening times may vary';
        echo '</small>';
        return ob_get_clean(); // Return the output buffer content
    }
    return ''; // Return empty if no opening times are set
}
// Register the shortcode [opening_times]
add_shortcode('opening_times', 'opening_times_shortcode');

// Register the shortcode for opening times
function carpark_opening_times_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'title' => esc_html__('Car park Opening Hours', 'avidd'), 
        ),
        $atts,
        'opening_times'
    );
    $opening_times = get_theme_mod('carpark_opening_times');
    if ( ! empty( $opening_times ) ) {
        ob_start(); // Start output buffering
        echo '<div class="opening-hours-title  heading">';
        echo esc_html($atts['title']); 
        echo '</div>';
        // Output the opening times list
        echo '<ul class="opening-times">';
        foreach ( $opening_times as $time ) {
            $day = isset( $time['day'] ) ? esc_html( $time['day'] ) : '';
            $hours = isset( $time['hours'] ) ? esc_html( $time['hours'] ) : '';
            $lastentry = isset( $time['lastentry'] ) ? esc_html( $time['lastentry'] ) : '';
            ?>
            <li>
                <?php echo $day; ?><br />
                <strong><?php echo $hours; ?></strong><br />
                Last Entry: <strong><?php echo $lastentry; ?></strong>
            </li>
            <?php
        }
        echo '</ul>';
        return ob_get_clean(); // Return the output buffer content
    }
    return ''; // Return empty if no opening times are set
}
// Register the shortcode [opening_times]
add_shortcode('carpark_opening_times', 'carpark_opening_times_shortcode');

// Register shortcode for latest event
function latest_event_shortcode($atts) {
    // Parse shortcode attributes
    $atts = shortcode_atts(array(
        'header' => 'Our Latest Event', // Default header text
        'colour' => 'theme-color-2' // Default accent color class
    ), $atts, 'latest_event');

    // Get today's date in the correct format for ACF
    $today = date('Ymd'); // Adjust format based on how your ACF date field is stored (e.g., YYYYMMDD)

    // Query the next upcoming event
    $args = array(
        'post_type'      => 'events',
        'posts_per_page' => 1,
        'meta_key'       => 'event_date', // Make sure this matches your ACF field name
        'orderby'        => 'meta_value',
        'order'          => 'ASC', // Fetches the next event in the future
        'meta_query'     => array(
            array(
                'key'     => 'event_date',
                'compare' => '>=',
                'value'   => $today,
                'type'    => 'NUMERIC' // Ensures proper numerical comparison
            )
        )
    );

    $query = new WP_Query($args);

    // Start output buffering
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // Get event meta data
           $event_date = get_field('event_date'); // Format: Y-m-d (e.g., 2025-02-15)
            $formatted_date = date('jS F', strtotime($event_date)); // e.g., 2nd January
            $event_end_date = get_field('event_end_date'); // Format: Y-m-d (e.g., 2025-02-15)
            $formatted_end_date = date('jS F', strtotime($event_end_date));
            $event_link = get_permalink();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'fp-small');
            $default_event_img = get_theme_mod('event_default_image');
            ?>
            
            <div class="latest-event-container">
                <div class="latest-event">
                    <div class="latest-event-header <?php echo esc_attr($atts['colour']); ?>">
                        <?php echo esc_html($atts['header']); ?>
                    </div>
                    <?php if ($thumbnail_url) { ?>
                        <div class="image-container">
                            <div class="header-image" data-interchange="[<?php echo esc_url($thumbnail_url); ?>, small], [<?php echo esc_url($thumbnail_url); ?>, medium]"></div>
                        </div>
                    <?php } else { ?>
                         <div class="image-container">
                        	<div class="header-image" data-interchange="[<?php echo esc_url($default_event_img); ?>, small], [<?php echo esc_url($default_event_img); ?>, medium]">
		            	</div>
                         </div>
                    <?php  } ?>
                    <div class="latest-event-info">
                        <div class="event-title">
                            <?php the_title(); ?>
                        </div>
                        <?php 
           if ($event_date) {
   
   
    if ($event_end_date) {
       
        $date_output = $formatted_date . ' - ' . $formatted_end_date;
    } else {
        $date_output = $formatted_date;
    }

    echo '' . esc_html($date_output) . '<br />';

}?>

                    </div>
                    <div class="latest-event-link">
                        <a href="<?php echo esc_url($event_link); ?>" class="button expanded <?php echo esc_attr($atts['colour']); ?>">Explore this event</a>
                    </div>
                </div>
            </div>

            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>No upcoming events found.</p>';
    }

    return ob_get_clean();
}
add_shortcode('latest_event', 'latest_event_shortcode');


//Load More Post
function load_more_posts() {
    // Get paged value and increment it
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) + 1 : 2;

    $query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'paged'          => $paged,
    ]);

    if ($query->have_posts()) {
        ob_start(); // Start output buffering
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', get_post_format()); 
        }
        wp_reset_postdata();
        echo ob_get_clean(); // Return buffered content
    } else {
        echo ''; // Return empty if no posts left
    }

    wp_die(); // Always call wp_die() to terminate properly
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');



//Wrap buttons in group

function wrap_acf_buttons_safely($content) {
    // Match all <a> tags that contain 'button' in their class
    $pattern = '/(<a[^>]*class=["\'][^"\']*button[^"\']*["\'][^>]*>.*?<\/a>)/i';

    // Check if there are any buttons in the content
    if (!preg_match($pattern, $content)) {
        return $content; // Return original content if no buttons are found
    }

    // Initialize the $button_group_open variable to track button group state
    $button_group_open = false;

    // Wrap buttons if they are found
    $content = preg_replace_callback($pattern, function ($matches) use (&$button_group_open) {
        if (!$button_group_open) {
            $button_group_open = true;
            return '<div class="button-group button-group-stacked">' . $matches[1];
        } else {
            return $matches[1];
        }
    }, $content);

    // If a button group was opened, close the div tag at the end
    if ($button_group_open) {
        $content .= '</div>';
    }

    return $content;
}


function filter_search_results($query) {
    if ($query->is_search() && !is_admin() && $query->is_main_query()) {
        $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';

        if ($post_type === 'event') {
            // Restrict to events CPT and only show future events
            $query->set('post_type', 'event');

            $meta_query = array(
                array(
                    'key'     => 'event_date', // Change this if your event date field is different
                    'value'   => date('Ymd'), // Compare against today's date (YYYYMMDD format)
                    'type'    => 'NUMERIC',
                    'compare' => '>='
                )
            );

            $query->set('meta_query', $meta_query);
            $query->set('orderby', 'meta_value');
            $query->set('order', 'ASC');

        } elseif ($post_type === 'post') {
            // Restrict to normal blog posts (news)
            $query->set('post_type', 'post');
        }
    }
}
add_action('pre_get_posts', 'filter_search_results');


// Remove the default [...] from excerpts
function themeprefix_remove_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'themeprefix_remove_excerpt_more' );

// Add a "Read More" button only to post excerpts
function themeprefix_excerpt_read_more_link( $output ) {
    global $post;

    if ( get_post_type( $post ) === 'post' ) {
        $output .= ' <a href="' . get_permalink( $post->ID ) . '" class="moretag button" title="Read More">Read More</a>';
    }

    return $output;
}
add_filter( 'the_excerpt', 'themeprefix_excerpt_read_more_link' );

