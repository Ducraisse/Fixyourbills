<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="home-hero" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero.jpg')">
    <div class="home-hero__content">
        <h1>Get a quote today</h1>
        <div class="home-hero__content__item">
            <a href="#">
                <div class="home-hero__content__item__link">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </div>
                <span>
                    Business <br> Energy
                </span>
            </a>
        </div>
        <div class="home-hero__content__item">
            <a href="#">
                <div class="home-hero__content__item__link">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <span>
                    Home <br> Energy
                </span>
            </a>
        </div>
    </div>
</div>

<div class="home-content">
    <div class="container">
        <div class="row">
            <p>It has never been easier to save
                money on your bills for your home and business,
                Fix Your Bills provides you with all your energy-saving
                solutions on one site.
            </p>
            <a href="#">save now</a>
        </div>
    </div>
</div>

<div class="more-ways">
    <div class="container">
        <div class="row">
            <h2>More ways to save</h2>
            <div class="more-ways__section">
                <a href="#">
                    <div class="more-ways__section__holder">
                        <i class="fa fa-gbp" aria-hidden="true"></i>
                    </div>
                    <span>Start Saving Now</span>
                </a>
            </div>
            <div class="more-ways__section">
                <a href="#">
                    <div class="more-ways__section__holder">
                        <i class="fa fa-unlock" aria-hidden="true"></i>
                    </div>
                    <span>Efficient energy</span>
                </a>
            </div>
            <div class="more-ways__section">
                <a href="#">
                    <div class="more-ways__section__holder">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <span>Renewable Energy</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
