<?php
/**
 * @package Lightbox Custom
 * @version 1.0
 */
/*
Plugin Name: Lightbox Custom
Description: Easily embed a range of iframes into WordPress
Author: Daniel Larson
Version: 1.0
*/

function custom_lightbox_shortcode($atts) {
	// Set up the shortcode attributes that we'll need
	$atts = shortcode_atts(
				array(
					'wrapper-id'	=> 'lightbox-id',
					'iframe-url'	=> null,
					'iframe-width'	=> '600',
					'iframe-height'	=> '450',
					'image-url'	=> null,
					'image-width'	=> '300',
					'image-height'	=> '300',
				),
				$atts, 
				'custom_lightbox'
			);
	$id				= $atts['wrapper-id'];
	$iframe_url		= $atts['iframe-url'];
	$iframe_width	= $atts['iframe-width'];
	$iframe_height	= $atts['iframe-height'];
	$image_url		= $atts['image-url'];
	$image_width	= $atts['image-width'];
	$image_height	= $atts['image-height'];
	$iframe_test	= (!empty($iframe_url)) ? 'has-iframe' : 'no-iframe';
	
	ob_start();
	
	echo 	"<img src='$image_url' width='$image_width' height='$image_height' class='$iframe_test' data-iframe-id='$id'>";
	if( !empty($iframe_url) ) {
	echo	"<div class='iframe-wrapper' id='$id'>
				<div class='iframe-container'>
					<div class='close-iframe'>X - Close</div>
					<iframe width='$iframe_width' height='$iframe_height' src='$iframe_url' frameborder='0'></iframe>
				</div>
			</div>";
	}
	
	return ob_get_clean();
}
add_shortcode( 'custom_lightbox', 'custom_lightbox_shortcode');

function custom_lightbox_styles() {
	?>
	<style id="custom-lightbox-css">
		.iframe-wrapper {
			display: none;
			position: fixed;
			align-items: center;
			justify-content: middle;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			width: 100%;
			background: rgba(0,0,0,0.75);
			z-index: 9001;
		}
		
		.iframe-wrapper.open {
		 	display: flex;
		}
		
		.iframe-wrapper .iframe-container {
			max-width: 1170px;
			background: transparent;
			margin: 0 auto;
			width: 100%;
			max-height: 600px;
			position: relative;
		}
		
		.iframe-wrapper .iframe-container iframe {
			margin: 0 auto;
		}
		
		.has-iframe {
			cursor: pointer;
		}
		
		.close-iframe {
			background: #cecece;
			color: #232323;
			padding: 4px;
			position: absolute;
			top: -15px;
			right: 0;
			cursor: pointer;
		}
		
		.sh-titlebar, .primary-desktop {
			z-index: 1!important;
		}
	</style>
	<?php
}
add_action('wp_footer', 'custom_lightbox_styles');

function custom_lightbox_script() {
	?>
	<script id="custom-lightbox-js">
		(function($) {
			$('.has-iframe').click( function() {
				var clickId	= $(this).attr('data-iframe-id');
				$('#'+clickId).addClass('open');
			});
			
			$('.close-iframe').click( function() {
				$(this).parents('.iframe-wrapper').removeClass('open')
			});
		})(jQuery);
	</script>
	<?php
}
add_action('wp_footer', 'custom_lightbox_script');
