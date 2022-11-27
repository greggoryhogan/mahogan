<?php

$home_background = get_post_meta($post->ID, 'cp_home_background', true);
$home_slider = get_post_meta($post->ID, 'cp_home_slider', true);
$slider_subtitle = get_post_meta($post->ID, 'cp_slider_subtitle', true);
$slider_button_text = get_post_meta($post->ID, 'cp_slider_button_text', true);
$slider_button_url = get_post_meta($post->ID, 'cp_slider_button_url', true);
$button_url = ($slider_button_url != '') ? $slider_button_url : '#';

if ($home_background == 'slider') {
  get_template_part('includes/section-home-slider');
}

elseif ($home_background == 'video') {
  get_template_part('includes/section-home-video');
}

?>

<div id='home'>

  <?php if ($home_slider) : ?>
  <div class="home-caption">
    <div class="home-content">
    	
       <?php if ($slider_subtitle != ''): ?>
     <img src="<?php bloginfo('template_url') ?>/images/guy.png" alt="Mark A. Hogan and Son Construction" class="homeslideimg" />
 <h5><?php echo $slider_subtitle; ?></h5>
      <?php endif ?>
      <div id="home-slider" class="flexslider">
        <ul class='slides'>
        <?php foreach ($home_slider as $slider) { ?>
          <li><h1><?php echo $slider['headline']; ?></h1></li>
        <?php } ?>
        </ul>        
      </div>
     
      <?php if ($slider_button_text != ''): ?>
      <a href="<?php echo $button_url; ?>" class="btn btn-white"><?php echo $slider_button_text; ?></a>
      <?php endif ?>
    </div>
  </div>
  <?php endif; ?>
</div>