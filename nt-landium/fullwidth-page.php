	<?php

		/*
		Template name: Fullwidth Template
		*/

		get_header();
		get_template_part('index-header');

		$nt_landium_page_textalign 		= 	rwmb_meta( 'nt_landium_page_textalign' );
		$nt_landium_disable_title 		= 	rwmb_meta( 'nt_landium_disable_title' );
		$nt_landium_page_title 			= 	rwmb_meta( 'nt_landium_alt_title' );
		$nt_landium_page_disable_sub 	= 	rwmb_meta( 'nt_landium_disable_subtitle' );
		$nt_landium_page_subtitle 		= 	rwmb_meta( 'nt_landium_subtitle' );
		$nt_landium_bread_visibility 	= 	rwmb_meta( 'nt_landium_disable_page_bred', 'on' );

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
									<h2 class="cover-text-sublead">
										<?php echo wp_kses( $nt_landium_page_subtitle, $nt_landium_subtitle_allowed_tags );?>
									</h2>
								<?php else : ?>
									<h2 class="cover-text-sublead">
										<?php echo ('Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.'); ?>
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
		<div class="container-off has-margin-bottom">
			<div class="row-off">
				<div class="col-md-12-off has-margin-bottom">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>
