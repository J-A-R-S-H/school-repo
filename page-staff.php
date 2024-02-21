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





    <h2>Administrators</h2>
    <?php
    $args = array(
        'post_type' => 'fwd-staff',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'fwd-staff-category',
                'field' => 'slug',
                'terms' => 'admin'
            )
        )
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        // echo '<section class="web-works"><h2 class="web-header">' . esc_html__('Web Projects', 'fwd') . '</h2>';
        while ($query->have_posts()) {
            $query->the_post();
    ?>

            <article>
                <h3>
                    <?php the_title(); ?>
                </h3>
                <?php the_post_thumbnail('medium'); ?>
                <?php the_excerpt(); ?>

                <?php
                if (function_exists('get_field')) {
                    if (get_field('staff_biography')) {
                        the_field('staff_biography');
                    }

                    if (get_field('staff_course')) {
                        echo '<h2>' . get_field('staff_course') . '</h2>';
                    }


                    if (get_field('staff_web')) {
                        echo '<a href="' . esc_url(get_field('staff_web')) . '">' . "Instructor Website" . '</a>';
                    }
                }
                ?>
            </article>
    <?php
        }
        wp_reset_postdata();
    }
    ?>

    <h2>Faculty</h2>
    <?php
    $args = array(
        'post_type' => 'fwd-staff',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'fwd-staff-category',
                'field' => 'slug',
                'terms' => 'faculty'
            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        // echo '<section class="web-works"><h2 class="web-header">' . esc_html__('Web Projects', 'fwd') . '</h2>';
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <article>
                <h3>
                    <?php the_title(); ?>
                </h3>
                <?php the_post_thumbnail('medium'); ?>
                <?php
                if (function_exists('get_field')) {
                    if (get_field('staff_biography')) {
                        the_field('staff_biography');
                    }

                    if (get_field('staff_course')) {
                        echo '<h2>' . get_field('staff_course') . '</h2>';
                    }

                    if (get_field('staff_web')) {
                        echo '<a href="' . esc_url(get_field('staff_web')) . '">' . "Instructor Website" . '</a>';
                    }
                }
                ?>
            </article>
    <?php
        }
        wp_reset_postdata();
    }

    ?>



    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content-fwd-staff', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>





</main><!-- #main -->

<?php
get_sidebar();
get_footer();
