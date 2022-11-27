<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>  
<?php if(is_404()) { ?>
	<meta http-equiv="refresh" content="4; url=http://mahoganandson.com/">
<?php } ?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">  
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  
  <?php
  if ( ! function_exists( '_wp_render_title_tag' ) ) :
  ?>

  <title><?php wp_title( '|', true, 'right' ); ?></title>

  <?php
  endif;

  global $race_options; ?>
   
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo (isset($race_options['favicon']) && $race_options['favicon'] != '') ? esc_url($race_options['favicon']) : get_template_directory_uri() . '/images/favicon.ico'; ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!--[if lte IE 8]>
    <script src="<?php echo get_template_directory_uri() .'/js/vendor/html5.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() .'/js/vendor/respond.min.js' ?>"></script>
  <![endif]-->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/font-awesome.min.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>  

  <?php if (!isset($race_options['preloader']) || $race_options['preloader'] == '1'): ?>  
  <div id="mask">
    <div id="rotator"></div>
  </div>
  <?php endif ?>

  <?php
  if (!is_404()) {
    if (!isset($race_options['navbar_position']) || $race_options['navbar_position'] == 'right'){ 
      get_template_part('includes/header-right');  
    } elseif (isset($race_options['navbar_position']) && $race_options['navbar_position'] == 'top'){
      get_template_part('includes/header-top');  
    }
  }

  ?>

  <div id="wrap">