<?php
/**
 * Comments.php
 * The template for displaying Comments.
 * @package WordPress
 * @subpackage nt_landium
 * @subpackage nt_landium 1.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>
<div class="container-for-comments">
	<!-- Comments -->
	<?php if ( have_comments() ) : ?>
		<h3 class="color-dark text-uppercase text-bold">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'nt-landium' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
			<h4 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'nt-landium' ); ?></h4>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'nt-landium' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'nt-landium' ) ); ?></div>
		</nav><!-- #comment-nav-before .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>

		
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use nt_landium_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define nt_landium_comment() and that will be used instead.
				 * See nt_landium_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'nt_landium_comment' ) );
			?>
			<!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
			<h4 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'nt-landium' ); ?></h4>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'nt-landium' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'nt-landium' ) ); ?></div>
		</nav> 
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments text-center"><?php esc_html_e( 'Comments are closed.', 'nt-landium' ); ?></p>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
   
			<div class="pull-righta"><small><?php cancel_comment_reply_link(); ?></small></div>
		 
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p class="alert"><?php esc_html_e( 'You must be ', 'nt-landium' ); ?><a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php esc_html_e( 'logged in', 'nt-landium' ); ?></a> <?php esc_html_e( 'to post a comment.', 'nt-landium' ); ?></p>
		<?php else : ?>
	
          <?php comment_form(); ?>
		 
		<?php endif; // If registration required and not logged in ?>
	 
	<?php endif; // if you delete this the sky will fall on your head ?>
</div>