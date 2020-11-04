<?php get_header(); ?>
	<div id="menu" class="main_container">
		<div class="banner">
			<div class="overlay">
				<h1>Menu</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy&#8203;</p>
			</div>
			<img src="http://multistore.local/wp-content/themes/multivendor/assets/images/banner.png">
		</div>
		<section class="menu">
			<h2>See Our Menus</h2>
			<div class="menus_wrapper">
				<div class="items">
					<?php 
						$current_category = get_queried_object(); 
						$args = array(
							'post_type' => 'post',
							'cat' => $current_category->cat_ID
						);
						$query = new WP_Query($args);
						while($query->have_posts()): $query->the_post(); ?>
							<div class="item">
								<div class="top">
								<?php the_post_thumbnail(); ?>
								</div>		
								<div class="bottom">
									<div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="description"><?php the_excerpt(); ?></div>
									<a href="/contact-us" class="buy_now">Buy Now</a>
								</div>
								<!-- <div class="comment_section">
									<?php 
										// if ( comments_open() ):
										// 	comment_template();
										// endif;
									?>
								</div> -->				
							</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	</div>
<?php get_footer(); ?>