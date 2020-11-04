<?php get_header(); ?>
	<div id="test" class="main_container">
		<div class="banner">
			<div class="overlay">
				<h1>Post Title</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy&#8203;</p>
			</div>
			<img src="http://multistore.local/wp-content/themes/multivendor/assets/images/banner.png">
		</div>
		<section class="menu">
			<h2><?php the_title(); ?></h2>
			<div class="comment_section">
				<?php 
					while (have_posts()): the_post();
						if ( comments_open() ):
							comments_template();
						endif;
					endwhile;
				?>
			</div>	
		</section>
	</div>
<?php get_footer(); ?>