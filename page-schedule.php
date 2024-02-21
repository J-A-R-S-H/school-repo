<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme
 */

get_header();
?>

<main id="primary" class="site-main">


	<?php
	get_template_part('template-parts/content', 'page');

	?>

	<p>Weekly Course Schedule</p>

	<?php
	if (function_exists('get_field')) {
		if (get_field("schedule")) {
			echo '<table>';
			echo '<tr>';
			echo '<th>Date Schedule</th>';
			echo '<th>Course Schedule</th>';
			echo '<th>Instructor</th>';
			echo '</tr>';

			foreach (get_field("schedule") as $row) {
				echo '<tr>';
				echo '<td>' . $row['date_schedule'] . '</td>';
				echo '<td>' . $row['course_schedule'] . '</td>';
				echo '<td>' . $row['instructor'] . '</td>';
				echo '</tr>';
			}

			echo '</table>';
		}
	}

	?>






</main><!-- #main -->

<?php
get_sidebar();
get_footer();
