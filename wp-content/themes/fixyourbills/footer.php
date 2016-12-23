<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Scriptable
 * @since Scriptable 1.0
 */
?>





<footer>

    <div class="social">
        <a href="#">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="#">
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </a>
        <a href="#">
            <i class="fa fa-wifi" aria-hidden="true"></i>
        </a>
    </div>
    <div class="copyright-section">
        <p>© Fix Your Bills. All rights reserved</p>
        <p>Site by <a href="#">Dayfive Digtial</a></p>
    </div>

</footer>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/smooth-scroll.js"></script>


<?php wp_footer(); ?>
</div> <!-- closing row -->
</div> <!-- closing container-fluid -->
</body>
</html>
