<?php
/*
	Plugin Name: wpSpoiler
	Plugin URI: http://felixtriller.de/projekte/wpspoiler/
	Description: Transforms [spoiler]text[/spoiler] to a hidden box with a Show/Hide Button
	Version: 2.0
	Author: Felix Triller
	Author URI: http://felixtriller.de/ 

	Copyright (c) 2010 Felix Triller. All rights reserved.

	Released under the GPL license
	http://www.opensource.org/licenses/gpl-license.php

	This is an add-on for WordPress
	http://wordpress.org/

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
*/


function wpspoiler_init_admin() {
	$plugin_dir = basename(dirname(__FILE__));
	
	load_plugin_textdomain( 'wpspoiler', null, $plugin_dir );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wpspoiler', $plugin_dir . '/wpspoiler.js', array('jquery') );
	wp_enqueue_style( 'wpspoiler', $plugin_dir . '/wpspoiler.css' );
}

add_action( 'init', 'wpspoiler_init' );


function wpspoiler( $atts, $content = null ) {
	if ( !is_null($content) ) {
		$atts = extract( shortcode_atts( array(
			'show' => 'Show',
			'hide' => 'Hide'
			),$atts));
	
		// do shortcode actions here
	}
}

add_shortcode( 'spoiler','wpspoiler' );

?>