<?php
/**
 * The template for displaying search form
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="input-group-field" value="" name="s" id="s" aria-label="Search" placeholder="<?php esc_attr_e('Search Events', 'foundationpress'); ?>">
        <input type="hidden" name="post_type" value="events"> <!-- Restrict search to events -->
        <div class="input-group-button">
            <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'foundationpress'); ?>" class="button theme-color-1">
        </div>
    </div>
</form>
