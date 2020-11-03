<?php get_header() ?>
	 <div id="home" class="main_container">
		<div class="banner">
			<div class="overlay">
				<h1>Multi Restaurant</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy​</p>
			</div>
			<img src="<?php echo  get_theme_file_uri(); ?>/assets/images/banner.png">
		</div>
		<section id="restaurants">
			<h2>See Restaurants</h2>
			<div class="section_wrapper">
				<div class="items">
					<?php
						$categories = get_categories( array(
						    'orderby' => 'name',
						    'order'   => 'ASC'
						) );
						foreach($categories as $category):
							$image = get_field('image', $category); ?>
							<div class="item">
								<div class="left">
									<img src="<?php echo $image['url']; ?>">
								</div>
								<div class="right">
									<div class="resto_info">
										<a href="<?php echo '/category/'.$category->slug; ?>" class="title"><?php echo $category->name; ?></a>
										<div class="description"><?php echo $category->description; ?></div>
									</div>
								</div>
							</div>
					<?php
						endforeach; ?>
				</div>
			</div>
		</section>
		<section id="contact_us">
			<h2>Interested? Send us a message.</h2>
			<div class="form_container">
				<form id="sunsetContactForm" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" >
					<div class="form_group">
						<label for="fullname">Full Name</label>
						<input type="text" name="fullname" id="fullname">
					</div>
					<div class="form_group">
						<label for="phonenumber">Phone Number</label>
						<input type="number" name="phonenumber" id="phonenumber">
					</div>
					<div class="form_group">
						<label for="email">Email Address</label>
						<input type="email" name="email" id="email">
					</div>
					<div class="form_group">
						<label for="message">Inquiry</label>
						<textarea class="message" name="message" rows="5" id="message"></textarea>
					</div>
					<div class="button_container">
						<button type="submit" class="btn-submit" >SUBMIT</button>
					</div>
				</form>
			</div>
		</section>
	 </div>
<?php get_footer(); ?>