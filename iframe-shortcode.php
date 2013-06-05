<?php
/*
Plugin Name: iFrame Shortcode
Description: Allow iFrames in the WordPress editor using a shortcode. For example: <code>[iframe src="http://apple.com" height="1000px"]</code>
Version: 1.0
Author: Brainstorm Media
Author URI: http://brainstormmedia.com
*/

add_shortcode('iframe','storm_iframe_shortcode');

function storm_iframe_shortcode($atts) {
	 extract(shortcode_atts(array(
		'src' => '',
		'width' => '100%',
		'height' => '400px',
		'scrolling' => 'no',
		'frameborder' => '0'
	 ), $atts));

	$find = array(
		'&amp;amp',
		'&amp;',
		'&;',
	);

	$replace = array(
		'&amp;',
		'&',
		'&',
	);

	$src = str_replace ($find, $replace, $src);	

	$out = "<iframe src=\"$src\" width=\"$width\" height=\"$height\" frameborder=\"$frameborder\" scrolling=\"$scrolling\"></iframe>";

	if (empty($src)) {
		$out = '';
	}

	return $out;
}