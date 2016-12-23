<?php
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    } endif;
?>
<?php // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');
?>
<?php
/**
 * Scriptable functions and definitions
 *
 * @package WordPress
 * @subpackage Scriptable
 * @since Scriptable 1.0
 */

//Include Stylesheet

if ( ! is_admin() ) {
    wp_enqueue_style('scriptable', get_template_directory_uri() . '/style.css');

    //Include Jquery
    wp_enqueue_script('jquery');

    //Include Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');

    wp_enqueue_script('jasny-bootstrap', get_template_directory_uri() . '/js/jasny-bootstrap.min.js');

    wp_enqueue_script('bx', get_template_directory_uri() . '/js/jquery.bxslider.min.js');

    //Include Font Awesome
    wp_enqueue_script( 'prefix-font-awesome', 'https://use.fontawesome.com/f0222dbcde.js' );

    //Include Google fonts Roboto
    wp_enqueue_style('google-fonts', "//fonts.googleapis.com/css?family=Roboto");
}

//Add WP Menu Support

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

//Add Thumbnail Support

add_theme_support( 'post-thumbnails' );

/*
 * Build 9 items for homepage, from categories & twitter
 */
function get_home_latest()
{

    $list = array();


    $tweets = get_twitter_statuses( 'StockTwits' );

    if( is_array( $tweets ) ) :
        $i = 0;
        foreach( $tweets as $tweet ) :
            $list['tweet'][$i] = array(
                'text' => $tweet->text,
                'url' => 'http://twitter.com/statuses/'.$tweet->id,
                'posted' => time_elapsed_string( strtotime($tweet->created_at) )
            );
            $i++;
        endforeach;
    endif;

    wp_reset_postdata();

    return $list;

}

function get_twitter_statuses( $username, $count = 2  ) {

    $consumer_key = 'yUMxtlSoppHK5m1xiQvwNw';
    $consumer_secret = 'qktEyLTBDpoZ5GSyhUbbdZtDBn1hCYbiYRVK9uPtgsY';
    $token = '106095696-OHKy7eF6YzPio8WZ62k8E1osKicmHG61xBasIywS';
    $token_secret = 'd6LncScIFiTDB8E9kC6hWPeH5O53JPTzH5gWB2YU';

    $host = 'api.twitter.com';
    $method = 'GET';
    $path = '/1.1/statuses/user_timeline.json'; // api call path

    $query = array( // query parameters
        'screen_name' => $username,
        'count' => $count
    );

    $oauth = array(
        'oauth_consumer_key' => $consumer_key,
        'oauth_token' => $token,
        'oauth_nonce' => (string)mt_rand(), // a stronger nonce is recommended
        'oauth_timestamp' => time(),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_version' => '1.0'
    );

    $oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
    $query = array_map("rawurlencode", $query);

    $arr = array_merge($oauth, $query); // combine the values THEN sort

    asort($arr); // secondary sort (value)
    ksort($arr); // primary sort (key)

    // http_build_query automatically encodes, but our parameters
    // are already encoded, and must be by this point, so we undo
    // the encoding step
    $querystring = urldecode(http_build_query($arr, '', '&'));

    $url = "https://$host$path";

    // mash everything together for the text to hash
    $base_string = $method . "&" . rawurlencode($url) . "&" . rawurlencode($querystring);

    // same with the key
    $key = rawurlencode($consumer_secret) . "&" . rawurlencode($token_secret);

    // generate the hash
    $signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

    // this time we're using a normal GET query, and we're only encoding the query params
    // (without the oauth params)
    $url .= "?" . http_build_query($query);
    $url = str_replace("&amp;", "&", $url); //Patch by @Frewuill

    $oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
    ksort($oauth); // probably not necessary, but twitter's demo does it

    // also not necessary, but twitter's demo does this too
    function add_quotes($str)
    {
        return '"' . $str . '"';
    }

    $oauth = array_map("add_quotes", $oauth);

    // this is the full value of the Authorization line
    $auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

    // if you're doing post, you need to skip the GET building above
    // and instead supply query parameters to CURLOPT_POSTFIELDS
    $options = array(CURLOPT_HTTPHEADER => array("Authorization: $auth"),
        //CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false);

    // do our business
    $feed = curl_init();
    curl_setopt_array($feed, $options);
    $json = curl_exec($feed);
    curl_close($feed);

    $twitter_data = json_decode($json);

    return $twitter_data;
}

function time_elapsed_string($ptime) {
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}

//Include WP Alchemy & Metabox

include_once get_template_directory() . '/metaboxes/wp-alchemy/metabox.php';
include_once get_template_directory() . '/metaboxes/content-block-spec.php';

//Add Content Blocks

require get_template_directory() . '/content-blocks.php';