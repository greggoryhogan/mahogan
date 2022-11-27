<?php

$section_background = get_post_meta($post->ID, 'cp_split_section_background', true);
$section_class = ($section_background == 'grey') ? 'class="grey"' : '' ;
$section_title = get_post_meta($post->ID, 'cp_split_section_title', true);
$section_subtitle = get_post_meta($post->ID, 'cp_split_section_subtitle', true);
$background_image = get_post_meta($post->ID, 'cp_split_section_image', true);
$image_position = get_post_meta($post->ID, 'cp_split_section_image_position', true);
$content_offset = ($image_position == 'left') ? 'col-md-offset-7 col-sm-offset-4' : '' ;
$title_align = get_post_meta($post->ID, 'cp_split_section_title_align', true);
$animation = get_post_meta($post->ID, 'cp_split_section_animation', true);
$container_class = 'class="container"';
if ($animation == 'yes') {
  $container_class = 'class="container animated" data-animation="fadeIn'.ucfirst($image_position).'"';
}

?>

<section id="<?php echo $post->post_name; ?>" <?php echo $section_class ?>>
  <div <?php echo $container_class; ?>>
    <div class="col-md-5 col-sm-8 <?php echo $content_offset; ?>">
    <?php if ($section_title): ?>
      <div class="title <?php echo $title_align; ?>">
        <h2><?php echo $section_title; ?></h2>
        <?php if ($section_subtitle): ?>
        <p><?php echo $section_subtitle; ?></p>          
        <?php endif ?>
      </div>
    <?php endif ?>
    <div class="section-content">
      <?php the_content(); ?>
    </div>
    </div>
  </div>
  <div class="img-side img-<?php echo $image_position; ?> col-md-6 col-sm-4">
    <div class="img-holder">
      <img class="bg-img" src="<?php echo esc_attr($background_image); ?>" alt="">
    </div>
  </div>
</section>