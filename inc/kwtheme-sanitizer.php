<?php
/**
* Custom Sanitizer Function
*/

function kwtheme_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function kwtheme_sanitize_integer_product_rows($input) {
	if($input>5){
		$input=5;
	}
	return intval( $input );
}

function kwtheme_sanitize_integer($input) {
	return intval( $input );
}

function kwtheme_sanitize_radio_webpagelayout($input) {
	$valid_keys = array(
		'boxed' => __('Boxed', 'kwtheme'),
		'fullwidth' => __('Full Width', 'kwtheme')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function kwtheme_sanitize_transition_type($input){
	$valid_keys = array(
		'true' => __('Fade', 'kwtheme'),
		'false' => __('Slide', 'kwtheme'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function kwtheme_sanitize_data_ratio($input){
	$valid_keys = array(
		'cinema' => __('Cinema', 'kwtheme'),
		'wide' => __('Wide', 'kwtheme'),
		'tv' => __('TV', 'kwtheme'),
		'box' => __('Box', 'kwtheme'),
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}
function kwtheme_sanitize_page_layouts($input) {
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	$valid_keys = array(
		'sidebar-left' => $imagepath.'sidebar-left.png',
		'sidebar-right' => $imagepath.'sidebar-right.png',
		'sidebar-both' => $imagepath.'sidebar-both.png',
		'sidebar-no' => $imagepath.'sidebar-no.png',
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

// checkbox sanitization
   function kwtheme_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }
