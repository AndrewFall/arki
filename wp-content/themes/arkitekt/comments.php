<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div class="comment-section">

	<?php if ( have_comments() ) : ?>
	
		<h1><?php comments_number(); ?></h1>

		<ul class="comment-tree">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 74,
					'callback'=>'sh_comments_list'
				) );
			?>
		</ul><!-- .comment-list -->
	

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', SH_NAME ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', SH_NAME ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', SH_NAME ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , SH_NAME ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php sh_comment_form(); ?>

</div><!-- #comments -->

