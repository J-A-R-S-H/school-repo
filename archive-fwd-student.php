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
		<section class="students">
			<?php
			// excerpt length only for the studnets page
			function fwd_excerpt_length($length)
			{
				return 20;
			}


			add_filter('excerpt_length', 'fwd_excerpt_length', 999);

			function fwd_excerpt_more($more)
			{

				$more = '... <a class="read-more" href="' . esc_url(get_permalink()) . '">Read about about the Student</a>';
				return $more;
			}


			add_filter("excerpt_more", "fwd_excerpt_more");

			$args = array(
				'post_type'      => 'fwd-student',
				'posts_per_page' => -1,
				"order" => "ASC",
				"orderby" => "title",
			);
			$query =	 new WP_Query($args);

			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post();
			?>
					<article class="student-item">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<?php
							the_post_thumbnail('custom-image-23', array('class' => 'alignright'));
							?>
						</a>

						<?php
						the_excerpt();

						$terms = get_the_terms(get_the_ID(), "fwd-student-category");
						if ($terms && !is_wp_error($terms)) {
							foreach ($terms as $term) {
								echo '<p>Specialty: <a href="' . get_term_link($term) . '">' . '' . $term->name . '</a></p>';
							}
						}
						?>
					</article>
		<?php
				}

				wp_reset_postdata();
			}


		endif;
		?>
		</section>

</main><!-- #main -->

<?php
get_footer();
