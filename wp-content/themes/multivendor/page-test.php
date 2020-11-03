<?php get_header(); ?>
	<div class="containr">
		<?php

			$terms = get_terms([
			    'taxonomy' => 'Branch',
			    'hide_empty' => false,
			]);
			foreach($terms as $term):
				$image = get_field('image', $term);
			?>
				<div class="item">
				<a href="<?php echo $term->slug; ?>">
					<p><?php echo $term->name; ?></p>
				
				<img src="<?php  echo $image['url']; ?>" style="width: 100px;">
				</div>
			<?php
				endforeach;
			?>
			<?php var_dump($terms); ?>
	</div>
<?php get_footer(); ?>