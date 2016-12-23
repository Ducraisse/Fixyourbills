<?php
$cb_mb = new WPAlchemy_MetaBox(array
(
    'id' => '_block_meta',
    'title' => 'Content Block Shortcode',
    'types' => array('content-blocks'),
    'context' => 'normal', // same as above, defaults to "normal"
    'priority' => 'high', // same as above, defaults to "high"
    'template' => get_stylesheet_directory() . '/metaboxes/content-block-meta.php',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_block_meta_'
));