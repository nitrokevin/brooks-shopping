<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'foundationpress_asset_path' ) ) :
	function foundationpress_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path( 'app.css' ), array(), '1.0.0', 'all' );
		wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css2?family=Montserrat:wght@300..700&display=fallback', array(), '2.10.4', 'all' );
		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );
	

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.2.0.min.js', array('jquery'), '3.2.0', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		// wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' . foundationpress_asset_path( 'app.js' ), array( 'jquery' ), '2.10.4', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );
		wp_enqueue_script( 'FontAwesome', '//kit.fontawesome.com/31a587d007.js', array(), '6.0.0', true );

		function enqueue_load_more_script() {
    if (is_home() ) { // Adjust as needed
        wp_enqueue_script('load-more-js', get_template_directory_uri() . '/js/load-more.js', ['jquery'], null, true);

        wp_localize_script('load-more-js', 'load_more_params', [
            'ajaxurl' => admin_url('admin-ajax.php'),
        ]);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');

		
		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
