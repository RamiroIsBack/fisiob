<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die(__( 'Please do not load this page directly. Thanks!', 'alum' ));
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'alum' ); ?></p>
    <?php
    return;
}
?>
<!-- You can start editing here. -->
<div id="commentsbox" class="post">
    <?php if (have_comments()) : ?>
        <h3 id="comments">
           <?php comments_number(__( 'No Responses', 'alum' ),
                    __( 'One Response', 'alum' ),
                    __( '% Responses', 'alum' )); ?>
            <?php _e( 'so far.', 'alum' ); ?></h3>
        <ol class="commentlist">
    <?php wp_list_comments(array(
        'avatar_size' => 70)); ?>
        </ol>
        <div class="comment-nav">
            <div class="alignleft">
                <?php previous_comments_link() ?>
            </div>
            <div class="alignright">
        <?php next_comments_link() ?>
            </div>
        </div>
    <?php else : // this is displayed if there are no comments so far ?>
    <?php if (comments_open()) : ?>
            <!-- If comments are open, but there are no comments. -->
        <?php else : // comments are closed  ?>
            <!-- If comments are closed. -->
            <p class="nocomments"><?php _e( 'Comments are closed.', 'alum' ); ?></p>
    <?php endif; ?>
<?php endif; ?>	
            <?php if (comments_open()) : ?>
        <div class="commentform_wrapper">
            <div class="post-info"><?php _e( 'Leave a Comment', 'alum' ); ?></div>
            <div id="comment-form">
        
            </div>
        </div>
<?php endif;    ?>
</div>














<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>
    
     
          
	<?php endif; // have_comments() ?>
	<?php
	$args = array('comment_notes_after'=>'All fields are mandatory.',
				  'comment_notes_before'=>'',
				  'title_reply' => __( 'LEAVE A COMMENT', 'alum' ),
				  'label_submit'=>__( 'Submit Comment', 'alum' ),
				  'fields' => apply_filters( 'comment_form_default_fields', array(
						'author' =>
						  '<div class="col-md-4">' .						  
						  '<input class="form-control" id="author" name="author" type="text" placeholder="'. __( 'Your Name*', 'alum' ).'" value="' . esc_attr( $commenter['comment_author'] ) .
						  '" size="30" /></div>',
					
						'email' =>
						  '<div class="col-md-4">'.
						  '<input class="form-control" id="email" name="email" type="text" placeholder="'. __( 'E-mail*', 'alum' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						  '" size="30" /></div>',
						  
						  'url' =>
						  '<div class="col-md-4">'.
						  '<input class="form-control" id="url" name="url" type="text" placeholder="'. __( 'Website', 'alum' ).'" value="' . esc_attr(  $commenter['comment_author_url'] ) .
						  '" size="30" /></div>'
						  )),
						  'comment_field' => '<p>' .
						  '<textarea class="form-control" id="comment" name="comment" placeholder="'. __( 'Comment*', 'alum' ).'" cols="45" rows="8" aria-required="true"></textarea>' .
						  '</p>',						 
    'comment_notes_after' => '',
				  );
	?>
	<?php comment_form($args); ?>
</div><!-- #comments .comments-area -->