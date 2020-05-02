<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @package WordPress
 * @subpackage nt_landium_
 * @since nt_landium_ 1.0
 */

	$nt_landium_post_animation 		= 	ot_get_option( 'nt_landium_post_animation' );
	$nt_landium_post_animationclass = ( $nt_landium_post_animation != '' ) ? 'wow '.esc_html( $nt_landium_post_animation ).'' : '';
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(''.$nt_landium_post_animationclass.''); ?>>
	<div class="hentry-box">
		<?php
			$nt_landium_embed = rwmb_meta( 'nt_landium_video_embed' );
			if( $nt_landium_embed!='' ) :
		?>
		<div class="post-thumb blog-bg">
			<div class="media-element video-responsive"><?php echo wp_kses($nt_landium_embed,nt_landium_allowed_html()); ?></div>
		</div>

		<?php else : ?>

		<?php
			$nt_landium_m4v 		=	rwmb_meta( 'nt_landium_video_m4v' );
			$nt_landium_ogv 		=	rwmb_meta( 'nt_landium_video_ogv' );
			$nt_landium_webm 		=	rwmb_meta( 'nt_landium_video_webm' );
			$nt_landium_image_id 	=	get_post_thumbnail_id();
			$nt_landium_image_url	=	wp_get_attachment_image_src($nt_landium_image_id, true);
			$nt_landium_wp_video 	=	'[video poster="'.$nt_landium_image_url[0].'" mp4="'.$nt_landium_m4v.'"  webm="'.$nt_landium_webm.'"]';
		?>

	    <div class="post-thumb"><?php echo do_shortcode ($nt_landium_wp_video); ?></div>
		<?php endif; ?>

		<div class="post-container">
			<div class="content-container">
				<div class="entry-header">
					<?php
						if ( ! is_single() ) :
							the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
						endif;
					?>
				</div><!-- .entry-header -->

				<ul class="entry-meta">
					<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
					<li><?php esc_html_e('in', 'nt-landium'); ?>  <?php the_category(', '); ?></li>
					<li><?php the_author(); ?></li>
						<?php the_tags( '<li>', ', ', '</li> '); ?>
				</ul>

			</div>

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						esc_html__( 'Continue reading %s', 'nt-landium' ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-landium' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-landium' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->

            <?php if ( ! is_single() ) : ?>
    			<a class="margin_30 btn" href="<?php echo esc_url( get_permalink() ); ?>" role="button">
                    <?php

                        $nt_landium_post_readmore 		= 	ot_get_option( 'nt_landium_post_readmore' );
                        if ( $nt_landium_post_readmore != '' ) {
                            echo esc_html( $nt_landium_post_readmore );
                        } else {
                            esc_html_e( 'Read More', 'nt-landium' );
                        }

                    ?>
                </a>
    		<?php endif; // is_single() ?>

			<?php if ( is_single() ) : ?>
				<?php if ( $nt_sawmill_share_face_display != 'hide' ) : ?>
					<div id="share-buttons">
						<?php
						$nt_sawmill_share_face_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_face_display', true );
						$nt_sawmill_share_twitter_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_twitter_display', true );
						$nt_sawmill_share_google_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_google_display', true );
						$nt_sawmill_share_digg_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_digg_display', true );
						$nt_sawmill_share_reddit_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_reddit_display', true );
						$nt_sawmill_share_linkedin_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_linkedin_display', true );
						$nt_sawmill_share_stumbleupon_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_stumbleupon_display', true );
						$nt_sawmill_share_pinterest_display = get_post_meta( get_the_ID(), 'nt_sawmill_share_pinterest_display', true );

						if ( $nt_sawmill_share_face_display != true ) { ?>
							<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						<?php }
						if ( $nt_sawmill_share_twitter_display != true ) { ?>
							<a href="http://twitter.com/share?url=<?php echo get_permalink(); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a>
						<?php }
						if ( $nt_sawmill_share_google_display != true ) { ?>
							<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
						<?php }
						if ( $nt_sawmill_share_digg_display != true ) { ?>
							<a href="http://www.digg.com/submit?url=<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-digg"></i></a>
						<?php }
						if ( $nt_sawmill_share_reddit_display != true ) { ?>
							<a href="http://reddit.com/submit?url=<?php echo get_permalink(); ?>&title=Simple Share Buttons" target="_blank"><i class="fa fa-reddit"></i></a>
						<?php }
						if ( $nt_sawmill_share_linkedin_display != true ) { ?>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
						<?php }
						if ( $nt_sawmill_share_pinterest_display != true ) { ?>
							<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
						<?php }
						if ( $nt_sawmill_share_stumbleupon_display != true ) { ?>
							<a href="http://www.stumbleupon.com/submit?url=<?php echo get_permalink(); ?>&title=Simple Share Buttons" target="_blank"><i class="fa fa-stumbleupon"></i></a>
						<?php }	 ?>
					</div>
				<?php endif;  ?>
			<?php endif; // is_single() ?>
		</div>
	</article><!-- #post-## -->
