<h1>Sunset Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate Contact Form inside a page or a post </p>
<code>['contact_form']</code>
<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields('sunset-contact-options'); ?>
	<?php do_settings_sections( 'edcel_sunset_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>