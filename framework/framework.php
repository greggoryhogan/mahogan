<?php

include 'metaboxes/metaboxes.php';
include 'shortcodes/shortcodes.php';
include 'widgets/widgets.php';
include 'importer/importer.php';

function cp_race_primary_font(){
  global $race_options;

  if (isset($race_options['primary_font_family']) && trim($race_options['primary_font_family']) != '') {
    $primary_font = $race_options['primary_font_family'];
    return $primary_font;
  }
}

function cp_race_secondary_font(){
  global $race_options;

  if (isset($race_options['secondary_font_family']) && trim($race_options['secondary_font_family']) != '') {
    $secondary_font = $race_options['secondary_font_family'];
    return $secondary_font;
  }
}

function cp_race_custom_head(){
  global $race_options;

  $output = '<style type="text/css">';

  if (isset($race_options['primary_font_family']) && trim($race_options['primary_font_family']) != '' && $race_options['primary_font_family'] != '0') {
    $output .= 'body, .more-link, #submit-btn {font-family: '.$race_options['primary_font_family'].', sans-serif;} ';
  }

  if (isset($race_options['secondary_font_family']) && trim($race_options['secondary_font_family']) != '' && $race_options['secondary_font_family'] != '0') {
    $output .= 'p, .home-content h5, .service-tooltip .tooltip-inner, #testimonials-slider li blockquote, .post-body {font-family: '.$race_options['secondary_font_family'].', sans-serif;}';
  }

  if (isset($race_options['text_color']) && trim($race_options['text_color']) != '') {
    $output .= 'body, .more-link {color: '.$race_options['text_color'].';}';
  }

  if (isset($race_options['primary_color']) && trim($race_options['primary_color']) != '') {
    $output .= 'a:hover, #socials > li > a:hover, #topnav.scrolled .navbar-nav > li > a:hover, #topnav .navbar-nav > li .sub-menu > li > a:hover, .plan-icon, .service:hover .service-icon, #filters > li.active, #modal-close:hover, #blog-posts .pagination > li > span.current, .widget ul > li > a:hover, .copyright i  {color: '.$race_options['primary_color'].';}';
    $output .= '.service:hover .service-icon, .owl-theme .owl-controls .owl-buttons .owl-prev:hover, .owl-theme .owl-controls .owl-buttons .owl-next:hover, #footer-social > li > a:hover, .plan hr {border-color: '.$race_options['primary_color'].';}';
    $output .= '.service:hover .service-icon:after, .owl-theme .owl-controls .owl-buttons .owl-prev:hover, .owl-theme .owl-controls .owl-buttons .owl-next:hover, .flex-control-paging li a.flex-active, .owl-theme .owl-controls .owl-page.active span, #footer-social > li > a:hover, .featured, .flex-control-paging li a:hover {background-color: '.$race_options['primary_color'].';}';
    $output .= '@media (max-width: 767px) { #topnav .navbar-nav > li > a:hover, #topnav.scrolled .navbar-nav > li > a:hover {color: '.$race_options['primary_color'].';}';
  }

  if (isset($race_options['custom_css']) && trim($race_options['custom_css']) != '') {
    $output .= $race_options['custom_css'];
  }

  $output .= "</style>\r\n";

  if (isset($race_options['tracking_code']) && trim($race_options['tracking_code']) != '') {
    $output .= $race_options['tracking_code']."\r\n";
  }

  echo $output;
}

add_action('wp_head','cp_race_custom_head');
?>