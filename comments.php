<?php if ( comments_open() ) : ?>
<div class="clear article-mod mod-comments">
	<h2 class="sub-header"><?php _e("Comment on this article", 'storini'); ?></h2>

	<?php $comments_args = array(
		'label_submit'=> __('Post Comment', 'storini'),
		'title_reply' => '',
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author"><label for="author">' . __("Name", 'storini') . '</label> <input id="author" name="author" type="text" placeholder="' . __("Name", 'storini') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></p>',
    	'email' => '<p class="comment-form-email"><label for="email">' . __("Email", 'storini') . '</label> <input id="email" name="email" type="text" placeholder="' . __("Email address", 'storini') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></p>'
    )
    ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __("Comment", 'storini') . '</label> <textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . __('Your comment', 'storini') . '"></textarea></p>',
	);
	comment_form($comments_args); ?>

	<div class="commentlist clear">
		<?php wp_list_comments(array('style' => 'div')); ?>
	</div>
	
	<div class="paginate-comments"><?php paginate_comments_links(); ?></div>

</div>
<?php else: ?>
<?php endif; ?>
