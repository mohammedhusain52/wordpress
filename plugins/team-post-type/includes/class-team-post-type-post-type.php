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
class Team_Post_Type_Post_Type extends Gamajoteam_Post_Type {
	/**
	 * Post type ID.
	 *
	 * @since 1.0.0
	 *
	 * @type string
	 */
	protected $post_type = 'team';

	/**
	 * Return post type default arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type default arguments.
	 */
	protected function default_args() {
		$labels = array(
			'name'               => __( 'Team', 'team-post-type' ),
			'singular_name'      => __( 'Team Item', 'team-post-type' ),
			'menu_name'          => _x( 'Team', 'admin menu', 'team-post-type' ),
			'name_admin_bar'     => _x( 'Team Item', 'add new on admin bar', 'team-post-type' ),
			'add_new'            => __( 'Add New Item', 'team-post-type' ),
			'add_new_item'       => __( 'Add New Team Item', 'team-post-type' ),
			'new_item'           => __( 'Add New Team Item', 'team-post-type' ),
			'edit_item'          => __( 'Edit Team Item', 'team-post-type' ),
			'view_item'          => __( 'View Item', 'team-post-type' ),
			'all_items'          => __( 'All Team Items', 'team-post-type' ),
			'search_items'       => __( 'Search Team', 'team-post-type' ),
			'parent_item_colon'  => __( 'Parent Team Item:', 'team-post-type' ),
			'not_found'          => __( 'No Team items found', 'team-post-type' ),
			'not_found_in_trash' => __( 'No Team items found in trash', 'team-post-type' ),
		);

		$supports = array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'author',
			'custom-fields',
			'revisions',
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'team', ), // Permalinks format
			'menu_position'   => 5,
			'menu_icon'       => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-portfolio' : false ,
			'has_archive'     => true,
		);

		return apply_filters( 'teamposttype_args', $args );
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
			1  => __( 'Team item updated.', 'team-post-type' ),
			2  => __( 'Custom field updated.', 'team-post-type' ),
			3  => __( 'Custom field deleted.', 'team-post-type' ),
			4  => __( 'Team item updated.', 'team-post-type' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Team item restored to revision from %s', 'team-post-type' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Team item published.', 'team-post-type' ),
			7  => __( 'Team item saved.', 'team-post-type' ),
			8  => __( 'Team item submitted.', 'team-post-type' ),
			9  => sprintf(
				__( 'Team item scheduled for: <strong>%1$s</strong>.', 'team-post-type' ),
				/* translators: Publish box date format, see http://php.net/date */
				date_i18n( __( 'M j, Y @ G:i', 'team-post-type' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Team item draft updated.', 'team-post-type' ),
		);

		if ( $post_type_object->publicly_queryable ) {
			$permalink         = get_permalink( $post->ID );
			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );

			$view_link    = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View Team item', 'team-post-type' ) );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview Team item', 'team-post-type' ) );

			$messages[1]  .= $view_link;
			$messages[6]  .= $view_link;
			$messages[9]  .= $view_link;
			$messages[8]  .= $preview_link;
			$messages[10] .= $preview_link;
		}

		return $messages;
	}
}
