<?php
/*
Template Name: Blog Page
*/

get_header();

$pagetitle = __('Blog', 'cp_race_theme');
if (is_search()) {
  $pagetitle = get_query_var('s');
}
elseif (is_category()) {
  $pagetitle = single_cat_title('', false);
}
elseif (is_archive()) {
  $pagetitle = single_month_title(' ', false);
}

$page_background = get_post_meta(get_option('page_for_posts'), 'cp_blog_page_background', true);

?>

<div id="blog-header">
  <?php if ($page_background): ?>
    <img class="bg-header" src="<?php echo $page_background; ?>" alt="">
  <?php endif ?> 
  <div class="overlay">
    <div class="vcenter">
      <div class="centrize">
        <div class="title center">
          <h2><?php echo $pagetitle; ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="posts" class="grey">
  <div class="container">
    <div class="col-md-8 col-md-offset-2">
      <div id="blog-posts">
        <?php
        
        if (get_query_var('s')) {
          $searchquery = new WP_Query(array(
            's' => get_query_var('s'),
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),            
            'post_type' => 'post'
          ));
        }

        if (!have_posts()) {
          echo '<div class="no-posts"><h2>'.__('No posts has been found!', 'cp_race_theme') .'</h2></div>';
        }

        while(have_posts()) :

            the_post();

            get_template_part('includes/blog-post');

        endwhile;
        wp_reset_query();

        echo cp_race_custom_pagination();

        ?>
        <div class="new-search">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>