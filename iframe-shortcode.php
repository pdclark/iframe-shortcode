<?php
/*
Plugin Name: iFrame Shortcode
Description: Allow iFrames in the WordPress editor using a shortcode. For example: <code>[iframe src="http://apple.com" height="1000px"]</code>
Version: 1.0
Author: Paul Clark, 10up
Author URI: http://pdclark.com
Plugin URI: http://github.com/10up/iframe-shortcode
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
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
