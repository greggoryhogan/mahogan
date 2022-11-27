<?php

$section_title = get_post_meta($post->ID, 'cp_contact_section_title', true);
$section_subtitle = get_post_meta($post->ID, 'cp_contact_section_subtitle', true);

?>
<section id="contact" class="grey">
  <div class="img-side img-right col-md-6 col-sm-4">
    <div id="map"></div>
  </div>
  <div class="container">
    <div class="col-md-5 col-sm-8">
      <div class="title right">
        <?php if ($section_title): ?>
          <h2><?php echo $section_title; ?></h2>
        <?php endif ?>
        <?php if ($section_subtitle): ?>
          <p><?php echo $section_subtitle; ?></p>
        <?php endif ?>
      </div>
      <div id="contact-form">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>