<?php
/*
Template Name: One Page
*/

get_header();

$args = array('post_type' => 'page', 'orderby'=> 'menu_order', 'posts_per_page' => '-1', 'order' => 'ASC');
$sectionquery = new WP_query($args);
if( $sectionquery->have_posts()) :
  while ($sectionquery->have_posts()) : $sectionquery->the_post();
    if ($post->ID != $cp_race_page_on_front && $post->post_parent == $cp_race_page_on_front) {
      get_template_part('includes/section');
    }  
  endwhile;
endif;
wp_reset_query();


get_footer();
?>