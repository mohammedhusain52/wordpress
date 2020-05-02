
<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage nt_landium
 * @since nt_landium 1.0
 */
?>


<!-- ARTICLE -->
<article>

	<h3 class="page-title"><?php esc_html_e( 'Nothing Found', 'nt-landium' ); ?></h3>
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nt-landium' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nt-landium' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nt-landium' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
	
</article> <!-- End ARTICLE -->

