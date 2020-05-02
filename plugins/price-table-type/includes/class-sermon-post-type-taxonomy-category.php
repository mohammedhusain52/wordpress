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
class price_Post_Type_Taxonomy_Category extends Gamajoprice_Taxonomy {
	/**
	 * Taxonomy ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $taxonomy = 'price_category';

	/**
	 * Return taxonomy default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Taxonomy default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'                       => __( 'price Categories', 'price-post-type' ),
			'singular_name'              => __( 'price Category', 'price-post-type' ),
			'menu_name'                  => __( 'price Categories', 'price-post-type' ),
			'edit_item'                  => __( 'Edit price Category', 'price-post-type' ),
			'update_item'                => __( 'Update price Category', 'price-post-type' ),
			'add_new_item'               => __( 'Add New price Category', 'price-post-type' ),
			'new_item_name'              => __( 'New price Category Name', 'price-post-type' ),
			'parent_item'                => __( 'Parent price Category', 'price-post-type' ),
			'parent_item_colon'          => __( 'Parent price Category:', 'price-post-type' ),
			'all_items'                  => __( 'All price Categories', 'price-post-type' ),
			'search_items'               => __( 'Search price Categories', 'price-post-type' ),
			'popular_items'              => __( 'Popular price Categories', 'price-post-type' ),
			'separate_items_with_commas' => __( 'Separate price categories with commas', 'price-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove price categories', 'price-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used price categories', 'price-post-type' ),
			'not_found'                  => __( 'No price categories found.', 'price-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'price_category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		return apply_filters( 'priceposttype_category_args', $args );
	}
}