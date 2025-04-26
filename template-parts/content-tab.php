<?php
/**

 */
?>
<?php if (have_rows('repeater_content_tab')) {
		$counter = 0; 
		$tab_bar_background_color = get_field('tab_bar_background_color');?>
		<ul class="tabs <?php echo $tab_bar_background_color ?>"  data-deep-link="true" data-responsive-accordion-tabs="small-accordion large-tabs"  data-deep-link-smudge="true" data-deep-link-smudge-offset="200" id="<?php echo esc_attr($id); ?>">
			<?php while (have_rows('repeater_content_tab')) { the_row(); 
			$tab_heading = get_sub_field('tab_heading');
			$tab_background_color = get_sub_field('tab_background_color');
			
			$counter++;
			?>
			<li class="tabs-title <?php if( $counter ==1 ){ echo "is-active"; } ?> <?php echo $tab_background_color ?>">
				<a href="#tab<?php echo $counter?>-<?php echo esc_attr($id); ?>" aria-selected="true">
					<?php echo $tab_heading ?>
				</a>
			</li>
		<?php } ?>
		</ul>
	<?php $counter = 0; ?>
	<div class="tabs-content <?php echo $tab_bar_background_color ?>" data-tabs-content="<?php echo esc_attr($id); ?>">
	<?php while (have_rows('repeater_content_tab')) { the_row();
		$tab_content = get_sub_field('tab_content');
		$counter++; ?>
			<div class="tabs-panel  <?php if( $counter ==1 ){ echo "is-active"; } ?>" id="tab<?php echo $counter?>-<?php echo esc_attr($id); ?>">
				<?php echo $tab_content ?>
			</div>
	<?php } ?>
	</div>
<?php } ?>	