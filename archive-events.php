<?php
/**
 * The template for displaying archive pages
 *
 * Custom version to group future events by month.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
    <div class="header-grid dark-gray">
        <header class="header-content">
            <h1 class="entry-title"><?php echo post_type_archive_title(); ?></h1>
            <p class="subheader">At the Brooks</p>
            <div class="header-functions-grid">
               <span class="header-search">
                <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="input-group-field" value="" name="s" id="s" aria-label="Search" placeholder="<?php esc_attr_e('Search Events', 'foundationpress'); ?>">
        <input type="hidden" name="post_type" value="events"> <!-- Restrict search to events -->
        <div class="input-group-button">
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'foundationpress'); ?>" class="button theme-color-2">
        </div>
    </div>
</form>
               </span>
                <span class="header-cta"><a href="/contact#tab2-10" class="button">Talk to us about hosting an event</a></span>
            </div>
        </header>
    </div>

    <?php
    // Get today's date
    $today = date('Y-m-d');

    // Query future events ordered by event date
    $args = array(
        'post_type'      => 'events', // Adjust for your custom post type
        'posts_per_page' => -1, // Show all future events
        'meta_key'       => 'event_date', // Custom field storing event date
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'meta_type'      => 'DATE',
        'meta_query'     => array(
            array(
                'key'     => 'event_date',
                'value'   => $today,
                'compare' => '>=', // Only events on or after today
                'type'    => 'DATE'
            )
        )
    );
    $events_query = new WP_Query($args);

    if ($events_query->have_posts()) :
        $events_by_month = [];

        // Group events by month
        while ($events_query->have_posts()) :
            $events_query->the_post();
            $event_date = get_field('event_date'); // Ensure this field exists
            if (!$event_date) continue;

            $event_timestamp = strtotime($event_date);
            $month_key = date('F Y', $event_timestamp); // Format: "March 2025"

            $events_by_month[$month_key][] = get_the_ID();
        endwhile;

        wp_reset_postdata();

        // Output events grouped by month
        foreach ($events_by_month as $month => $event_ids) :
           
            echo '<section class="events-grid">';
            foreach ($event_ids as $event_id) :
                $post = get_post($event_id);
                setup_postdata($post);
                get_template_part('template-parts/content', 'events');
                wp_reset_postdata();
            endforeach;
            echo '</section>';
        endforeach;
    else :
       
    endif;
    ?>

</div>

<?php get_footer(); ?>
