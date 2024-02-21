<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->

	<?php
		/* Start the Loop */


		$args = array(
			'post_type'      => 'fwd-student',
			'posts_per_page' => -1,
			"order" => "ASC",
			"orderby" => "title",
		);
		$query =	 new WP_Query($args);

		echo "<nav class='service-links'>";
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				echo "<a href='post-type" . get_the_ID() . "'>";
				echo esc_html(get_the_title());
				echo "</a>";
				the_post_thumbnail('large');

				the_excerpt();
			}
			wp_reset_postdata();
		}
		echo "</nav>";


	endif;
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
