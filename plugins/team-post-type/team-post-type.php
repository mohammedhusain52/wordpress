<?php
/**
 * Team Post Type
 *
 * @package   Portfolio_Post_Type
 * @author    Devin Price
 * @license   GPL-2.0+
 * @link      http://wptheming.com/portfolio-post-type/
 * @copyright 2011 Devin Price, Gary Jones
 *
 * @wordpress-plugin
 * Plugin Name: Team Post Type
 * Plugin URI:  http://wptheming.com/portfolio-post-type/
 * Description: Enables a portfolio post type and taxonomies.
 * Version:     0.9.1
 * Author:      Devin Price
 * Author URI:  http://www.wptheming.com/
 * Text Domain: portfolioposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required files for registering the post type and taxonomies.
require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/interface-team-gamajo-registerable.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-gamajo-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-gamajo-taxonomy.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type-post-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type-taxonomy-category.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type-taxonomy-tag.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type-registrations.php';

// Instantiate registration class, so we can add it as a dependency to main plugin class.
$team_post_type_registrations = new Team_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$team_post_type = new Team_Post_Type( $team_post_type_registrations );

// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $team_post_type, 'activate' ) );

// Initialise registrations for post-activation requests.
$team_post_type_registrations->init();

add_action( 'init', 'team_post_type_init', 100 );
/**
 * Adds styling to the dashboard for the post type and adds portfolio posts
 * to the "At a Glance" metabox.
 *
 * Adds custom taxonomy body classes to portfolio posts on the front end.
 *
 * @since 0.8.3
 */
function team_post_type_init() {
	if ( is_admin() ) {
		global $team_post_type_admin, $team_post_type_registrations;
		// Loads for users viewing the WordPress dashboard
		if ( ! class_exists( 'Gamajoteam_Dashboard_Glancer' ) ) {
			require plugin_dir_path( __FILE__ ) . 'includes/class-team-gamajo-dashboard-glancer.php';  // WP 3.8
		}
		require plugin_dir_path( __FILE__ ) . 'includes/class-team-post-type-admin.php';
		$team_post_type_admin = new Team_Post_Type_Admin( $team_post_type_registrations );
		$team_post_type_admin->init();
	} else {
		// Loads for users viewing the front end
		if ( apply_filters( 'teamposttype_add_taxonomy_terms_classes', true ) ) {
			if ( ! class_exists( 'Gamajoteam_Single_Entry_Term_Body_Classes' ) ) {
				require plugin_dir_path( __FILE__ ) . 'includes/class-team-gamajo-single-entry-term-body-classes.php';
			}
			$team_post_type_body_classes = new Gamajoteam_Single_Entry_Term_Body_Classes;
			$team_post_type_body_classes->init( 'team' );
		}
	}
}
