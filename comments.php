<?php
/**
* @package supernormal
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( '댓글 &ldquo;%2$s&rdquo;', '댓글 %1$s개', get_comments_number(), 'comments title', 'supernormal' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 48,
					'short_ping'  => true,
					'style'       => 'ol',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'supernormal' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'supernormal' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'supernormal' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'supernormal' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
