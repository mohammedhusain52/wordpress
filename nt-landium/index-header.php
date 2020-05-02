	<?php
		$nt_landium_logo_option = ( ot_get_option('nt_landium_logo_type') );
		$nt_landium_img_logo 	= ( ot_get_option('nt_landium_logoimg') );
		$nt_landium_stickylogoimg 	= ( ot_get_option('nt_landium_stickylogoimg') );
		$nt_landium_text_logo 	= ( ot_get_option('nt_landium_textlogo') );
		$nt_landium_stickytextlogo	= ( ot_get_option('nt_landium_stickytextlogo') );
	?>

	<div id="top-bar">
		<div class="container">

            <?php if ( ( $nt_landium_logo_option ) == 'text' || ( $nt_landium_logo_option ) == '') : ?>
                <?php if ( $nt_landium_text_logo ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo_text" class="text-logo static-logo"><?php echo esc_html( $nt_landium_text_logo ); ?></a> <!-- Your Logo -->
                <?php if ( $nt_landium_stickytextlogo !=''  ) { ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo_text" class="text-logo sticky-logo"><?php echo esc_html( $nt_landium_stickytextlogo ); ?></a><?php } ?> <!-- Your Logo -->
                <?php  else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo_text" class="text-logo"><?php esc_html_e( 'Landium', 'nt-landium' ); ?></a> <!-- Your Logo -->
                <?php endif; ?>
            <?php endif; ?>

            <?php if (( $nt_landium_logo_option ) == 'img' ) : ?>
                <?php if ( $nt_landium_img_logo  ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo" class="img-logo  static-logo"><img class="responsive-img" src="<?php echo esc_url( $nt_landium_img_logo ); ?>" alt="<?php esc_html_e( 'Logo', 'nt-landium' ); ?>"></a> <!-- Your Logo -->
                    <?php if ( $nt_landium_stickylogoimg !=''  ) { ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo" class="img-logo sticky-logo"><img class="responsive-img" src="<?php echo esc_url( $nt_landium_stickylogoimg ); ?>" alt="<?php esc_html_e( 'Logo', 'nt-landium' ); ?>"><?php } ?></a> <!-- Your Logo -->
                    <?php  else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="top-bar__logo_text" class="text-logo"><?php esc_html_e( 'Landium', 'nt-landium' ); ?></a> <!-- Your Logo -->
                <?php endif; ?>
            <?php endif; ?>

			<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

			<nav id="top-bar__navigation">
				<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 3,
						'container'         => '',
						'container_class'   => '',
						'menu_class'        => 'primary-menu nav',
						'menu_id'		    => 'primary-menu nav',
						'echo' 				=> true,
						'fallback_cb'       => 'Nt_Landium_Wp_Bootstrap_Navwalker::fallback',
						'walker'            => new Nt_Landium_Wp_Bootstrap_Navwalker()
					));
				?>
			</nav>
		</div>
	</div>
