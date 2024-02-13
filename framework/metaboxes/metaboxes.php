<?php

class CPMetaboxes{
  
  function __construct()
  {
    $this->cp_race_metaboxes();
  }

  function cp_race_metaboxes(){
    add_action('add_meta_boxes', array($this, 'cp_race_add_meta_boxes'));
    add_action('save_post', array($this, 'save_meta_boxes'));
    add_action('admin_enqueue_scripts', array($this, 'cp_race_admin_scripts'));
  }

  function cp_race_admin_scripts(){
    if (is_admin()) {
      wp_enqueue_media();

      wp_register_style('cp_metabox_style', get_template_directory_uri().'/framework/css/metaboxes.css');
      wp_enqueue_style('cp_metabox_style');
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

      wp_register_script('cp_metabox_script', get_template_directory_uri().'/framework/js/metaboxes.js');
      wp_enqueue_script('cp_metabox_script');
      wp_enqueue_script('wp-color-picker');    
      wp_enqueue_script('jquery-ui-datepicker');  
    }
  }

  public function cp_race_add_meta_boxes(){
    $this->cp_race_add_meta_box('cp_race_page_options', 'Page Options', 'page');    
    $this->cp_race_add_meta_box('cp_race_page_options_home', 'Home Section Options', 'page');
    $this->cp_race_add_meta_box('cp_race_home_slider', 'Home Slider', 'page');
    $this->cp_race_add_meta_box('cp_race_about_slider', 'About Slider', 'page');
    $this->cp_race_add_meta_box('cp_race_page_options_default', 'Default Section Options', 'page');
    $this->cp_race_add_meta_box('cp_race_page_options_split', 'Split Section Options', 'page');
    $this->cp_race_add_meta_box('cp_race_page_options_blog', 'Blog Section Options', 'page');
    $this->cp_race_add_meta_box('cp_race_page_options_contact', 'Contact Section Options', 'page');
    $this->cp_race_add_meta_box('cp_race_page_options_index', 'Blog Page Options', 'page');
  }

  public function cp_race_add_meta_box($id, $label, $post_type){
    add_meta_box('cp_' . $id, $label, array(&$this, $id), $post_type);
  }  

