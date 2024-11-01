<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Zillow_Review_Slider
 * @subpackage WP_Zillow_Review_Slider/admin/partials
 */
 
     // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
?>
<div class="wrap wp_zillow-settings">
	<h1><img src="<?php echo plugin_dir_url( __FILE__ ) . 'logo.png'; ?>"></h1>
<?php 
include("tabmenu.php");
?>
<div class="wpfbr_margin10">

<h1>Coming Soon!</h1><p>Currently the Pro version does not work with Zillow...</p><br>
<a href="https://ljapps.com/wp-review-slider-pro/" class="btn_green dashicons-before dashicons-external"><?php _e('More Info', 'wp-fb-reviews'); ?></a>

</div>

</div>

	

