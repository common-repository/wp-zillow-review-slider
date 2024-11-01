<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_Zillow_Review
 * @subpackage WP_Zillow_Review/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    WP_Zillow_Review
 * @subpackage WP_Zillow_Review/includes
 * @author     Your Name <email@example.com>
 */
class WP_Zillow_Review_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

	//unschdule Zillow review download
	//first find the next schedule callback time
    $time_next_firing = wp_next_scheduled("wpzillow_daily_event");

    //use this function to unschedule it by passing the time and event name
    wp_unschedule_event($time_next_firing, "wpzillow_daily_event");
	wp_clear_scheduled_hook('wpzillow_daily_event');
	
	}

}
