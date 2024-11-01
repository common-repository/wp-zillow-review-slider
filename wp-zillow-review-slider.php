<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ljapps.com
 * @since             1.0
 * @package           WP_Zillow_Review_Slider
 *
 * @wordpress-plugin
 * Plugin Name: 	  WP Zillow Review Slider
 * Plugin URI:        http://ljapps.com/wp-zillow-review-slider/
 * Description:       Allows you to easily display your Zillow Business Page reviews in your Posts, Pages, and Widget areas.
 * Version:           1.0
 * Author:            LJ Apps
 * Author URI:        http://ljapps.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-zillow-review-slider
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-zillow-review-slider-activator.php
 */
function activate_WP_Zillow_Review( $networkwide )
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-zillow-review-slider-activator.php';
    WP_Zillow_Review_Activator::activate_all( $networkwide );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-zillow-review-slider-deactivator.php
 */
function deactivate_WP_Zillow_Review()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-zillow-review-slider-deactivator.php';
    WP_Zillow_Review_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_WP_Zillow_Review' );
register_deactivation_hook( __FILE__, 'deactivate_WP_Zillow_Review' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-zillow-review-slider.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_WP_Zillow_Review()
{
    //define plugin location constant

    define( 'wprev_zillow_plugin_dir', plugin_dir_path( __FILE__ ) );
    define( 'wprev_zillow_plugin_url', plugins_url( '', __FILE__ ) );


    $plugin = new WP_Zillow_Review();
    $plugin->run();
}

//for running the cron job
add_action('wpzillow_daily_event', 'wpzillow_do_this_daily');

function wpzillow_do_this_daily() {

		
	require_once plugin_dir_path( __FILE__ ) . 'admin/class-wp-zillow-review-slider-admin.php';
	$plugin_admin = new WP_Zillow_Review_Admin( 'wp-zillow-review-slider', '1.0' );
	$plugin_admin->wpzillow_download_zillow_master();
	
}

//start the plugin-------------
run_WP_Zillow_Review();