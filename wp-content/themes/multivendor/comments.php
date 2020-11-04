<?php 
	if (post_password_required()) {
		return;
	}
?>
<div id="comments">
	<?php 
		if (have_comments()):
			//we have comments
	?>
		<ol class="comment_list">
			<?php 
				$args = array(
					'max_depth' => '',
					'style' => 'ol',
					'callback' => null,
					'end-callback' => null,
					'type' => 'all',
					'reply_text' => 'Reply',
					'page' => '',
					'per_page' => '',
					'avatar_size' => 32,
					'reverse_top_level' => null,
					'reverse_children' => '',
					'format' => '',
					'show_ping' => false,
					'echo' => true
				);
				wp_list_comments($args);
			?>
		</ol>
		<?php 
			if (!comments_open() && get_comments_number()):
		?>
			<p>Comments are closed.</p>
		<?php 
			endif; 
		?>
	<?php
		endif;
	?>
	<?php comment_form(); ?>
</div>