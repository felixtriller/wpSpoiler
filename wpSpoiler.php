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

function wpspoiler($atts, $content = null) {
	if ( !is_null($content) ) {
		$atts = extract(shortcode_atts(array('default'=>'values'),$atts));
	
		// do shortcode actions here
	}
}
add_shortcode('spoiler','wpspoiler');

?>