<?php global $race_options; ?>
<!-- Header -->
<header class="navbar" id="topnav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand">
        <a href="<?php echo home_url(); ?>">
          <img class="logo-light" src="<?php echo (isset($race_options['light_logo']) && $race_options['light_logo'] != '') ? esc_attr($race_options['light_logo']) : get_template_directory_uri() . '/images/logo-full.png'; ?>" alt="">
          <img class="logo-dark" src="<?php echo (isset($race_options['dark_logo']) && $race_options['dark_logo'] != '') ? esc_attr($race_options['dark_logo']) : get_template_directory_uri() . '/images/logo-full-dark.png'; ?>" alt="">
        </a>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="navigation">
      <?php
        if (has_nav_menu('primary')) {
          wp_nav_menu(array(
            'menu' => 'primary',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav navbar-nav navbar-right'
          ));
        } else{ ?>
          <p class="no-menu"><?php _e('No primary menu assigned!', 'cp_race_theme'); ?></p>
      <?php } ?>
    </div>
  </div>
</header>
<!-- End Header -->