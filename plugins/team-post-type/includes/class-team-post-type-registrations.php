<?php
/**
 * Portfolio Post Type
 *
 * @package   Portfolio_Post_Type
 * @author    Devin Price
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @link      http://wptheming.com/portfolio-post-type/
 * @copyright 2011 Devin Price, Gary Jones
 */

/**
 * Register post types and taxonomies.
 *
 * @package Portfolio_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Team_Post_Type_Registrations {

	public $post_type;

	public $taxonomies;

	public function init() {
		// Add the portfolio post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 */
	public function register() {
		global $team_post_type_post_type, $team_post_type_taxonomy_category, $team_post_type_taxonomy_tag;

		$team_post_type_post_type = new team_post_type_post_type;
		$team_post_type_post_type->register();
		$this->post_type = $team_post_type_post_type->get_post_type();

		$team_post_type_taxonomy_category = new team_post_type_taxonomy_category;
		$team_post_type_taxonomy_category->register();
		$this->taxonomies[] = $team_post_type_taxonomy_category->get_taxonomy();
		register_taxonomy_for_object_type(
			$team_post_type_taxonomy_category->get_taxonomy(),
			$team_post_type_post_type->get_post_type()
		);

		$team_post_type_taxonomy_tag = new team_post_type_taxonomy_tag;
		$team_post_type_taxonomy_tag->register();
		$this->taxonomies[] = $team_post_type_taxonomy_tag->get_taxonomy();
		register_taxonomy_for_object_type(
			$team_post_type_taxonomy_tag->get_taxonomy(),
			$team_post_type_post_type->get_post_type()
		);
	}

	/**
	 * Unregister post type and taxonomies registrations.
	 */
	public function unregister() {
		global $team_post_type_post_type, $team_post_type_taxonomy_category, $team_post_type_taxonomy_tag;
		$team_post_type_post_type->unregister();
		$this->post_type = null;

		$team_post_type_taxonomy_category->unregister();
		unset( $this->taxonomies[ $team_post_type_taxonomy_category->get_taxonomy() ] );

		$team_post_type_taxonomy_tag->unregister();
		unset( $this->taxonomies[ $team_post_type_taxonomy_tag->get_taxonomy() ] );
	}
}
