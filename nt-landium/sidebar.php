<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage nt_landium
 * @since nt_landium 1.0
 */

	$nt_landium_sidebar_animation 		= 	ot_get_option( 'nt_landium_sidebar_animation' );
	$nt_landium_sidebar_animationclass = ( $nt_landium_sidebar_animation != '' ) ? ' wow '.esc_html( $nt_landium_sidebar_animation ).'' : '';
 
if (  is_active_sidebar( 'sidebar-1' )  ) : ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-12<?php echo esc_attr( $nt_landium_sidebar_animationclass )?>">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
<?php endif; ?>
