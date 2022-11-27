<?php

get_header();

if (have_posts()) : the_post(); ?>

<!-- Page -->
<section id="<?php echo $post->post_name; ?>">
  <div class="container">
    <div class="title center">
      <h2><?php echo $post->post_title; ?></h2>      
    </div>
    <?php the_content(); ?>
  </div>
</section>
<!-- End Page -->

<?php endif; ?>
<?php get_footer(); ?>