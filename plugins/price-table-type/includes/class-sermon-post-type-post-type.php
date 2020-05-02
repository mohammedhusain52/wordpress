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
 * Portfolio post type.
 *
 * @package Portfolio_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class price_Post_Type_Post_Type extends Gamajoprice_Post_Type {
	/**
	 * Post type ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $post_type = 'price';

	/**
	 * Return post type default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'               => __( 'Price Table', 'price-post-type' ),
			'singular_name'      => __( 'Price Item', 'price-post-type' ),
			'menu_name'          => _x( 'Price Table', 'admin menu', 'price-post-type' ),
			'name_admin_bar'     => _x( 'Price Item', 'add new on admin bar', 'price-post-type' ),
			'add_new'            => __( 'Add New Item', 'price-post-type' ),
			'add_new_item'       => __( 'Add New price Item', 'price-post-type' ),
			'new_item'           => __( 'Add New price Item', 'price-post-type' ),
			'edit_item'          => __( 'Edit price Item', 'price-post-type' ),
			'view_item'          => __( 'View Item', 'price-post-type' ),
			'all_items'          => __( 'All price Items', 'price-post-type' ),
			'search_items'       => __( 'Search price', 'price-post-type' ),
			'parent_item_colon'  => __( 'Parent price Item:', 'price-post-type' ),
			'not_found'          => __( 'No price items found', 'price-post-type' ),
			'not_found_in_trash' => __( 'No price items found in trash', 'price-post-type' ),
		);

		$supports = array(
			
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'price', ), // Permalinks format
			'menu_position'   => 44,
			'menu_icon'       => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-admin-media' : false ,
			'has_archive'     => true,
		);

		return apply_filters( 'priceposttype_args', $args );
	}

	/**
	 * Return post type updated messages.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type updated messages.
	 */
	public function messages() {
		$post             = get_post();
		$post_type        = get_post_type( $post );
		$post_type_object = get_post_type_object( $post_type );

		$messages = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Price item updated.', 'price-post-type' ),
			2  => __( 'Custom field updated.', 'price-post-type' ),
			3  => __( 'Custom field deleted.', 'price-post-type' ),
			4  => __( 'Price item updated.', 'price-post-type' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'price item restored to revision from %s', 'price-post-type' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Price item published.', 'price-post-type' ),
			7  => __( 'Price item saved.', 'price-post-type' ),
			8  => __( 'Price item submitted.', 'price-post-type' ),
			9  => sprintf(
				__( 'Price item scheduled for: <strong>%1$s</strong>.', 'price-post-type' ),
				/* translators: Publish box date format, see http://php.net/date */
				date_i18n( __( 'M j, Y @ G:i', 'price-post-type' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Price item draft updated.', 'price-post-type' ),
		);

		if ( $post_type_object->publicly_queryable ) {
			$permalink         = get_permalink( $post->ID );
			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );

			$view_link    = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View price item', 'price-post-type' ) );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview price item', 'price-post-type' ) );

			$messages[1]  .= $view_link;
			$messages[6]  .= $view_link;
			$messages[9]  .= $view_link;
			$messages[8]  .= $preview_link;
			$messages[10] .= $preview_link;
		}

		return $messages;
	}
}
