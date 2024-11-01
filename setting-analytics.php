<?php
/**
 * Plugin Name: Google Analytics Wordpress Plugin
 * Plugin URI: https://wordpress.org/plugins/wppm-google-analytics/
 * Description: The Google Analytics wordpress plugin empower google analytics to all pages. Permit to discover how your Visitors find your site. Ready to identify which pages and urls your visitors tap the most.
 * Requires at least: 5.9.3
 * Tested up to: 5.9.3
 * Stable tag: 3.2.2
 * Version:3.2.2
 * Author: Pradeep Maurya
 * Author URI: http://www.pradeepmaurya.in/about-me
 * License: GPL2 or Later
 
 Copyright 2021 "Google Analytics Wordpress Plugin by Pradeep Maurya" (support@pradeepmaurya.in)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 1, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY. 
 */
 if(!defined('ABSPATH')) exit;
 
 define( 'WPPMGA__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
 require_once( WPPMGA__PLUGIN_DIR . 'google-analytics-code.php' );
  


add_action('admin_menu', 'wppm_plugin_menu');

function wppm_plugin_menu() {
	add_menu_page('WPPM Google Analytics Settings', 'WPPM Google Analytics Settings', 'administrator', 'wppm-google-analytics-settings', 'wppm_google_analytics_settings_page', 'dashicons-chart-area');
	
}

// Register form fields
function wppm_google_analytic_fields(){
	register_setting('wppm_google_analytic_group','wppm_ga_code');
	register_setting('wppm_google_analytic_group','wppm_ga_option');
}

add_action('admin_init','wppm_google_analytic_fields');

function wppm_google_analytics_settings_page() {
	

	?>
	
<div class="wrap">

<h2>Google Analytics Setting</h2>

<form method="post" action="options.php">
    <?php 
				settings_fields('wppm_google_analytic_group'); 
				do_settings_sections('wppm_google_analytic_group');
			?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Google Analytics ID</th>
        <td><input name="wppm_ga_code" type="text" style="width:50%;" placeholder="Example: UA-xxxxxxxx-x" value="<?php echo get_option('wppm_ga_code');?>"></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Choose Google Analytics Code Display Option</th>
        <td><select name="wppm_ga_option">
		     <option value="header">Header</option>
			  <option value="footer" <?php if(get_option('wppm_ga_option')=='footer'){ echo "selected";}?>>Footer</option>
		</select></td>
        </tr>
        
       
    </table>
    
    <?php submit_button(); ?>

</form>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=166144553594684";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="https://www.facebook.com/codevyne" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


<a href="https://twitter.com/codevyne" class="twitter-follow-button" data-show-count="true" data-show-screen-name="true">Follow @codevyne</a>
<a href="https://www.paypal.com/paypalme/pradeepku041/" target="_blank">
					
					<img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0"  alt="PayPal - The safer, easier way to pay online!">
					
					</a>
</div>
  <?php
}



?>