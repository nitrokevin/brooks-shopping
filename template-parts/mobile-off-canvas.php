<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas  data-auto-focus="false" role="navigation">
<button class="close-button" aria-label="Close menu" type="button" data-close>
  <span aria-hidden="true">&times;</span>
</button>
	<?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
