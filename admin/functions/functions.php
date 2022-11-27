<?php

function race_init(){
  register_post_type(
    'portfolio',
    array(
      'labels' => array(
        'name'          => 'Portfolio',
        'singular_name' => 'Portfolio'
      ),
      'public'      => true,
      'has_archive' => true,
      'supports'    => array('title','thumbnail','editor')
    )
  );

  register_taxonomy(
    'portfolio_category',
    'portfolio',
    array(
      'hierarchical' => true,
      'label'        => 'Categories',
      'query_var'    => true,
      'rewrite'      => true
    )
  );
}

add_action('init', 'race_init');

function custom_flush_rules(){
  //defines the post type so the rules can be flushed.
  custom_post_type_function();

  //and flush the rules.
  flush_rewrite_rules();
}

add_action('after_theme_switch', 'custom_flush_rules');

?>