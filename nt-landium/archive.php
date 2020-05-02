
	<?php

		get_header();  
		get_template_part('index-header');

		$nt_landium_archive_textalign 	= ot_get_option( 'nt_landium_archive_textalign' );
		$nt_landium_bread_visibility 	= ot_get_option( 'nt_landium_bread' );
		$nt_landium_archivelayout 		= ot_get_option( 'nt_landium_archivelayout' );

	?>

	<div id="start-screen" class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header start-screen start-screen--static-bg start-screen--static-bg--style-1" data-stellar-background-ratio="0.5">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<?php if ( $nt_landium_archive_textalign == 'center') : ?> 
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 center">
					<?php elseif ( $nt_landium_archive_textalign == 'right') : ?> 
					<div class="col-md-8 col-sm-12 col-xs-12 pull-right">
					<?php else : ?>
					<div class="col-md-8 col-sm-12 col-xs-12 center">
					<?php endif; ?>
						<div class="template-cover-intro">

							<?php if ( ot_get_option( 'nt_landium_archive_heading_visibility' )!= 'off') : ?>
								<?php if ( ot_get_option( 'nt_landium_archive_heading' )!= '') : ?>
									<h2 class="uppercase lead-heading"><?php echo ( ot_get_option( 'nt_landium_archive_heading' )); ?></h2> 
								<?php else : ?>
									<h2 class="uppercase lead-heading"><?php echo esc_html_e('Our Archive','nt-landium');?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ot_get_option( 'nt_landium_archive_slogan_visibility' )!= 'off') : ?>	
								<?php if ( ot_get_option( 'nt_landium_archive_slogan' )!= '') : ?>
									<h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php echo ( ot_get_option( 'nt_landium_archive_slogan' )); ?></h2> 
								<?php else : ?>
									<h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php the_archive_title(); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ( $nt_landium_bread_visibility  ) != 'off') : ?>
								<?php if( function_exists('bcn_display') ) : ?>
									<p class="breadcrubms"> <?php bcn_display();  ?></p>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">

				<?php if( ( $nt_landium_archivelayout ) == 'right-sidebar' || ( $nt_landium_archivelayout ) == '' ) { ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
				<?php } elseif( ( $nt_landium_archivelayout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
				<?php } elseif( ( $nt_landium_archivelayout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

				 <?php 
					if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						get_template_part( 'post-format/content', get_post_format() );
					endwhile;
					the_posts_pagination( array(
						'prev_text'          => esc_html__( 'Previous page', 'nt-landium' ),
						'next_text'          => esc_html__( 'Next page', 'nt-landium' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'nt-landium' ) . ' </span>',
					) );
					else :
						get_template_part( 'content', 'none' );
					endif;
				?>

				</div><!-- #end sidebar+ content -->

				<?php if( ( $nt_landium_archivelayout ) == 'right-sidebar' || ( $nt_landium_archivelayout ) == '' ) { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>