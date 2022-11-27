<?php

if (!function_exists('cp_import_data')) {
  function cp_import_data($file){
    
    include('wp-importer/wordpress-importer.php');

    // Import Content
    $cp_import = new WP_Import();
    $demo_file = get_template_directory() . '/framework/importer/demo.xml';    

    if (file_exists($demo_file)) {
      $cp_import->fetch_attachments = true; ob_start();
      $cp_import->import($demo_file); ob_end_clean();      
    }

    // Update Reading Settings
    $onepage  = get_page_by_title('One Page');
    $blogpage = get_page_by_title('Blog');
    if( isset($onepage->ID) && isset($blogpage->ID) ) {
      update_option('show_on_front', 'page');
      update_option('page_on_front',  $onepage->ID); 
      update_option('page_for_posts', $blogpage->ID); 
    }

    // Update Postmeta
    global $wpdb;
    $from_url = 'http://race.codepark.co/demo';    
    $to_url = home_url();
    $uploads_url = 'http://race.codepark.co/demo/wp-content/uploads/sites/3';
    $new_uploads_url = esc_url_raw(home_url() . '/wp-content/uploads');
    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET meta_value = REPLACE(meta_value, %s, %s) WHERE meta_key !='cp_home_slider'", $uploads_url, $new_uploads_url));
    $wpdb->query($wpdb->prepare("UPDATE {$wpdb->postmeta} SET meta_value = REPLACE(meta_value, %s, %s) WHERE meta_key !='cp_home_slider'", $from_url, $to_url));    

    $home_slider_id = $wpdb->get_var("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'cp_home_slider'");
    $home_slider = get_post_meta($home_slider_id, 'cp_home_slider', true);    
    $headlines = array();
    $images = array();

    foreach ($home_slider as $slider) {
      $headlines[] = $slider['headline'];
      $images[] = $slider['image'];
    }

    $new = array();
    for ($i=0; $i < count($headlines) ; $i++) { 
      $new[$i]['headline'] = $headlines[$i];
      $new[$i]['image'] = esc_url_raw(str_replace($uploads_url, $new_uploads_url, $images[$i]));
    }
    update_post_meta($home_slider_id, 'cp_home_slider', $new);

    $locations = get_theme_mod('nav_menu_locations');
    $locations['primary'] = '19';
    set_theme_mod('nav_menu_locations', $locations);

    update_option('cp_demo_data_imported', '1');
  }
}

add_action('wp_ajax_cp_import_data', 'cp_import_data');
?>