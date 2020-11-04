<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MultiVendor</title>
</head>
<body>
	<nav>
		<div class="nav_wrapper">
			<div class="nav_links">
				<div class="left">
					<div class="logo"><span>Multi Restaurant</span></div>
					<ul>
						<li><a href="<?php echo site_url('/'); ?>">Home</a></li>
						<!-- <li><a href="">Menu</a></li>
						<li><a href="">Restaurants</a></li -->
					</ul>
				</div>
				<div class="right">
					<ul>
						<li><a href="<?php echo site_url('wp-login.php'); ?>">Login</a></li>
						<li><a href="<?php echo site_url('wp-login.php?action=register'); ?>">Register</a></li>
						<?php
							if( is_user_logged_in() ): ?>
								<li>WOW</li>
						<?php
							endif;
						 ?>
						<li><a href="">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
<?php wp_head(); ?>