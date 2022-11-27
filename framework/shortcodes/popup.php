<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

// Access WordPress
require_once( $path_to_wp . '/wp-load.php' );

$animations = array('none', 'bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig', 'flip', 'flipInX', 'flipInY', 'lightSpeedIn', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'slideInDown', 'slideInLeft', 'slideInRight', 'hinge', 'rollIn');

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/framework/css/shortcodes.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fontello.css">

  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/framework/js/shortcodes.js"></script>
</head>
<body>
  <div id="cp_shortcode_box">
    <div class="cp_shortcode_field">
      <label>Shortcode</label>
      <div class="field">
        <select id="cp_shortcode_type" class="form-control">
          <option value="">Choose a shortcode</option>
          <optgroup label="Columns">
            <option data-type="column" value="one_half">One Half (1/2)</option>
            <option data-type="column" value="one_third">One Third (1/3)</option>
            <option data-type="column" value="two_third">Two Third (2/3)</option>
            <option data-type="column" value="one_fourth">One Fourth (1/4)</option>
            <option data-type="column" value="three_fourth">Three Fourth (3/4)</option>
            <option data-type="column" value="one_sixth">One Sixth (1/6)</option>
            <option data-type="column" value="five_sixth">Five Sixth (5/6)</option>
            <option data-type="column" value="one_whole">One Whole (1/1)</option>
          </optgroup>
          <optgroup label="Elements">
            <option data-type="icon_box" value="icon_box">Icon Box</option>
            <option data-type="counter" value="counter">Counter</option>
            <option data-type="slideshow" value="slideshow">Project Slideshow</option>
            <option data-type="slide" value="slide">Project Slide</option>
            <option data-type="video" value="video">Project Video</option>
            <option data-type="services_carousel" value="services_carousel">Services Carousel</option>
            <option data-type="team_member" value="team_member">Team Member</option>
            <option data-type="pricing_table" value="pricing_table">Pricing Table</option>
            <option data-type="testimonials_slider" value="testimonial_slider">Testimonial Slider</option>
            <option data-type="testimonial" value="testimonial">Testimonial</option>
            <option data-type="client" value="client">Client</option>
          </optgroup>
        </select>
      </div>
    </div>
    <div id="cp_shortcode_column" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Last column</label>
        <div class="field">
          <input type="checkbox" value="yes" id="cp_is_last_column">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Content</label>
        <div class="field">
          <textarea class="form-control" id="cp_column_content"></textarea>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_icon_box" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Title</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_icon_box_title">
        </div>        
      </div>
      <div class="cp_shortcode_field">
        <label>Icon</label>
        <div class="field">
          <?php include 'icons/fonts.php'; ?>          
        </div>
        <input type="hidden" class="cp_shortcode_icon">
      </div>
      <div class="cp_shortcode_field">
        <label>Text</label>
        <div class="field">
          <textarea class="form-control" id="cp_icon_box_text"></textarea>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_counter" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Number</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_counter_number">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Title</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_counter_title">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Icon</label>
        <div class="field">
          <?php include 'icons/fonts.php'; ?>          
        </div>
        <input type="hidden" class="cp_shortcode_icon">
      </div>      
      <div class="cp_shortcode_field">
        <label>Animation</label>
        <div class="field">
          <select class="cp_animation" class="form-control">
            <?php foreach ($animations as $option) { ?>
            <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Animation Delay</label>
        <div class="field">
          <input type="text" class="form-control cp_animation_delay">
        </div>
      </div>
    </div>
    <div id="cp_shortcode_slideshow" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Content</label>
        <div class="field">
          <textarea class="form-control" id="cp_slideshow_content"></textarea>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_slide" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Image</label>
        <div class="field upload_field">
          <img src="" class="cp_preview">
          <input type="hidden" class="form-control" id="cp_slide_image">
          <button class="button upload_button" type="button">Browse</button>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_video" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Video URL</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_video_url">
        </div>
      </div>
    </div>
    <div id="cp_shortcode_services_carousel" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Content</label>
        <div class="field">
          <textarea class="form-control" id="cp_services_carousel_content"></textarea>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_team_member" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Photo</label>
        <div class="field upload_field">
          <img src="" class="cp_preview">
          <input type="hidden" class="form-control" id="cp_team_member_photo">
          <button class="button upload_button" type="button">Browse</button>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Name</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_team_member_name">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Position</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_team_member_position" placeholder="e.g. Web Developer">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Description</label>
        <div class="field">
          <textarea class="form-control" id="cp_team_member_description"></textarea>
        </div>
      </div>      
      <div class="cp_shortcode_field">
        <label>Facebook URL</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_team_member_facebook" placeholder="Include http://">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Twitter URL</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_team_member_twitter" placeholder="Include http://">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Linkedin URL</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_team_member_linkedin" placeholder="Include http://">
        </div>
      </div>
    </div>
    <div id="cp_shortcode_pricing_table" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Title</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_title">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Currency</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_currency" placeholder="e.g. $">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Price</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_price">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Featured?</label>
        <div class="field">
          <input type="checkbox" id="cp_pricing_table_featured">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Featured Text</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_featured_text">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Button text</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_button_text">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Button URL</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_pricing_table_button_url">
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Feature</label>
        <div class="field">
          <div class="feature-control empty-row screen-reader-text">
            <input type="text" class="form-control cp_pricing_table_feature" placeholder="Add a feature..">
            <button title="Remove Feature" type="button" class="button feature-remover">&times;</button>
          </div>
          <div class="feature-control">
            <input type="text" class="form-control cp_pricing_table_feature" placeholder="Add a feature..">
            <button title="Remove Feature" type="button" class="button feature-remover">&times;</button>
          </div>
          <button type="button" class="button" id="feature-cloner">Add another feature</button>
        </div>
      </div>      
    </div>
    <div id="cp_shortcode_testimonials_slider" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Content</label>
        <div class="field">
          <textarea class="form-control" id="cp_testimonial_slider_content"></textarea>
        </div>
      </div>
    </div>
    <div id="cp_shortcode_testimonial" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Photo</label>
        <div class="field upload_field">
          <img src="" class="cp_preview">
          <input type="hidden" class="form-control" id="cp_testimonial_photo">
          <button class="button upload_button" type="button">Browse</button>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Content</label>
        <div class="field">
          <textarea class="form-control" id="cp_testimonial_content"></textarea>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Client</label>
        <div class="field">
          <input type="text" class="form-control" id="cp_testimonial_client">
        </div>
      </div>      
    </div>
    <div id="cp_shortcode_client" class="cp_shortcode_section">
      <div class="cp_shortcode_field">
        <label>Logo</label>
        <div class="field">
          <img src="" class="cp_preview">
          <input type="hidden" class="form-control" id="cp_client_logo">
          <button class="button upload_button" type="button">Browse</button>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Animation</label>
        <div class="field">
          <select class="cp_animation" class="form-control">
            <?php foreach ($animations as $option) { ?>
            <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="cp_shortcode_field">
        <label>Animation Delay</label>
        <div class="field">
          <input type="text" class="form-control cp_animation_delay">
        </div>
      </div>
    </div>
    <div class="cp_shortcode_button">
      <button type="button" class="button button-primary" id="add_shortcode">Insert shortcode</button>
    </div>
  </div>
</body>
</html>