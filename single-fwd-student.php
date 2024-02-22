<?php

/**
 * The template for displaying single student posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();
	?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">

				<?php


				if (has_post_thumbnail()) {
					the_post_thumbnail('large');
				}
				the_content();

				?>
			</div><!-- .entry-content -->

			<div class="related-students">
				<h2><?php esc_html_e('Related Students', 'school-theme'); ?></h2>
				<ul>
					<?php
					// Get the terms of the taxonomy 'fwd-student-category' attached to the current post
					$terms = get_the_terms(get_the_ID(), 'fwd-student-category');
					$term_slugs = array();

					if ($terms && !is_wp_error($terms)) {
						foreach ($terms as $term) {
							$term_slugs[] = $term->slug;
						}
					}

					// Query other student posts in the same taxonomy term
					$args = array(
						'post_type' => 'fwd-student',
						'posts_per_page' => -1,
						'post__not_in' => array(get_the_ID()),
						'tax_query' => array(
							array(
								'taxonomy' => 'fwd-student-category',
								'field' => 'slug',
								'terms' => $term_slugs,
							),
						),
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
					?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
						}
						wp_reset_postdata();
					} else {
						echo '<li>' . esc_html__('No related students found.', 'school-theme') . '</li>';
					}
					?>
				</ul>
			</div>

		</article><!-- #post-<?php the_ID(); ?> -->

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>