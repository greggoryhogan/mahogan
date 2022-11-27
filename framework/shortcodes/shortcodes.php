<?php

/**
* Columns Shortcodes
*/


// One Half
function cp_one_half($atts, $content = null){  
  return '<div class="col-md-6 col-sm-12">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_half', 'cp_one_half');

function cp_one_half_last($atts, $content = null){  
  return '<div class="col-md-6 col-sm-12 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_half_last', 'cp_one_half_last');

// One Third
function cp_one_third($atts, $content = null){  
  return '<div class="col-md-4 col-sm-4 col-xs-6">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_third', 'cp_one_third');

function cp_one_third_last($atts, $content = null){  
  return '<div class="col-md-4 col-sm-4 col-xs-6 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_third_last', 'cp_one_third_last');

// Two Third
function cp_two_third($atts, $content = null){  
  return '<div class="col-md-8 col-sm-8">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('two_third', 'cp_two_third');

function cp_two_third_last($atts, $content = null){  
  return '<div class="col-md-8 col-sm-8 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('two_third_last', 'cp_two_third_last');

// One Fourth
function cp_one_fourth($atts, $content = null){  
  return '<div class="col-md-3 col-sm-6">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_fourth', 'cp_one_fourth');

function cp_one_fourth_last($atts, $content = null){  
  return '<div class="col-md-3 col-sm-6 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_fourth_last', 'cp_one_fourth_last');

// Three Fourth
function cp_three_fourth($atts, $content = null){  
  return '<div class="col-md-9 col-sm-6">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('three_fourth', 'cp_three_fourth');

function cp_three_fourth_last($atts, $content = null){  
  return '<div class="col-md-9 col-sm-6 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('three_fourth_last', 'cp_three_fourth_last');

// One Sixth
function cp_one_sixth($atts, $content = null){  
  return '<div class="col-md-2 col-sm-4">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_sixth', 'cp_one_sixth');

function cp_one_sixth_last($atts, $content = null){  
  return '<div class="col-md-2 col-sm-4 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_sixth_last', 'cp_one_sixth_last');

// Five Sixth
function cp_five_sixth($atts, $content = null){  
  return '<div class="col-md-10 col-sm-8">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('five_sixth', 'cp_five_sixth');

function cp_five_sixth_last($atts, $content = null){  
  return '<div class="col-md-10 col-sm-8 last">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('five_sixth_last', 'cp_five_sixth_last');

// One Whole
function cp_one_whole($atts, $content = null){  
  return '<div class="col-md-12 col-sm-12">' . preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)) . '</div>';
}
add_shortcode('one_whole', 'cp_one_whole');

/**
* Elements Shortcodes
*/

// Icon Boxes
function cp_icon_box($atts, $content){
  extract(shortcode_atts(
    array(
      'icon'      => '',
      'title'     => '',
      'content'   => !empty($content)? $content : ''
    ), $atts
  ));  

  $icon_box = '<div class="about-box">';
  $icon_box .= '<div class="ab-icon">';
  $icon_box .= '<i class="'.$icon.'"></i>';
  $icon_box .= '</div>';
  $icon_box .= '<div class="ab-content">';
  $icon_box .= '<h4>'.$title.'</h4>';
  $icon_box .= '<p>'.$content.'</p>';
  $icon_box .= '</div>';
  $icon_box .= '</div>';

  return $icon_box;
}

add_shortcode('icon_box', 'cp_icon_box');

// Counters
function cp_counter($atts, $content = null){
  extract(shortcode_atts(
    array(
      'number'    => '',
      'icon'      => '',
      'title'     => '',
      'animation' => '',
      'delay'     => ''
    ), $atts
  ));  

  $counter = '<div class="counter';
  if ($animation) {
    $counter .= ' animated" data-animation="'.$animation.'" data-delay="'.$delay.'">';
  } else{
    $counter .= '">';
  }
  $counter .= '<div class="counter-icon">';
  $counter .= '<i class="'.$icon.'"></i>';
  $counter .= '</div>';
  $counter .= '<div class="counter-content">';
  $counter .= '<span class="value" data-from="0" data-to="'.$number.'">'.$number.'</span>';
  $counter .= '<small>'.$title.'</small>';
  $counter .= '</div>';
  $counter .= '</div>';

  return $counter;
}

add_shortcode('counter', 'cp_counter');

// Slideshow

function cp_slideshow($atts, $content){
  extract(shortcode_atts(
    array(
      'content'     => !empty($content)? htmlspecialchars_decode($content) : ''
    ), $atts
  ));

  
  $slideshow = '<div class="project-media">';
  $slideshow .= '<div id="project-slider" class="flexslider">';
  $slideshow .= '<ul class="slides">'.preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content)).'</ul>';
  $slideshow .= '</div>';
  $slideshow .= '</div>';

  return $slideshow;
}

add_shortcode('slideshow', 'cp_slideshow');


// Image slides

function cp_slide($atts, $content = null){
  extract(shortcode_atts(
    array(
      'image' => ''
    ), $atts
  ));

  $slide_image = wp_get_attachment_image_src(cp_race_get_image_id_from_url($image), 'portfolio_image');
  return '<li><img src="'.esc_attr($slide_image[0]).'" alt=""></li>';
}

add_shortcode('slide', 'cp_slide');

// Videos

function cp_video($atts, $content){
  extract(shortcode_atts(
    array(
      'url' => '',
      'content'   => !empty($content)? $content : ''
    ), $atts
  ));

  $video = '<div class="project-media">';
  $video .= '<div class="video-container">';
  $video .= preg_replace('#^<\/p>|<p>$#', '', do_shortcode($content));
  $video .= '</div>';
  $video .= '</div>';

  return $video;
}

add_shortcode('video_embed', 'cp_video');

// Services Carousel

function cp_services_carousel($atts, $content){
  extract(shortcode_atts(
    array(
      'content'     => !empty($content)? htmlspecialchars_decode($content) : ''
    ), $atts
  ));

  $services_content = str_replace('<p>', '', $content);
  $services_content = str_replace('</p>', '', $services_content);
  
  $services_carousel = '<div id="services-carousel" class="owl-carousel">';
  $services_carousel .= do_shortcode($services_content);
  $services_carousel .= '</div>';

  return $services_carousel;
}

add_shortcode('services_carousel', 'cp_services_carousel');

// Services

function cp_service($atts, $content){
  extract(shortcode_atts(
    array(
      'icon'      => '',
      'title'     => '',
      'content'   => !empty($content)? $content : ''
    ), $atts
  ));  

  $service = '<div class="service" data-toggle="tooltip" data-original-title="'.$content.'">';
  $service .= '<div class="service-icon">';
  $service .= '<i class="'.$icon.'"></i>';
  $service .= '</div>';
  $service .= '<h4>'.$title.'</h4>';
  $service .= '</div>';

  return $service;
}

add_shortcode('service', 'cp_service');

// Team Members

function cp_team_member($atts, $content){
  extract(shortcode_atts(
    array(
      'photo'     => '',
      'name'      => '',
      'position'  => '',
      'facebook'  => '',
      'twitter'   => '',
      'linkedin'  => '',
      'content'   => !empty($content)? $content : ''
    ), $atts
  ));

  $team_image = wp_get_attachment_image_src(cp_race_get_image_id_from_url($photo), 'team_member');

  $team_member = '<div class="member">';
  $team_member .= '<div class="member-avatar">';
  $team_member .= '<img src="'.esc_attr($team_image[0]).'" alt="">';
  $team_member .= '<div class="member-overlay">';
  $team_member .= '<div class="vcenter">';
  $team_member .= '<div class="centrize">';
  if ($facebook || $twitter || $linkedin) {
    $team_member .= '<ul class="member-social">';
    if($facebook){
      $team_member .= '<li><a title="Facebook" href="'.esc_url($facebook).'" target="_blank"><i class="icon-facebook"></i></a></li>';
    }
    if($twitter){
      $team_member .= '<li><a title="Twitter" href="'.esc_url($twitter).'" target="_blank"><i class="icon-twitter"></i></a></li>';
    }
    if($linkedin){
      $team_member .= '<li><a title="Linkedin" href="'.esc_url($linkedin).'" target="_blank"><i class="icon-linkedin"></i></a></li>';
    }
    $team_member .= '</ul>';
  }
  $team_member .= '</div>';
  $team_member .= '</div>';
  $team_member .= '</div>';
  $team_member .= '</div>';
  $team_member .= '<div class="member-info">';
  $team_member .= '<h4>'.$name.'</h4>';
  $team_member .= '<h6>'.$position.'</h6>';
  $team_member .= '<p>'.$content.'</p>';
  $team_member .= '</div>';
  $team_member .= '</div>';

  return $team_member;
}

add_shortcode('team_member', 'cp_team_member');

// Pricing Tables

function cp_pricing_table($atts, $content){
  extract(shortcode_atts(
    array(
      'title'             => '',
      'currency'          => '$',
      'price'             => '0',
      'featured'          => '',
      'featured_text'     => 'Popular',
      'button_text'       => 'Sign Up',
      'button_url'        => '#',
      'content'           => !empty($content)? htmlspecialchars_decode($content) : ''
    ), $atts
  ));

  $pricing_table = '<div class="plan';
  if ($featured == 'yes') {
    $pricing_table .= ' highlight';
  }
  $pricing_table .= '">';
  if ($featured == 'yes') {
    $pricing_table .= '<div class="featured">'.$featured_text.'</div>';
  }
  $pricing_table .= '<div class="plan-icon"><i class="icon-tag"></i></div>';
  $pricing_table .= '<div class="price"><span>'. $currency . $price .'</span></div>';
  $pricing_table .= '<h4>'.$title.'</h4>';
  $pricing_table .= '<hr>';  
  $pricing_table .= '<ul class="nav">'.$content.'</ul>';
  if ($button_text) {
    $pricing_table .= '<div class="plan-footer"><a class="btn btn-dark" href="'.esc_url($button_url).'">'.$button_text.'</a></div>';
  }
  $pricing_table .= '</div>';

  return $pricing_table;
}

add_shortcode('pricing_table', 'cp_pricing_table');

// Testimonial Slider

function cp_testimonials_slider($atts, $content){
  extract(shortcode_atts(
    array(
      'content'     => !empty($content)? $content : ''
    ), $atts
  ));

  $testimonial_content = str_replace('<p>', '', $content);
  $testimonial_content = str_replace('</p>', '', $testimonial_content);

  
  $testimonials_slider = '<div id="testimonials-slider" class="flexslider">';
  $testimonials_slider .= '<ul class="slides">';
  $testimonials_slider .= do_shortcode($testimonial_content);
  $testimonials_slider .= '</ul>';
  $testimonials_slider .= '</div>';

  return $testimonials_slider;
}

add_shortcode('testimonials_slider', 'cp_testimonials_slider');

// Testimonials

function cp_testimonial($atts, $content){
  extract(shortcode_atts(
    array(
      'photo'   => '',
      'client'  => '',      
      'content' => !empty($content)? $content : ''
    ), $atts
  ));

  $testimonial_image = wp_get_attachment_image_src(cp_race_get_image_id_from_url($photo), 'team_member');

  $testimonial = '<li>';
  $testimonial .= '<img src="'.esc_attr($testimonial_image[0]).'" alt="">';
  $testimonial .= '<blockquote>'.$content.'</blockquote>';
  $testimonial .= '<p>'.$client.'</p>';
  $testimonial .= '</li>';

  return $testimonial;

}

add_shortcode('testimonial', 'cp_testimonial');

// Clients

function cp_client($atts, $content = null){
  extract(shortcode_atts(
    array(
      'logo'      => '',
      'animation' => '',
      'delay'     => ''
    ), $atts
  ));

  $client = '<div class="client';
  if ($animation) {
    $client .= ' animated" data-animation="'.$animation.'" data-delay="'.$delay.'">';
  } else{
    $client .= '">';
  }
  $client .= '<img src="'.esc_attr($logo).'" alt="">';
  $client .= '</div>';

  return $client;
}

add_shortcode('client', 'cp_client');


/**
* Register Shortcode Button
*/

function init_button(){
  if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
    add_filter('mce_buttons', 'filter_mce_button');
    add_filter('mce_external_plugins', 'filter_mce_plugin');
  }
}
 
add_action('admin_init', 'init_button');
 
function filter_mce_button( $buttons ) {
  array_push( $buttons, '|', 'cp_popup' );
  return $buttons;
}
 
function filter_mce_plugin( $plugins ) {
    $plugins['cp_popupbutton'] = get_template_directory_uri() . '/framework/shortcodes/editor.js';
    return $plugins;
}

?>