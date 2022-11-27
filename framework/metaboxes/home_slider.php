<?php
  global $post;

  $cp_home_slider = get_post_meta($post->ID, 'cp_home_slider', true);

  wp_nonce_field('home_slider_metabox', 'home_slider_metabox');
  ?>
  <div class="cp_metabox">
    <?php  
    if ( $cp_home_slider ) :
    
    foreach ( $cp_home_slider as $field ) {
    ?>
    <div class="cp_slide_box">
      <div class="remove_button">
        <button class="button" type="button" title="Remove Slide ">&times;</button>
      </div>
      <div class="cp_slide_screenshot">
        <img src="<?php if ($field['image'] != '') echo esc_attr( $field['image'] ); ?>">
      </div>
      <div class="cp_slider_field">
        <label>Headline</label>
        <input type="text" class="widefat" name="slide_headline[]" value="<?php if(isset($field['headline']) && $field['headline'] != '') echo esc_attr( $field['headline'] ); ?>" /> 
      </div>
      <div class="cp_slider_field upload_field">
        <label>Image URL</label>
        <input type="text" class="widefat" name="slide_image[]" value="<?php if (isset($field['image']) && $field['image'] != '') echo esc_attr( $field['image'] );?>" />
        <button class="button upload_button" type="button">Browse</button>
      </div>
    </div>
    <?php
    }
    else :
    ?>
    <div class="cp_slide_box">
      <div class="remove_button">
        <button class="button" type="button" title="Remove Slide ">&times;</button>
      </div>
      <div class="cp_slide_screenshot">        
        <img src="">
      </div>
      <div class="cp_slider_field">
        <label>Headline</label>
        <input type="text" class="widefat" name="slide_headline[]"/> 
      </div>
      <div class="cp_slider_field upload_field">
        <label>Image URL</label>
        <input type="text" class="widefat" name="slide_image[]"/>
        <button class="button upload_button" type="button">Browse</button>
      </div>
    </div>
    <?php endif; ?>
  
    <!-- empty hidden one for jQuery -->
    <div class="cp_slide_box empty-row screen-reader-text" id="cloner_field">
      <div class="remove_button">
        <button class="button" type="button" title="Remove Slide ">&times;</button>
      </div>
      <div class="cp_slide_screenshot">        
        <img src="">
      </div>
      <div class="cp_slider_field">
        <label>Headline</label>
        <input type="text" class="widefat" name="slide_headline[]"/> 
      </div>
      <div class="cp_slider_field upload_field">
        <label>Image URL</label>
        <input type="text" class="widefat" name="slide_image[]"/>
        <button class="button upload_button" type="button">Browse</button>
      </div>
    </div>
    <p class="text-right"><a id="add-row" class="button" href="#">Add new slide</a></p>
    <?php
    $this->cp_race_select(
      'slider_animated',
      'Enable animated slider?',
      array(
        'yes' => 'Yes',
        'no'  => 'No'
      )
    );
    $this->cp_race_text(
      'slider_subtitle',
      'Slider Subtitle'
    );
    $this->cp_race_text(
      'slider_button_text',
      'Button text'
    );
    $this->cp_race_text(
      'slider_button_url',
      'Button URL'
    );
    ?>
  </div> 