<?php
$section_background = get_post_meta($post->ID, 'cp_section_background', true);
$disable_padding = get_post_meta($post->ID, 'cp_disable_padding', true);
$section_title = get_post_meta($post->ID, 'cp_section_title', true);
$section_subtitle = get_post_meta($post->ID, 'cp_section_subtitle', true);
$title_size = get_post_meta($post->ID, 'cp_title_size', true);
$section_class = ($section_background == 'grey') ? 'class="grey"' : '' ;

if ($title_size == 'big') {
  $output_title = '<h2>'.$section_title.'</h2>';
} elseif ($title_size == 'medium') {
  $output_title = '<h3>'.$section_title.'</h3>';
  $output_title .= '<hr>';
}

?>
<section id="<?php echo $post->post_name; ?>" <?php echo $section_class ?>>
  <div class="container">
    <?php if ($section_title): ?>
      <div class="title center">
        <?php echo $output_title; ?>
        <?php if ($section_subtitle): ?>
        <p><?php echo $section_subtitle; ?></p>
        <?php endif ?>
      </div>
    <?php endif ?>
    <div class="section-content">
      <?php the_content(); ?>
    </div>
  </div>
</section>