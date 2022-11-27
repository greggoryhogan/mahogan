<section id="<?php echo $post->post_name; ?>">
  <div class="container">
    <div class="title center">
      <h2><?php echo $post->post_title; ?></h2>
    </div>    
    <ul id="filters">
      <li class="active" data-filter="*">All</li>
    <?php
      $categories = get_terms('portfolio_category', array( 'hide_empty' => 0 ));
      foreach ($categories as $category) { ?>
      <li data-filter=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></li> 
    <?php } ?>
    </ul>
    <?php
    $args = array('post_type' => 'portfolio', 'orderby'=> 'post__in', 'posts_per_page' => '-1', 'order' => 'ASC');
    $mainquery = new WP_query($args);
    if( $mainquery->have_posts()) : ?>
      <div id="projects">
      <?php while ($mainquery->have_posts()) : $mainquery->the_post();
      $project_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'portfolio_image');      
      $project_category  = '';
      $project_category_slug  = '';
      $cats = get_the_terms($post->ID, 'portfolio_category');
      if($cats){
        foreach($cats as $cat) {
          $project_category  .= $cat->name . ' / ';
          $project_category_slug  .= $cat->slug . ' / ';
        }
        $project_category = rtrim($project_category, ' / ');
        $project_category_slug = rtrim($project_category_slug, ' / ');
      } ?>
      <div class="project <?php echo strtolower(str_replace('/', '', $project_category_slug)); ?>">
        <div class="project-overlay">
          <div class="vcenter">
            <div class="centrize">
              <h4><?php echo $post->post_title; ?></h4>
              <a href="<?php the_permalink(); ?>" class="btn btn-white"><?php _e('View', 'cp_race_theme'); ?></a>
              <p><?php echo $project_category; ?></p>
            </div>
          </div>
        </div>
        <img src="<?php echo esc_attr($project_thumb[0]); ?>" alt="<?php echo $post->post_title; ?>">
      </div>      
      <?php endwhile;?>
      </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
  </div>
</section>