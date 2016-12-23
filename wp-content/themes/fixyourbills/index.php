<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Scriptable
 * @since Scriptable 1.0
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if ( have_posts() ) : ?>

                <?php

                while ( have_posts() ) : the_post();

                    get_template_part( 'single', get_post_format() );

                endwhile;

            else :

                get_template_part( 'content', 'none' );

            endif; ?>

        </main>
    </div>

<?php get_footer(); ?>