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
class price_post_type_registrations {

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
		global $price_post_type_post_type, $price_post_type_taxonomy_category, $price_post_type_taxonomy_tag;

		$price_post_type_post_type = new price_post_type_post_type;
		$price_post_type_post_type->register();
		$this->post_type = $price_post_type_post_type->get_post_type();

		$price_post_type_taxonomy_category = new price_post_type_taxonomy_category;
		$price_post_type_taxonomy_category->register();
		$this->taxonomies[] = $price_post_type_taxonomy_category->get_taxonomy();
		register_taxonomy_for_object_type(
			$price_post_type_taxonomy_category->get_taxonomy(),
			$price_post_type_post_type->get_post_type()
		);

		$price_post_type_taxonomy_tag = new price_post_type_taxonomy_tag;
		$price_post_type_taxonomy_tag->register();
		$this->taxonomies[] = $price_post_type_taxonomy_tag->get_taxonomy();
		register_taxonomy_for_object_type(
			$price_post_type_taxonomy_tag->get_taxonomy(),
			$price_post_type_post_type->get_post_type()
		);
	}

	/**
	 * Unregister post type and taxonomies registrations.
	 */
	public function unregister() {
		global $price_post_type_post_type, $price_post_type_taxonomy_category, $price_post_type_taxonomy_tag;
		$price_post_type_post_type->unregister();
		$this->post_type = null;

		$price_post_type_taxonomy_category->unregister();
		unset( $this->taxonomies[ $price_post_type_taxonomy_category->get_taxonomy() ] );

		$price_post_type_taxonomy_tag->unregister();
		unset( $this->taxonomies[ $price_post_type_taxonomy_tag->get_taxonomy() ] );
	}
}
