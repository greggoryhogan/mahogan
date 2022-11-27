<div id="post-<?php echo $post->ID; ?>" <?php post_class('post'); ?>>
  <?php if (is_sticky($post->ID)): ?>
    <div class="sticky-post">
      <p><?php _e('Featured', 'cp_race_theme'); ?></p>
    </div>    
  <?php endif ?>
  <div class="post-title">
    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
    <p class="post-info">
      <?php if (get_post_format() != ''): ?>
        <span class="post-format format-<?php echo get_post_format(); ?>">
          <a class="entry-format" href="<?php echo esc_url( get_post_format_link(get_post_format()) ); ?>"><?php echo get_post_format_string(get_post_format()); ?></a>
        </span>
        <span class="dot"></span>      
      <?php endif ?>
      <span class="post-author"><?php _e('Posted by', 'cp_race_theme'); ?> <?php the_author_link(' - '); ?></span>
      <span class="dot"></span>
      <a href="<?php the_permalink(); ?>"><span class="post-date"><?php the_time('M d, Y'); ?></span></a>
      <span class="dot"></span>
      <span class="post-comments"><?php comments_popup_link(); ?></span>
      <span class="dot"></span>
      <span class="post-catetory"><?php the_category(', '); ?></span>
    </p>
  </div>
  <?php if (has_post_thumbnail() && get_post_format() != 'video' && get_post_format() != 'audio'): ?>
  <div class="post-thumbnail">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('blog_image'); ?>
    </a>
  </div>
  <?php endif ?>
  <div class="post-body">
    <?php the_content(); ?>
    <?php wp_link_pages(array('before' => '<div class="post-pages">' . __('Pages:','cp_race_theme'), 'after' => '</div>')); ?>    
  </div>
  <div class="post-tags">
    <?php the_tags('','',''); ?>
  </div>
</div>