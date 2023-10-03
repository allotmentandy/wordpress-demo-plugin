<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link    https://allotmentandy.github.io
 * @since   1.0.0
 * @package Andy_Wp_Pb
 *
 * @wordpress-plugin
 * Plugin Name:       andy wp pb
 * Plugin URI:        https://allotmentandy.github.io/wppb
 * Description:       a simple demo plugin
 * Version:           1.0.0
 * Author:            andy
 * Author URI:        https://allotmentandy.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       andy-wp-pb
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC') ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ANDY_WP_PB_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-andy-wp-pb-activator.php
 */
function activate_andy_wp_pb()
{
    include_once plugin_dir_path(__FILE__) . 'includes/class-andy-wp-pb-activator.php';
    Andy_Wp_Pb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-andy-wp-pb-deactivator.php
 */
function deactivate_andy_wp_pb()
{
    include_once plugin_dir_path(__FILE__) . 'includes/class-andy-wp-pb-deactivator.php';
    Andy_Wp_Pb_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_andy_wp_pb');
register_deactivation_hook(__FILE__, 'deactivate_andy_wp_pb');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-andy-wp-pb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_andy_wp_pb()
{

    $plugin = new Andy_Wp_Pb();
    $plugin->run();

}

// add a dashboard widget
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:ANDY@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>';
}




// my plugin pages and subpages
function my_plugin_admin_page()
{
    echo '<div class="wrap"><h1>My Plugin Admin Page</h1>';
    echo '<p>This is a simple WordPress admin plugin tutorial.</p></div>';
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css');

	include "my-plugin-frontpage.php";
}

function my_pages_function()
{
    echo '<h1>Pages</h1>';
    // Get all of the pages.
	$pages = get_pages();

	// Start the table.
	echo '<table>';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Title</th>';
	echo '<th>Edit</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
  
	// Loop through the pages and display them in the table.
	foreach ( $pages as $page ) {
  
	  // Get the edit link for the page.
	  $edit_link = get_edit_post_link( $page->ID );
  
	  // Display the page title and edit link in the table.
	  echo '<tr>';
	  echo '<td>' . $page->post_title . '</td>';
	  echo '<td><a href="' . $edit_link . '">Edit</a></td>';
	  echo '</tr>';
	}
  
	// End the table.
	echo '</tbody>';
	echo '</table>';
}

function my_plugin_subpage_2_function()
{
    echo '<h1>Subpage 2</h1>';
    echo '<p>This is the content of Subpage 2.</p>';
}

function my_plugin_subpage_3_function()
{
	include "my-submenu-page.php";
}

function my_plugin_subpage_4_function()
{
	include "my-submenu-page2.php";
}


// function my_plugin_options_page()
// {
//     // Get the current values of the settings.
//     $my_setting_1 = get_option('my_setting_1');
//     // If the setting does not exist in the database, set it to the initial value.
//     if ($my_setting_1 === false ) {
//         $my_setting_1 = 'andy';
//     }

//     $my_setting_2 = get_option('my_setting_2');
//           // If the setting does not exist in the database, set it to the initial value.
//     if ($my_setting_2 === false ) {
//         $my_setting_2 = '1';
//     }
    
  
//     // Display the form.
//     echo '<form action="options.php" method="post">';
//     echo '<input type="hidden" name="page" value="my-plugin-options">';
//     echo '<h3>My Plugin Options</h3>';
//     echo '<label for="my_setting_1">My Setting 1</label>';
//     echo '<input type="text" name="my_setting_1" id="my_setting_1" value="' . $my_setting_1 . '">';
//     echo '<br>';
//     echo '<label for="my_setting_2">My Setting 2</label>';
//     echo '<select name="my_setting_2" id="my_setting_2">';
//     echo '<option value="1"> 1</option>';
//     echo '<option value="2"> 2</option>';
//     echo '<option value="3"> 3</option>';
//     echo '</select>';
//     echo '<br>';
//     echo '<input type="submit" name="submit" value="Save Changes">';
//     echo '</form>';
// }


  add_action('admin_menu', 'my_plugin_admin_menu');




  function my_plugin_read_error_log() {
	$error_log_lines = array();

	// Get the path to the Apache error log file.
	$error_log_file = '/var/log/apache2/error.log';
  
	// Open the error log file for reading.
	$error_log_handle = fopen($error_log_file, 'r');
  
// var_dump($error_log_handle);

	// Read the contents of the error log file into an array.
	echo "<div>";
	while (($line = fgets($error_log_handle)) !== false) {
	//   $error_log_lines[] = trim($line);
	  echo $line . "<hr>";
	}
	echo "</div>";

	// Close the error log file.
	fclose($error_log_handle);
  
  }

//   $error_log_lines = my_plugin_read_error_log(); 


  function shortcode_list_display() {

	// Get all of the shortcodes.
	global $shortcode_tags;
	$shortcodes = $shortcode_tags;
  
	// Create a table to display the shortcodes.
	echo '<table>';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Shortcode</th>';
	echo '<th>Description</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
  
	// Loop through the shortcodes and display them in the table.
	foreach ($shortcodes as $shortcode => $function) {
  
	  // Get the description of the shortcode.
	  $description = '';
	  if (function_exists($function)) {
		$description = $function;
	  }
  
	  // Display the shortcode in the table.
	  echo '<tr>';
	  echo '<td>' . $shortcode . '</td>';
	  echo '<td>' . $description . '</td>';
	  echo '</tr>';
	}
  
	// End the table.
	echo '</tbody>';
	echo '</table>';
  }
  
// This code will display the contents of the submenu page.
function my_submenu_page_callback() {

	// Add jQuery to the page.
	wp_enqueue_script('jquery');
  
	// Add a button to the page.
	echo '<button id="my-button">Click Me</button>';
  
	// Add some jQuery code to the page.
	echo '<script>
	  jQuery(document).ready(function() {
		jQuery("#my-button").click(function() {
		  alert("You clicked the button!");
		});
	  });
	</script>';
  }

  function css_list_display() {

	// Get all of the CSS files that are being loaded.
	$css_files = wp_get_global_stylesheet();
//   echo "<pre>";
	echo($css_files);
  }

function my_plugin_admin_menu()
{
    // Add the top-level menu item.
    add_menu_page('My Plugin', 'My Plugin', 'manage_options', 'my-plugin', 'my_plugin_admin_page', 'dashicons-admin-site-alt', 3);
  
    // Add the subpages.
    add_submenu_page('my-plugin', 'Subpage 1', 'pages', 'manage_options', 'my-plugin-subpage-1', 'my_pages_function');
    add_submenu_page('my-plugin', 'Subpage 2', 'Subpage 2', 'manage_options', 'my-plugin-subpage-2', 'my_plugin_subpage_2_function');
    add_submenu_page('my-plugin', 'Subpage 3', 'wordpress tv rss feed ', 'manage_options', 'my-plugin-subpage-3', 'my_plugin_subpage_3_function');
    add_submenu_page('my-plugin', 'Subpage 4', 'css examples', 'manage_options', 'my-plugin-subpage-4', 'my_plugin_subpage_4_function');
    add_submenu_page('my-plugin', 'Subpage 5', 'apache errors', 'manage_options', 'my-plugin-subpage-5', 'my_plugin_read_error_log');
	add_submenu_page('my-plugin', 'Subpage 6', 'Shortcode List', 'manage_options', 'shortcode-list', 'shortcode_list_display' );
	add_submenu_page( 'my-plugin', 'subpage7', 'Jquery', 'manage_options', 'my-submenu-page', 'my_submenu_page_callback' );
	add_submenu_page( 'my-plugin', 'CSS List', 'CSS List', 'manage_options', 'css-list', 'css_list_display' );



    //add options page
    // add_options_page('My Plugin Options', 'My Plugin Options', 'manage_options', 'my-plugin-options', 'my_plugin_options_page');

}

run_andy_wp_pb();