  public function save_meta_boxes($post_id){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    if (isset($_POST['home_slider_metabox']) && wp_verify_nonce( $_POST['home_slider_metabox'], 'home_slider_metabox' )) {

      $old = get_post_meta($post_id, 'cp_home_slider', true);
      $new = array();

      $headlines = $_POST['slide_headline'];
      $images = $_POST['slide_image'];    

      $count = count($headlines);

      for ( $i = 0; $i < $count; $i++ ) {
        if ( $headlines[$i] != '' ) {
          $new[$i]['headline'] = stripslashes( strip_tags( $headlines[$i] ) );        
        }     
        if ( $images[$i] != '' ) {
          $new[$i]['image'] = stripslashes( $images[$i] );
        }
      }

      if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'cp_home_slider', $new );
      elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'cp_home_slider', $old );
    }
    foreach($_POST as $key => $value) {
      if(strstr($key, 'cp_') && $key != 'cp_home_slider') {
        update_post_meta($post_id, $key, $value);
      }
    }
  }

  public function cp_race_page_options(){
    include 'page_options.php';
  }  

  public function cp_race_page_options_home(){
    include 'page_options_home.php';
  }

  public function cp_race_home_slider(){
    include 'home_slider.php';
  }

  public function cp_race_page_options_default(){
    include 'page_options_default.php';
  }

  public function cp_race_page_options_split(){
    include 'page_options_split.php';
  }

  public function cp_race_page_options_blog(){
    include 'page_options_blog.php';
  }

  public function cp_race_page_options_contact(){
    include 'page_options_contact.php';
  }

  public function cp_race_page_options_index(){
    include 'page_options_index.php';
  }

  public function cp_race_text($id, $label){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label for="cp_<?php echo $id; ?>"><?php echo $label ?></label>
      <div class="field">
        <input type="text" id="cp_<?php echo $id; ?>" name="cp_<?php echo $id; ?>" value="<?php echo esc_attr(get_post_meta($post->ID, 'cp_' . $id, true)); ?>">
      </div>
    </div>
    <?php
  }

  public function cp_race_date($id, $label){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label for="cp_<?php echo $id; ?>"><?php echo $label ?></label>
      <div class="field">
        <input class="date-picker" type="text" id="cp_<?php echo $id; ?>" name="cp_<?php echo $id; ?>" value="<?php echo esc_attr(get_post_meta($post->ID, 'cp_' . $id, true)); ?>">
      </div>
    </div>
    <?php
  }

  public function cp_race_textarea($id, $label){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label for="cp_<?php echo $id; ?>"><?php echo $label ?></label>
      <div class="field">
        <textarea id="cp_<?php echo $id; ?>" name="cp_<?php echo $id; ?>"><?php echo esc_attr(get_post_meta($post->ID, 'cp_' . $id, true)); ?></textarea>
      </div>
    </div>
    <?php
  }

  public function cp_race_select($id, $label, $options){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label for="cp_<?php echo $id; ?>"><?php echo $label ?></label>
      <div class="field">
        <select id="cp_<?php echo $id; ?>" name="cp_<?php echo $id; ?>">
          <?php
            foreach ($options as $key => $option) {
              if(get_post_meta($post->ID, 'cp_' . $id, true) == $key) {
                $selected = 'selected="selected"';
              } else {
                $selected = '';
              }
              ?>
              <option <?php echo $selected; ?> value="<?php echo $key; ?>"><?php echo $option ?></option>
              <?php
            }
          ?>
        </select>
      </div>
    </div>
    <?php
  }

  public function cp_race_radio($id, $label, $options){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label><?php echo $label ?></label>
      <div class="field">
        <?php
          foreach ($options as $key => $option) {
            if(get_post_meta($post->ID, 'cp_' . $id, true) == $key) {
              $selected = 'checked="checked"';
            } else {
              $selected = '';
            }
            ?>
            <label for="cp_<?php echo $id .'_'. $key; ?>">
              <input type="radio" id="cp_<?php echo $id .'_'. $key; ?>" name="cp_<?php echo $id; ?>" <?php echo $selected; ?> value="<?php echo $key; ?>">
              <?php echo $option ?>
            </label>
            <?php
          }
        ?>
      </div>
    </div>
    <?php
  }

  public function cp_race_checkbox($id, $label, $options){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label><?php echo $label ?></label>
      <div class="field">
        <?php
          foreach ($options as $key => $option) {
            if(get_post_meta($post->ID, 'cp_' . $id, true) == $key) {
              $selected = 'checked="checked"';
            } else {
              $selected = '';
            }
            ?>
            <label for="cp_<?php echo $id .'_'. $key; ?>">
              <input type="checkbox" id="cp_<?php echo $id .'_'. $key; ?>" name="cp_<?php echo $id; ?>" <?php echo $selected; ?> value="<?php echo $key; ?>">
              <?php echo $option ?>
            </label>
            <?php
          }
        ?>
      </div>
    </div>
    <?php
  }

  public function cp_race_upload($id, $label){
    global $post;
    ?>
    <div class="cp_field" id="cp_<?php echo $id; ?>_field">
      <label for="cp_<?php echo $id; ?>"><?php echo $label ?></label>
      <div class="field upload_field">
        <input type="text" id="cp_<?php echo $id; ?>" name="cp_<?php echo $id; ?>" value="<?php echo esc_attr(get_post_meta($post->ID, 'cp_' . $id, true)); ?>">
        <button class="button upload_button" type="button"><?php _e('Browse', 'cp_race_theme'); ?></button>
      </div>
    </div>
    <?php
  }
}

$metaboxes = new CPMetaboxes;

?>