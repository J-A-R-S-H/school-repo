<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme
 */

?>

<footer id="colophon" class="site-footer">

	<nav class="footer-logo">
		<?php
		if (function_exists('the_custom_logo')) {
			the_custom_logo();
		}
		?>
	</nav>
	<div class="footer-credits">
		Powered by Local Host
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme %1$s by %2$s.', 'school-theme'), '', '<a href="https://johnsjustwantstochill.ca/school">Alen V, John. S</a>');
		?>
	</div><!-- .site-info -->
	<nav class="footer-nav">
		<h2>Links</h2>
		<?php wp_nav_menu(
			array(
				'theme_location' => 'footer-right',
			)

		); ?>
	</nav>



</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>