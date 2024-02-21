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
		$current_term = get_queried_object();

		$args = array(
			'post_type'      => 'fwd-student',
			'posts_per_page' => -1,
			'tax_query'      => array(
				array(
					'taxonomy' => $current_term->taxonomy,
					'field'    => 'slug',
					'terms'    => $current_term->slug
				),
			),
		);

		$query = new WP_Query($args);

		if ($query->have_posts()) : ?>
			<section class="work-section">
				<h2><?php echo esc_html($current_term->name); ?></h2>
				<?php
				while ($query->have_posts()) :
					$query->the_post(); ?>
					<article>
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<?php
							the_post_thumbnail('large');
							?>
						</a>
						<?php
						the_content();
						?>
					</article>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</section>
	<?php
		endif;
	endif;
	?>

	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
