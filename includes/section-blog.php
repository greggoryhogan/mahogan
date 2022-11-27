<?php

$section_title = get_post_meta($post->ID, 'cp_blog_section_title', true);
$section_subtitle = get_post_meta($post->ID, 'cp_blog_section_subtitle', true);
$posts_page = get_option('page_for_posts');

?>
<section id="<?php echo $post->post_name; ?>">
  <div class="container">
    <?php if ($section_title): ?>
      <div class="title center">
        <h2><?php echo $section_title; ?></h2>
        <?php if ($section_subtitle): ?>
        <p><?php echo $section_subtitle; ?></p>
        <?php endif ?>
      </div>
    <?php endif ?>
    <?php
    $args = array('post_type' => 'post', 'orderby'=> 'post__in', 'posts_per_page' => '6', 'order' => 'ASC');
    $mainquery = new WP_query($args);
    if( $mainquery->have_posts()) : ?>
    <div id="blog-carousel" class="owl-carousel">
    <?php while ($mainquery->have_posts()) : $mainquery->the_post(); ?>
      <div class="post-preview">
        <?php if( has_post_thumbnail() ){
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'blog_thumb'); ?>
        <div class="preview-post-thumbnail">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_attr($thumbnail[0]); ?>" alt="">
          </a>
        </div>
        <?php } ?> 
        <div class="preview-body">
          <p class="post-category"><?php the_category(', '); ?></p>
          <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
          <hr>
          <?php the_excerpt(); ?>
          <span class="post-date"><a href="<?php the_permalink(); ?>"><?php the_time('M d, Y'); ?></a></span>
        </div>  
      </div>
    <?php endwhile;?>
    </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
    <div class="more-posts">
      <?php if ($posts_page): ?>
      <a class="btn btn-dark" href="<?php home_url();?>?page_id=<?php echo $posts_page; ?>">View More</a>
      <?php else: ?>
      <p><?php _e('Warning: you have to set the Posts Page in your "Reading Settings"', 'cp_race_theme'); ?>.</p>
      <?php endif; ?>
    </div>
  </div>
</section>