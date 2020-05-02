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
 * Portfolio category taxonomy.
 *
 * @package Portfolio_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Team_Post_Type_Taxonomy_Category extends Gamajoteam_Taxonomy {
	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'team_category';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => __( 'Team Categories', 'team-post-type' ),
			'singular_name'              => __( 'Team Category', 'team-post-type' ),
			'menu_name'                  => __( 'Team Categories', 'team-post-type' ),
			'edit_item'                  => __( 'Edit Team Category', 'team-post-type' ),
			'update_item'                => __( 'Update Team Category', 'team-post-type' ),
			'add_new_item'               => __( 'Add New Team Category', 'team-post-type' ),
			'new_item_name'              => __( 'New Team Category Name', 'team-post-type' ),
			'parent_item'                => __( 'Parent Team Category', 'team-post-type' ),
			'parent_item_colon'          => __( 'Parent Team Category:', 'team-post-type' ),
			'all_items'                  => __( 'All Team Categories', 'team-post-type' ),
			'search_items'               => __( 'Search Team Categories', 'team-post-type' ),
			'popular_items'              => __( 'Popular Team Categories', 'team-post-type' ),
			'separate_items_with_commas' => __( 'Separate Team categories with commas', 'team-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove Team categories', 'team-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used Team categories', 'team-post-type' ),
			'not_found'                  => __( 'No Team categories found.', 'team-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'team_category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		return apply_filters( 'teamposttype_category_args', $args );
	}
}