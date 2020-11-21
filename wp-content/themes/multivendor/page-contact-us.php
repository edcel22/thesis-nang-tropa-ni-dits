<?php get_header(); ?>
	p get_header(); ?>
	<div id="contact_us" class="main_container">
		<div class="banner">
			<div class="overlay">
				<h1>Contact Us</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indljdflsjustry's standard dummy&#8203;</p>
			</div>
			<img src="http://multistore.local/wp-content/themes/multivendor/assets/images/banner.png">
		</div>
		<section id="contact_us">
			<h2>Interested? Send us a message.</h2>
			<div class="form_container">
				<form id="sunsetContactForm" name="sunsetContactForm" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" autocomplete="off">
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
						<button type="submit" id="btn_submit" class="btn-submit" >SUBMIT</button>
					</div>
                	<input type="hidden" name="action" value="sunset_save_user_contact_form">
				</form>
			</div>
		</section>
	</div>
<?php get_footer(); ?>