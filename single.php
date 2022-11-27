<?php

get_header();

if ( have_posts() ) :

    the_post();

?>
<div id="blog-header">
  <?php if (has_post_thumbnail()): ?>
    <?php the_post_thumbnail('blog_header', array('class' => 'bg-header')); ?>
  <?php endif ?> 
  <div class="overlay">
    <div class="vcenter">
      <div class="centrize">
        <div class="single-post-title">
          <h2><?php the_title(); ?></h2>
          <p class="post-info">
            <?php if (get_post_format() != ''): ?>
              <span class="post-format format-<?php echo get_post_format(); ?>">
                <a class="entry-format" href="<?php echo esc_url( get_post_format_link(get_post_format()) ); ?>"><?php echo get_post_format_string(get_post_format()); ?></a>
              </span>
              <span class="dot"></span>      
            <?php endif ?>
            <span class="post-author"><?php _e('Posted by', 'cp_race_theme'); ?> <?php the_author_link(' - '); ?></span>
            <span class="dot"></span>
            <span class="post-date"><?php the_time('M d, Y'); ?></span>
            <span class="dot"></span>
            <span class="post-comments"><?php comments_popup_link(); ?></span>
            <span class="dot"></span>
            <span class="post-catetory"><?php the_category(', '); ?></span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="posts" class="grey">
  <div class="container">
    <div class="col-md-8">
      <div id="single-post">
        <div id="post-<?php echo $post->ID; ?>" <?php post_class('post'); ?>>
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
        <ul class="pager">
          <li class="prev"><?php previous_post_link('%link', '<i class="icon-left-open"></i>', false); ?></li>
          <li class="next"><?php next_post_link('%link', '<i class="icon-right-open"></i>', false); ?></li>
        </ul>
        <?php comments_template(); ?>
      </div>
    </div>
    <?php if( is_active_sidebar('sidebar-blog') ){ ?>
    <!-- Sidebar -->
    <div class="col-md-4">
      <div id="sidebar">
        <?php dynamic_sidebar('sidebar-blog'); ?>
      </div>
    </div>
    <!-- End Sidebar -->
    <?php } ?>
  </div>
</section>

<?php

endif;
wp_reset_query();
get_footer();

?>