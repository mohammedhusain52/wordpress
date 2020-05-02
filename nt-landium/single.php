
	<?php

		get_header();  
		get_template_part('index-header');

		$nt_landium_single_textalign 		= 	ot_get_option( 'nt_landium_single_textalign' );
		$nt_landium_bread_visibility 		= 	ot_get_option( 'nt_landium_bread' );
		$nt_landium_single_disable_heading 	= 	ot_get_option( 'nt_landium_single_disable_heading' );
		$nt_landium_postlayout 				= 	ot_get_option( 'nt_landium_postlayout' );
		
	?>

	<div id="start-screen" class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header start-screen start-screen--static-bg start-screen--static-bg--style-1" data-stellar-background-ratio="0.5">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<?php if ( $nt_landium_single_textalign == 'center') : ?> 
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 center">
					<?php elseif ( $nt_landium_single_textalign == 'right') : ?> 
					<div class="col-md-8 col-sm-12 col-xs-12 pull-right">
					<?php else : ?>
					<div class="col-md-8 col-sm-12 col-xs-12 center">
					<?php endif; ?>
						<div class="template-cover-intro">

							<?php if ( ( $nt_landium_single_disable_heading  ) != 'off') : ?>
								<h2 class="uppercase lead-heading"><?php echo the_title();?></h2>
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
				<div class="col-md-12-off has-margin-bottom-off">
				<?php if( ( $nt_landium_postlayout ) == 'right-sidebar' || ( $nt_landium_postlayout ) == '') { ?>
				<div class="col-lg-9 col-md-9 col-sm-12 index float-right posts">
				<?php } elseif( ( $nt_landium_postlayout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-9 col-md-9 col-sm-12 index float-left posts">
				<?php } elseif( ( $nt_landium_postlayout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php 

						while ( have_posts() ) : the_post(); 
							get_template_part( 'post-format/content', get_post_format() ); 
							if ( comments_open() || '0' != get_comments_number() ) :
								comments_template();
							endif;
						endwhile;

						// post navigation
						nt_landium_post_nav();

					?>

				</div><!-- #end sidebar+ content -->

				<?php if( ( $nt_landium_postlayout ) == 'right-sidebar' || ( $nt_landium_postlayout ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>
	