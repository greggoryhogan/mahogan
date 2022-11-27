<?php

get_header();

if (have_posts()) :
  the_post();

  $project_category  = '';
  $cats = get_the_terms($post->ID, 'portfolio_category');
  if($cats){
    foreach($cats as $cat) {
      $project_category  .= $cat->name . ' / ';
    }
    $project_category = rtrim($project_category, ' / ');
  }
?>
<!-- Project -->
<section id="<?php echo $post->post_name; ?>">
  <div class="container">
    <div id="project">
      <div class="title center">
        <h2><?php echo $post->post_title; ?></h2>
        <p><?php echo $project_category; ?></p>
      </div>
      <?php the_content(); ?>
    </div>
  </div>
</section>
<!-- End Project -->

<?php

endif;
get_footer();

?>