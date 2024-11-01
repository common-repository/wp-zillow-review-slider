<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Zillow_Review
 * @subpackage WP_Zillow_Review/admin/partials
 */
 
     // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
	
	    // wordpress will add the "settings-updated" $_GET parameter to the url
		//https://freegolftracker.com/blog/wp-admin/admin.php?settings-updated=true&page=wp_zillow-reviews
    if (isset($_GET['settings-updated'])) {
        // add settings saved message with the class of "updated"
        add_settings_error('zillow-radio', 'wpzillow_message', __('Settings Saved', 'wp-zillow-review-slider'), 'updated');
    }

	if(isset($this->errormsg)){
		add_settings_error('zillow-radio', 'wpzillow_message', __($this->errormsg, 'wp-zillow-review-slider'), 'error');
	}
?>
<div class="wrap wp_zillow-settings" id="">
	<h1><img src="<?php echo plugin_dir_url( __FILE__ ) . 'logo.png'; ?>"></h1>
<?php 
include("tabmenu.php");
?>
<div class="wpzillow_margin10">

	<form action="options.php" method="post">
		<?php
		// output security fields for the registered setting "wp_zillow-get_zillow"
		settings_fields('wp_zillow-get_zillow');
		// output setting sections and their fields
		// (sections are registered for "wp_zillow-get_zillow", each field is registered to a specific section)
		do_settings_sections('wp_zillow-get_zillow');
		// output save settings button
		submit_button('Save Settings & Download');
		?>
		<p><i>Note: It may take a little time after you hit the Save button to download your reviews.</i></p>
	</form>
	<?php 
// show error/update messages
		settings_errors('zillow-radio');

?>

</div>

</div>

	

