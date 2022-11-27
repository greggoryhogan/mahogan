<?php
global $race_options;

$facebook = (isset($race_options['facebook_url'])) ? $race_options['facebook_url'] : '';
$twitter = (isset($race_options['twitter_url'])) ? $race_options['twitter_url'] : '';
$linkedin = (isset($race_options['linkedin_url'])) ? $race_options['linkedin_url'] : '';
$instagram = (isset($race_options['instagram_url'])) ? $race_options['instagram_url'] : '';
$pinterest = (isset($race_options['pinterest_url'])) ? $race_options['pinterest_url'] : '';
$github = (isset($race_options['github_url'])) ? $race_options['github_url'] : '';

?>
<!-- Menu -->
<aside id="menu">
  <div id="menu-toggle">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav>
    <div id="logo">
      <img src="<?php echo (isset($race_options['logo']) && $race_options['logo'] != '') ? esc_attr($race_options['logo']) : get_template_directory_uri() . '/images/logo.png'; ?>" alt="">
    </div>
    <?php
      if (has_nav_menu('primary')) {
        wp_nav_menu(array(
          'menu' => 'primary',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'nav',
          'menu_id' => 'main-menu'
        ));
      } else{ ?>
        <p class="no-menu"><?php _e('No primary menu assigned!', 'cp_race_theme'); ?></p>
    <?php } ?>
    <?php if ($facebook || $twitter || $linkedin || $instagram || $pinterest || $github): ?>
    <ul id="socials" class="nav">
      <?php if($facebook) { ?><li><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
      <?php if($twitter) { ?><li><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
      <?php if($linkedin) { ?><li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="icon-linkedin"></i></a></li><?php } ?>
      <?php if($instagram) { ?><li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="icon-instagram"></i></a></li><?php } ?>
      <?php if($pinterest) { ?><li><a href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php } ?>
      <?php if($github) { ?><li><a href="<?php echo esc_url($github); ?>" target="_blank"><i class="icon-github"></i></a></li><?php } ?>
    </ul>
    <?php endif ?>
  </nav>
</aside>
<!-- End Menu -->