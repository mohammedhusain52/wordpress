<?php
/**
 * Team Post Type
 *
 * @package   Team_Post_Type
 * @author    Devin Price
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @link      http://wptheming.com/team-post-type/
 * @copyright 2011 Devin Price, Gary Jones
 */

/**
 * Team tag taxonomy.
 *
 * @package Team_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Team_Post_Type_Taxonomy_Tag extends Gamajoteam_Taxonomy {
	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'team_tag';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => __( 'Team Tags', 'team-post-type' ),
			'singular_name'              => __( 'Team Tag', 'team-post-type' ),
			'menu_name'                  => __( 'Team Tags', 'team-post-type' ),
			'edit_item'                  => __( 'Edit Team Tag', 'team-post-type' ),
			'update_item'                => __( 'Update Team Tag', 'team-post-type' ),
			'add_new_item'               => __( 'Add New Team Tag', 'team-post-type' ),
			'new_item_name'              => __( 'New Team Tag Name', 'team-post-type' ),
			'parent_item'                => __( 'Parent Team Tag', 'team-post-type' ),
			'parent_item_colon'          => __( 'Parent Team Tag:', 'team-post-type' ),
			'all_items'                  => __( 'All Team Tags', 'team-post-type' ),
			'search_items'               => __( 'Search Team Tags', 'team-post-type' ),
			'popular_items'              => __( 'Popular Team Tags', 'team-post-type' ),
			'separate_items_with_commas' => __( 'Separate Team tags with commas', 'team-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove Team tags', 'team-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used Team tags', 'team-post-type' ),
			'not_found'                  => __( 'No Team tags found.', 'team-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'team_tag' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		return apply_filters( 'teamposttype_tag_args', $args );
	}
}