<?php
/**
  *commentsformdesign
 */
?>

	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyeleven' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">
			Have Your Say
		</h2>



		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		
		
		
  		<nav id="comment-nav-above">
  		
  			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
  			
  			<div class="nav-previous">
  			    <?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?>
  			</div>
  			
  			
  			<div class="nav-next">
  			    <?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?>
  			</div>
  			
  			
  		</nav>
  		
  		
  		
		<?php endif; // check for comment navigation ?>




		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use twentyeleven_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define twentyeleven_comment() and that will be used instead.
				 * See twentyeleven_comment() in twentyeleven/functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'twentyeleven_comment' ) );
			?>
		</ol>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		
		
		<nav id="comment-nav-below">
		
		
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
			
			
			<div class="nav-previous">
			    <?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?>
			</div>
			
			
			<div class="nav-next">
			    <?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?>
			</div>
			
			
		</nav>
		
		
		<?php endif; // check for comment navigation ?>




	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	
	
		<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyeleven' ); ?></p>
		
		
		
	<?php endif; ?>




  <?php if (!is_user_logged_in()) : /*ログインしているときにフォーム要素を入れ替え*/ ?>

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
  
  $(function(){
  
    // beforeで入れ替え
      $('#nameandurl').before($('#textbox'));

    });
  
  </script>

  
  <?php endif; ?>
  
  
  
  
  <div class="comment_form_over">

	<?php 
	
	    /*コメントフォーム部分。functions.phpでも一部制御しています。*/
	    
	    
	    comment_form(array('comment_notes_after'=>'','comment_notes_before'=>'',
	    'comment_field'=>'<p class="comment-form-comment" id="textbox"><label for="comment">コメント</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	    'label_submit'=> __( 'コメントを投稿する' ),
	
	)); 
	
	     ?>
	

	
	
	</div>

</div><!-- #comments -->
