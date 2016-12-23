<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>

    <div class="nopage">
        <div class="hero-image" style="background-image: url(&quot;http://i.gifs.com/4eN.gif&quot;);">
            <div class="overlay"> </div>
            <div id="main" class="site-main container">
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="not-found">
                            <h1 class="page-title"><?php _e( '404' ); ?></h1>
                            <p><?php _e( 'Looks like the page you’re looking for doesn’t exist.' ); ?></p>

                        </div>
                    </div>
                </div>
            </div><!-- #primary -->
        </div>
    </div>

<?php get_footer(); ?>