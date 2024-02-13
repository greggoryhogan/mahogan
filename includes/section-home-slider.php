<?php

$home_slider = get_post_meta($post->ID, 'cp_home_slider', true);
$slider_animated = get_post_meta($post->ID, 'cp_slider_animated', true);
$slider_class = ($slider_animated == 'yes') ? 'animated' : 'not-animated';

?>
<div id="backgrounds" class="<?php echo $slider_class; ?>">
  <ul class="slides">
  <?php $slidect = 0; 
  foreach ($home_slider as $slider) { ?>
    <?php if(isset($slider['image'])){ ?>
    <li><img src="<?php echo esc_attr($slider['image']); ?>" <?php if($slidect > 0) { echo 'loading="lazy"'; } ?> alt=""></li>
    <?php $slidect++;
  } ?>
  <?php } ?>
  </ul>
</div>