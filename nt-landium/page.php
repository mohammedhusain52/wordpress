
	<?php

		get_header();
		get_template_part('index-header');

		$nt_landium_page_textalign 		= 	rwmb_meta( 'nt_landium_page_textalign' );
		$nt_landium_pagelayout 			= 	rwmb_meta( 'nt_landium_pagelayout' );
		$nt_landium_disable_title 		= 	rwmb_meta( 'nt_landium_disable_title' );
		$nt_landium_page_title 			= 	rwmb_meta( 'nt_landium_alt_title' );
		$nt_landium_page_disable_sub 	= 	rwmb_meta( 'nt_landium_disable_subtitle' );
		$nt_landium_page_subtitle 		= 	rwmb_meta( 'nt_landium_subtitle' );
		$nt_landium_bread_visibility 	= 	rwmb_meta( 'nt_landium_disable_page_bred', 'on' );

		// allowed tags for page subtitle
		$nt_landium_subtitle_tag_attribs = array(
		'id' 	=> array(),
		'class' => array(),
		'title' => array(),
		'style' => array(),
		);
		$nt_landium_subtitle_allowed_tags = array(
		'p' 	=> $nt_landium_subtitle_tag_attribs,
		'span' 	=> $nt_landium_subtitle_tag_attribs,
		'i' 	=> $nt_landium_subtitle_tag_attribs,
		'hr' 	=> $nt_landium_subtitle_tag_attribs,
		'img' 	=> array_merge( $nt_landium_subtitle_tag_attribs, array(
				'src'		=> array(),
				'width'		=> array(),
				'height'	=> array(),
				'alt'		=> array(),
			) ),
		);

	?>

	<div id="start-screen" class="template-cover template-cover-style-2 js-full-height-off section-class-scroll page-id-<?php echo get_the_ID(); ?> index-header start-screen start-screen--static-bg start-screen--static-bg--style-1" data-stellar-background-ratio="0.5">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<?php if ( $nt_landium_page_textalign == 'center') : ?>
					<div class="col-md-8 col-md-offset-2 center">
					<?php elseif ( $nt_landium_page_textalign == 'right') : ?>
					<div class="col-md-8 pull-right center">
					<?php else : ?>
					<div class="col-md-8 center">
					<?php endif; ?>
						<div class="template-cover-intro">

							<?php  if( ( $nt_landium_disable_title ) != true ): ?>
								<?php  if( $nt_landium_page_title  ): ?>
									<h2 class="uppercase lead-heading"><?php echo esc_html( $nt_landium_page_title ) ; ?></h2>
								<?php else : ?>
									<h2 class="uppercase lead-heading"><?php echo the_title(); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php  if( ( $nt_landium_page_disable_sub ) != true ): ?>
								<?php  if( $nt_landium_page_subtitle  ): ?>
									<h2 class="cover-text-sublead wow">
										<?php echo wp_kses( $nt_landium_page_subtitle, $nt_landium_subtitle_allowed_tags );?>
									</h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ( $nt_landium_bread_visibility  ) !=true) : ?>
								<?php if( function_exists('bcn_display') ) : ?>
									<p class="breadcrubms"> <?php  bcn_display();  ?></p>
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
				<div class="col-md-12-off  has-margin-bottom-off">

					<?php if( ( $nt_landium_pagelayout ) =='right-sidebar' || ($nt_landium_pagelayout ) =='' ){ ?>
					<div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
					<?php } elseif(( $nt_landium_pagelayout ) == 'left-sidebar') { ?>
					<?php get_sidebar(); ?>
					<div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
					<?php } elseif(( $nt_landium_pagelayout ) == 'full-width') { ?>
					<div class="col-xs-12 full-width-index v">
					<?php } ?>

						<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								// Include the page content template.
								get_template_part( 'content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							// End the loop.
							endwhile;
						?>
					</div>

					<?php if( ( $nt_landium_pagelayout ) =='right-sidebar' || ($nt_landium_pagelayout ) =='' ){ ?>
						<?php get_sidebar(); ?>
					<?php } ?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>
