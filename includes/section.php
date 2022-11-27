<!-- Section -->
<?php

$section_type = get_post_meta($post->ID, 'cp_section_type', true);

if ($section_type == 'home') {
  get_template_part('includes/section-home');
}
else if ($section_type == 'default') {
  get_template_part('includes/section-default');
}
else if ($section_type == 'split') {
  get_template_part('includes/section-split');
}
else if ($section_type == 'portfolio') {
  get_template_part('includes/section-portfolio');
}
else if ($section_type == 'blog') {
  get_template_part('includes/section-blog');
}
else if ($section_type == 'contact') {
  get_template_part('includes/section-contact');
}
?>

<!-- End Section -->
