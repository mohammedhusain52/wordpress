
	<?php

		get_header();  
		get_template_part('index-header');

		$nt_landium_blog_textalign 			= 	ot_get_option( 'nt_landium_blog_textalign' );
		$nt_landium_blog_heading_display 	= 	ot_get_option( 'nt_landium_blog_heading_display' );
		$nt_landium_blog_heading 			= 	ot_get_option( 'nt_landium_blog_heading' );

		$nt_landium_blog_slogan_display 	= 	ot_get_option( 'nt_landium_blog_slogan_display' );
		$nt_landium_blog_slogan 			= 	ot_get_option( 'nt_landium_blog_slogan' );
		$nt_landium_bread_visibility 		= 	ot_get_option( 'nt_landium_bread', 'on' );

	?>

	<div id="start-screen" class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header start-screen start-screen--static-bg start-screen--static-bg--style-1" data-stellar-background-ratio="0.5">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<?php if ( $nt_landium_blog_textalign == 'center') : ?> 
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 center">
					<?php elseif ( $nt_landium_blog_textalign == 'right') : ?> 
					<div class="col-md-8 col-sm-12 col-xs-12 pull-right">
					<?php else : ?>
					<div class="col-md-8 col-sm-12 col-xs-12 center">
					<?php endif; ?>
						<div class="template-cover-intro">

							<?php if ( $nt_landium_blog_heading_display != 'off') : ?> 
								<?php if ( $nt_landium_blog_heading != '' ) : ?>
									<h2 class="uppercase white"><?php echo esc_html( $nt_landium_blog_heading ); ?></h2>
								<?php else : ?>
									<h2 class="uppercase white"><?php echo bloginfo('name'); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( $nt_landium_blog_slogan_display != 'off') : ?> 
								<?php if ( $nt_landium_blog_slogan != '' ) : ?>
									<h2 class="cover-text-sublead"><?php echo esc_html( $nt_landium_blog_slogan ); ?></h2>
								<?php else : ?>
									<h2 class="cover-text-sublead"><?php echo bloginfo('description'); ?></h2>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( ( $nt_landium_bread_visibility  ) != 'off') : ?>
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
	
	<section id="blog" class="nt-blog-content">
		<div class="container has-margin-bottom">
			<div class="row">
				<?php if( ot_get_option( 'nt_landium_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_landium_bloglayout' ) == '') { ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
				<?php } elseif( ot_get_option( 'nt_landium_bloglayout' ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
				<?php } elseif( ot_get_option( 'nt_landium_bloglayout' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>
				
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'post-format/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'nt-landium' ),
							'next_text'          => esc_html__( 'Next page', 'nt-landium' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
						) ); ?>
				<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>	
				
				</div>
				
				<?php if( ot_get_option( 'nt_landium_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_landium_bloglayout' ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
	
