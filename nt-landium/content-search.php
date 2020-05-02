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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="content-container post-container">
		<div class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		</div><!-- .entry-header -->

	<ul class="entry-meta">
		<li> <?php the_time('F j, Y'); ?></li>
		<li>  <?php esc_html_e('in', 'nt-landium'); ?>  <?php the_category(', '); ?></li>
		<li><?php the_author(); ?></li>
		<?php the_tags( '<li>', ',', '</li> '); ?>
	</ul>
	<?php the_excerpt(); ?>
	<!-- Date -->
	</div><!-- .entry-footer -->
	
	<!-- Read me BTN -->
	
</article><!-- #post-## -->
