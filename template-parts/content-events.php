<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


$event_date   = get_field('event_date');
$event_end_date   = get_field('event_end_date');
$event_time   = get_field('start_time');
$event_location   = get_field('event_location');
$event_website = get_field('event_website');
$event_cost = get_field('event_cost');

$is_single_view = is_single() && in_the_loop();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 	if ( has_post_thumbnail( $post->ID )){
    if ($is_single_view) : ?>
        <div class="header-image-wrap">
            <img 
                src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'fp-small')); ?>" 
                srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'fp-small')); ?>" 
                sizes="(max-width: 100vw) 50vw" 
                alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_title', true)); ?>" 
            />
        </div>
    <?php endif;
    } ?>

    <div class="content event">
	<div class="entry-content">
		<?php 	if ( is_single() ) { 
			echo '<div class="entry-title-container">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</div>';
			the_content();
		} else { 

if ($event_date) {
    $start_timestamp = strtotime($event_date);
    $start_day = date('jS', $start_timestamp);       // e.g., 2nd
    $start_month = date('F', $start_timestamp);      // e.g., January

    if ($event_end_date) {
        $end_timestamp = strtotime($event_end_date);
        $end_day = date('jS', $end_timestamp);        // e.g., 4th
        $end_month = date('F', $end_timestamp);       // e.g., January

        if ($start_month === $end_month) {
            // Same month: show once
            $date_output = $start_day . ' - ' . $end_day . ' ' . $start_month;
        } else {
            // Different months: show both
            $date_output = $start_day . ' ' . $start_month . ' - ' . $end_day . ' ' . $end_month;
        }
    } else {
        // Only start date
        $date_output = $start_day . ' ' . $start_month;
    }

    echo '<a href="' . esc_url(get_permalink()) . '">';
    echo '<div class="event-date">' . esc_html($date_output) . '</div>';
    echo '</a>';
}
// Event title and time
the_title(
    '<div class="event-title"><p>' . esc_html($event_time) . '</p><p class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">',
    '</a></p></div>'
);


		} ?>
		 <div class="event-link">
             <a href="<?php the_permalink(); ?>" class="button theme-color-2 expanded">Explore this event</a>
            </div>
	</div>
	</div>
</article>
