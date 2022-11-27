<?php

get_header();

global $race_options;

?>

<!-- 404 -->
<section id="error404">
  <?php if (isset($race_options['404_background']) && $race_options['404_background'] != ''): ?>
    <img class="bg-header" src="<?php echo $race_options['404_background']; ?>" alt="">
  <?php endif ?>
  <div class="overlay">    
    <div class="vcenter">
      <div class="centrize">
        <div class="error-box">
          <img src="<?php echo (isset($race_options['logo']) && $race_options['logo'] != '') ? $race_options['logo'] : get_template_directory_uri() . '/images/logo.png'; ?>" alt="" style="width: auto; max-height: 300px;">
          <!--<h1>Oops!</h1>
          <hr>-->
          <?php if (isset($race_options['404_text'])): ?>
            <p><?php echo $race_options['404_text']; ?></p>
          <?php else : ?>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
          <?php endif; ?>
          <a class="btn btn-white" href="<?php echo home_url(); ?>"><?php _e('Back Home', 'cp_race_theme'); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End 404 -->

<?php get_footer(); ?>