<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
  // Retrieve ACF field values
    $event_date = get_field('event_date'); // Format: Y-m-d (e.g., 2025-02-15)
    $formatted_date = date('jS F', strtotime($event_date)); // e.g., 2nd January
    $event_end_date = get_field('event_end_date'); // Format: Y-m-d (e.g., 2025-02-15)
    $formatted_end_date = date('jS F', strtotime($event_end_date));
    $start_time = get_field('start_time'); // Format: H:i (e.g., 12:00)
    $end_time = get_field('end_time'); // Format: H:i (e.g., 13:00)
    $location = get_field('location');
    $event_title = get_the_title(); // Event title
    $event_details = get_field('event_cost'); // Optional: Event cost or other details

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
$default_event_img = get_theme_mod('event_default_image');
if ( has_post_thumbnail( $post->ID ) ) {
	if ( is_single() ) {
?>
		<div class="header-image-wrap">
			<img 
				src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'fp-small')); ?>" 
				srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_post_thumbnail_id(), 'fp-small')); ?>" 
				sizes="(max-width: 100vw) 50vw" 
				alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_title', true)); ?>" 
			/>
		</div>
<?php
	} else {
?>
		<div class="image-container">
			<div class="header-image" data-interchange="[<?php the_post_thumbnail_url('fp-small'); ?>, small], [<?php the_post_thumbnail_url('fp-small'); ?>, medium]">
			</div>
		</div>
<?php
	}
} elseif ( $default_event_img ) {
	// Fallback image
	if ( is_single() ) {
?>
		<div class="header-image-wrap">
			<img 
				src="<?php echo esc_url($default_event_img); ?>" 
				sizes="(max-width: 100vw) 50vw" 
				alt="Default Event Image"
			/>
		</div>
<?php
	} else {
?>
		<div class="image-container">
			<div class="header-image" data-interchange="[<?php echo esc_url($default_event_img); ?>, small], [<?php echo esc_url($default_event_img); ?>, medium]">
			</div>
		</div>
<?php
	}
}
?>

		

	<div class="content">
	<div class="entry-content">
		<?php 	if ( is_single() ) { 
			echo '<div class="entry-title-container">';
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '</div>';
           if (!empty($formatted_date)) {
   
   
    if ($event_end_date) {
       
        $date_output = $formatted_date . ' - ' . $formatted_end_date;
    } else {
        $date_output = $formatted_date;
    }

    echo '<strong>Date:</strong> ' . esc_html($date_output) . '<br />';

}
if (!empty($start_time) && !empty($end_time)) {
    echo '<strong>Time:</strong> ' . $start_time . ' - ' . $end_time . '<br />';
} elseif (!empty($start_time)) {
    echo '<strong>Time:</strong> ' . $start_time . '<br />';
} elseif (!empty($end_time)) {
    echo '<strong>Time:</strong> ' . $end_time . '<br />';
}
if (!empty($location)) {
    echo '<strong>Location:</strong> ' . $location . '<br />';
}
if (!empty($event_details)) {
    echo '<strong>Details:</strong> ' . $event_details . '<br />';
}

			echo '<hr>';
			the_content(); ?>
<!-- Single Add to Calendar Button -->
<button class="button theme-color-2" onclick="openCalendarOptions()">Add to Calendar</button>

<!-- Calendar Options Dropdown -->
<div id="calendar-options" style="display: none;">
    <?php
  
    // Convert 12-hour time format to 24-hour format if needed
    function convert_to_24hr($time) {
        $formatted_time = date("H:i", strtotime($time)); // Converts to 24-hour format
        return $formatted_time;
    }

    // Convert start and end times to 24-hour format
    $start_time_24 = convert_to_24hr($start_time);
    $end_time_24 = convert_to_24hr($end_time);

    // Format start and end datetime in ISO 8601 format
    $start_datetime = $event_date . 'T' . str_replace(':', '', $start_time_24) . '00Z'; // Example: "2025-02-15T120000Z"
    $end_datetime = $event_date . 'T' . str_replace(':', '', $end_time_24) . '00Z'; // Example: "2025-02-15T130000Z"

 // Google Calendar link (correct format for the year, month, day, time)
    // Format start and end datetimes without hyphens for Google Calendar
    $google_start_datetime = str_replace('-', '', $event_date) . 'T' . str_replace(':', '', $start_time_24) . '00Z'; 
    $google_end_datetime = str_replace('-', '', $event_date) . 'T' . str_replace(':', '', $end_time_24) . '00Z'; 

    $google_calendar_url = "https://www.google.com/calendar/render?action=TEMPLATE&text=" . urlencode($event_title) .
     "&dates=" . urlencode($google_start_datetime) . "/" . urlencode($google_end_datetime) . 
     "&details=" . urlencode($event_details) . "&location=" . urlencode($location) . "&ctz=Europe/London";


 // Format start and end datetime for Outlook (with hyphens and colons in time)
    $outlook_start_datetime = $event_date . 'T' . $start_time_24 . ':00'; // Keep hyphens and format time with colon
    $outlook_end_datetime = $event_date . 'T' . $end_time_24 . ':00'; // Keep hyphens and format time with colon

    $outlook_calendar_url = "https://outlook.live.com/owa/?path=/calendar/action/compose&subject=" . urlencode($event_title) .
        "&startdt=" . urlencode($outlook_start_datetime) . "&enddt=" . urlencode($outlook_end_datetime) . 
        "&body=" . urlencode($event_details) . "&location=" . urlencode($location);

 // iCal link
$start_datetime_ical = str_replace('-', '', $event_date) . 'T' . str_replace(':', '', $start_time_24) . '00Z'; // "20250401T100000Z"
$end_datetime_ical = str_replace('-', '', $event_date) . 'T' . str_replace(':', '', $end_time_24) . '00Z'; // "20250401T130000Z"

// Build iCal content with raw text (spaces intact)
$ical_content = "BEGIN:VCALENDAR\r\n" .
    "VERSION:2.0\r\n" .
    "BEGIN:VEVENT\r\n" .
    "UID:" . uniqid() . "\r\n" .
    "SUMMARY:" . $event_title . "\r\n" . // Raw title with spaces
    "DTSTART:" . $start_datetime_ical . "\r\n" .
    "DTEND:" . $end_datetime_ical . "\r\n" .
    "DESCRIPTION:" . $event_details . "\r\n" . // Raw details
    "LOCATION:" . $location . "\r\n" . // Raw location
    "END:VEVENT\r\n" .
    "END:VCALENDAR\r\n";

// Use rawurlencode to encode the iCal content for the data URI (uses %20 instead of +)
$ical_url = "data:text/calendar;charset=utf8," . rawurlencode($ical_content);
?>

<!-- Google Calendar Link -->
<a class="button theme-color-2" href="<?php echo $google_calendar_url; ?>" target="_blank">Google Calendar</a><br>

<!-- Outlook Calendar Link -->
<a class="button theme-color-2" href="<?php echo $outlook_calendar_url; ?>" target="_blank">Outlook Calendar</a><br>

<!-- iCal Link -->
<a class="button theme-color-2" href="<?php echo $ical_url; ?>" target="_blank">iCal</a>
</div>

<script>
    // Toggle the display of the calendar options dropdown
    function openCalendarOptions() {
        var options = document.getElementById('calendar-options');
        options.style.display = options.style.display === 'block' ? 'none' : 'block';
    }
</script>


			<br /><hr>
			
			
		<?php } else { the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			foundationpress_entry_meta(); 
			the_excerpt();
		} ?>
		
	</div>
	</div>
</article>
