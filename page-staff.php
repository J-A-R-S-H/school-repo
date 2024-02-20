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
                <a href="<?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
                <?php the_excerpt(); ?>
            </article>
        <?php
        }
        wp_reset_postdata();
    }




    // add seperator later

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
                <a href="<?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
                <?php the_excerpt(); ?>
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
