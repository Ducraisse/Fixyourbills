<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();
							// Include the page content template.
							get_template_part( 'content', 'page' );
							// End the loop.
						endwhile;
						?>
					</div>
				</div>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>