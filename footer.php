<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$contact_phone_number = get_theme_mod('contact_phone_number');
$contact_email = get_theme_mod('contact_email');
$footer_company_number = get_theme_mod('footer_company_number');
$footer_copyright = get_theme_mod('footer_copyright');
$contact_address_1 = get_theme_mod('contact_address_1');
$contact_address_2 = get_theme_mod('contact_address_2');
$contact_address_3 = get_theme_mod('contact_address_3');
$contact_address_4 = get_theme_mod('contact_address_4');
$contact_address_5 = get_theme_mod('contact_address_5');
$contact_address_6 = get_theme_mod('contact_address_6');
$opening_times =  get_theme_mod('opening_times');
$special_opening_times =  get_theme_mod('special_opening_times');
$footer_background_image = get_field('footer_background_image');

if ($footer_background_image) {;
$small = $footer_background_image['sizes']['featured-small'];
$medium = $footer_background_image['sizes']['featured-medium'];
$large = $footer_background_image['sizes']['featured-large'];
$xlarge = $footer_background_image['sizes']['featured-xlarge'];
};
?>
<footer class="footer" >
<div class="footer-background-image"  <?php if ($footer_background_image) { ?> data-interchange="[<?php echo $small; ?>, small], [<?php echo $medium;?>, medium], [<?php echo $large;?>, large], [<?php echo $xlarge;?>, xlarge]" data-type="background"<?php } ?> ></div>
<div class="footer-container">

	<div class="footer-grid">

		<section>
		<?php foundationpress_footer_nav_l(); ?>
		
				<ul class="social-links menu footer-menu align-left">
				<?php if (get_theme_mod('social-facebook')) : ?>
					<li><a href="<?php echo esc_url(get_theme_mod('social-facebook-url')); ?> " rel="noreferrer"  target="_blank" aria-label="Facebook">
								<span class="fa-stack fa-1x">
				                	<i class="fas fa-circle fa-inverse fa-stack-2x"></i>
				                	<i class="fab fa-facebook-f fa-stack-1x "></i>
                                      </span>
						</a></li>
				<?php endif; ?>
						<?php if (get_theme_mod('social-x')) : ?>
					<li><a href="<?php echo esc_url(get_theme_mod('social-x-url')); ?>" rel="noreferrer" target="_blank" aria-label="X">
							<span class="fa-stack fa-1x">
				                	<i class="fas fa-circle fa-inverse fa-stack-2x"></i>
				                	<i class="fab fa-x-twitter fa-stack-1x "></i>
                                      </span>
						</a></li>
				<?php endif; ?>
				<?php if (get_theme_mod('social-instagram')) : ?>
					<li><a href="<?php echo esc_url(get_theme_mod('social-instagram-url')); ?>" rel="noreferrer" target="_blank" aria-label="Instagram">

							<span class="fa-stack fa-1x">
				                	<i class="fas fa-circle fa-inverse fa-stack-2x"></i>
				                	<i class="fab fa-instagram  fa-stack-1x "></i>
                                      </span>
						</a></li>
				<?php endif; ?>
				<?php if (get_theme_mod('social-linkedin')) : ?>
					<li><a href="<?php echo esc_url(get_theme_mod('social-linkedin-url')); ?>" rel="noreferrer" target="_blank" aria-label="LinkedIn">
									<span class="fa-stack fa-1x">
				                	<i class="fas fa-circle fa-inverse fa-stack-2x"></i>
				                	<i class="fab fa-linkedin-in fa-stack-1x "></i>
                                      </span>
							
						</a></li>
				<?php endif; ?>
				<?php if (get_theme_mod('social-pinterest')) : ?>
					<li><a href="<?php echo esc_url(get_theme_mod('social-pinterest-url')); ?>" rel="noreferrer" target="_blank" aria-label="Pinterest">
						
							<span class="fa-stack fa-1x">
				                	<i class="fas fa-circle fa-inverse fa-stack-2x"></i>
				                	<i class="fab fa-pinterest fa-stack-1x "></i>
                                      </span>
						</a></li>
				<?php endif; ?>
			</ul>
		
		</section>
		<section>
			 <picture class="show-for-large">
				<source srcset="<?php echo esc_url(get_theme_mod('header_logo_dark')); ?>" media="(prefers-color-scheme: dark)">
				<img src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
			</picture>
			<?php if ( ! empty( $opening_times ) ) :
			echo '<div class="opening-hours h5">';
			echo 'Opening Hours';
			echo '</div>';
    echo '<ul class="opening-times">';
    foreach ( $opening_times as $time ) :
        $day = isset( $time['day'] ) ? esc_html( $time['day'] ) : '';
        $hours = isset( $time['hours'] ) ? esc_html( $time['hours'] ) : '';
        ?>
        <li>
            <strong><?php echo $day; ?>:</strong> <?php echo $hours; ?>
        </li>
        <?php
    endforeach;
    echo '</ul>';
	echo '<span class="small">';
			echo '* Individual store opening times may vary';
			echo '</span>';
endif; ?>
		
		<hr class="show-for-small-only">
		</section>
		<section>
			<ul class="footer-contact menu footer-menu">
				<!-- For small screens only -->
				<li class="show-for-small-only">
					<div class="contact-details-heading h3">Contact Details</div>
				</li>
				<li class="show-for-small-only"><strong>T:&nbsp;</strong><?php echo $contact_phone_number ?></li>
				<li class="show-for-small-only">
					<a href="/contact" class="button secondary small">Contact us</a>
				</li>

				<!-- For medium screens and above -->
				<li class="show-for-medium"><strong class="highlight">T:&nbsp;</strong><?php echo $contact_phone_number ?></li>
				<li class="show-for-medium"><strong class="highlight">E:&nbsp;</strong><?php echo $contact_email ?></li>
			</ul>
		<ul class="footer-contact menu  footer-menu">
				<li><?php echo $contact_address_1 ?></li>
				<li><?php echo $contact_address_2 ?> </li>
				<li><?php echo $contact_address_3 ?> </li>
				<li><?php echo $contact_address_4 ?> </li>
				<li><?php echo $contact_address_5 ?></li>
				<li><?php echo $contact_address_6 ?></li>
				
			</ul>
			<?php
		$footer_links = get_theme_mod( 'footer_links' );
		 if($footer_links) {?>
		<div class="footer-links">
			<?php 
				foreach ( $footer_links as $footer_link ) : 
				$footer_url = $footer_link['link_url']; ?>

				<?php if($footer_url) { ?><a href="<?php echo $footer_url; ?>" target="_blank"><?php } ?>
					<?php echo wp_get_attachment_image($footer_link['footer_image'], 'fp-small','false',["class" => "footer-icon"] ); ?>
				<?php if($footer_url) { ?></a><?php } ?>
			<?php endforeach; ?>
		</div>
		<?php } ?>
	
			<?php foundationpress_footer_nav_r(); ?>
		<ul class="footer-contact menu  footer-menu show-for-large">
		<li><?php echo '&copy; ' . esc_attr(get_bloginfo('name', 'display')) .' ' . mysql2date('Y', get_user_option('user_registered', 1)) .  '-' .  date('Y') . "." ;?></li>
		<li><?php echo 'Company Number: ' . $footer_company_number ?></li>
		</ul>
		<hr class="show-for-small-only">
		</section>
	</div>
</div>
</div>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>