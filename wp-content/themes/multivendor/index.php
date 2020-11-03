<?php get_header(); ?>
	<div class="taxonomy_container">
		<?php 
		   $posts = get_posts(
			    array(
			        'posts_per_page' => -1,
			        'post_type' => 'store',
			        'tax_query' => array(
			            array(
			                'taxonomy' => 'Branch',
			                'field' => 'term_id',
			                'terms' => 2,
			            )
			        )
			    )
			);
		  foreach($posts as $post): 
		  	echo $post->post_title;
		  endforeach;

			while($query->have_posts()) : $query->the_post(); ?>
				
				<?php echo the_title(); ?> <br>

		<?php 
			endwhile; ?>
		<?php 
		
		?>
	</div>
<?php get_footer(); ?>