<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	
	<!-- Meta UTF8 charset -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#top-bar" data-offset="81">
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '1' ) : ?>
		<!-- PRELOADER -->
		<div class="preloader-container">
			<div class="la-ball-triangle-path la-2x">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- /PRELOADER -->
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '2' || ot_get_option('nt_landium_type') == '' ) : ?>
		<div class="preloader-container white">
			<div class="loader"> <div class="dot"></div> <div class="dot"></div> <div class="dot"></div> <div class="dot"></div> <div class="dot"></div> </div> 
		</div>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '3' ) : ?>
		<div class="preloader-container white">
			<div class='loader1'>
				<div>
					<div>
						<div>
							<div>
								<div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '4' ) : ?>
		<div class="preloader-container white">
			<div class='loader2'>
				<div>
					<div>
						<div>
							<div>
								<div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '5' ) : ?>
		<div class="preloader-container white">
			<div class='loader3'>
				<div>
					<div>
						<div>
							<div>
								<div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == '6' ) : ?>
		<div class="preloader-container white">
			<div class='loader4'>
				<div>
					<div>
						<div>
							<div>
								<div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php // CUSTOM PRELOADER ?>
	<?php if ( ot_get_option('nt_landium_pre') != 'off' && ot_get_option('nt_landium_type') == 'custom' ) : ?>
		<?php

			$nt_landium_tag_attribs = array(
				'id' 	=> array(),
				'class' => array(),
				'title' => array(),
				'style' => array(),
			);
			$nt_landium_preloader_allowed_tags = array(
			'div' 	=> $nt_landium_tag_attribs,
			'h1' 	=> $nt_landium_tag_attribs,
			'h2' 	=> $nt_landium_tag_attribs,
			'h3' 	=> $nt_landium_tag_attribs,
			'h4' 	=> $nt_landium_tag_attribs,
			'h5' 	=> $nt_landium_tag_attribs,
			'h6' 	=> $nt_landium_tag_attribs,
			'p' 	=> $nt_landium_tag_attribs,
			'span' 	=> $nt_landium_tag_attribs,
			'i' 	=> $nt_landium_tag_attribs,
			'hr' 	=> $nt_landium_tag_attribs,
			'img' 	=> array_merge( $nt_landium_tag_attribs, array(
					'src' 	 => array(),
					'alt' 	 => array(),
				) ),
			);

		?>

		<?php if ( ot_get_option( 'nt_landium_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_landium_custom_preloader' ) !='' ) : ?>
			<div class="nt-landium-custom-preloader">
		<?php endif; ?>

				<?php echo wp_kses( ot_get_option( 'nt_landium_custom_preloader' ), $nt_landium_preloader_allowed_tags ); ?>

		<?php if ( ot_get_option( 'nt_landium_custom_preloader_js' ) == 'off' && ot_get_option( 'nt_landium_custom_preloader' ) !='' ) : ?>
			</div>
		<?php endif; ?>

	<?php // END CUSTOM PRELOADER ?>
			
	<?php endif; ?>
	