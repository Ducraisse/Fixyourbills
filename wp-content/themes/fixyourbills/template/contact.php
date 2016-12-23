<?php
/*
Template Name: Contact
*/

?>

<?php get_header() ?>

<div class="container">
    <div class="row">

        <div class="contact-holder">

            <div class="contact-holder__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4749.0510881085875!2d-2.240623!3d53.476939!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb1ea9b767d29%3A0x976c18fb826c182c!2sGainsborough+House!5e0!3m2!1sen!2suk!4v1482496789837" width="1000" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="contact-holder__form">
                <h1>Email Us</h1>
                <p>Please fill out the contact form below to find out more</p>
                <?php echo do_shortcode( '[contact-form-7 id="11" title="Contact form 1"]' ) ?>
            </div>

            <div class="contact-holder__info">
                <h2>Have a question?</h2>
                <p>Check our frequently asked questions or get in touch with our friendly UK call centre.</p>
                <p>Fix Your Bills <br>
                    R106 109 Gainsborough House <br>
                    Portland Street <br>
                    Manchester M1 6DN
                </p>
                <p>
                    Tel: 0044 (0) 161 222 8282 <br>
                    Email: info@fixyourbills.co.uk <br>
                    Web: www.fixyourbills.co.uk
                </p>
            </div>

        </div>

    </div>
</div>

<?php get_footer() ?>
