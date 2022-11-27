<?php
function race_sidebar(){

  register_sidebar(array(
    'name'          => __( 'Blog Sidebar', 'cp_race_theme' ),
    'id'            => 'sidebar-blog',      
    'description'   => __('Sidebar displayed in the blog and single post pages', 'cp_race_theme'),
    'before_widget' => '<div class="widget %2 clearfix">',
    'after_widget'  => '</div>',
    'before_title'  => '<h6 class="widgettitle"><strong>',
    'after_title'   => '</strong></h6>'
  ));

}

add_action('widgets_init', 'race_sidebar');
?>