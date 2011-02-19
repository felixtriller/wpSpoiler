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

function wpspoiler_init() {
	$plugin_dir = basename(dirname(__FILE__));
	
	load_plugin_textdomain( 'wpspoiler', null, $plugin_dir . '/languages/' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wpspoiler', $plugin_dir . '/wpspoiler.js', array('jquery') );
	wp_enqueue_style( 'wpspoiler', $plugin_dir . '/wpspoiler.css' );
}

add_action( 'init', 'wpspoiler_init' );

function wpspoiler( $atts, $content = null ) {
	if ( !is_null($content) ) {
		
		// get atts
		$atts = extract( shortcode_atts( array(
			'show' => get_option('wpspoiler_show'),
			'hide' => get_option('wpspoiler_hide'),
			'linkclass' => 'spoiler-link',
			'textclass' => 'spoiler-text'
			),$atts));
		
		// build output
		$link = '<a href=""></a>';
		$body = '<div class="">' . $content . '</div>';
		
		return '';
	} else {
		return '<!-- spoiler tag removed -->';
	}
}

add_shortcode( 'spoiler','wpspoiler' );

function wpspoiler_admin() {
	
}

////////////////////////////////////

// mt_settings_page() displays the page content for the Test settings submenu
function mt_settings_page() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'mt_favorite_color';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = 'mt_favorite_color';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Menu Test Plugin Settings', 'menu-test' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Favorite Color:", 'menu-test' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>

<?php
 
}

////////////////////////////////////

add_options_page( __('wpSpoiler', 'wpspoiler'), __('Spoiler', 'wpspoiler'), 'manage_options', basename(__FILE__), 'wpspoiler_admin');



?>