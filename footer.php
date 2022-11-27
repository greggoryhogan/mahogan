<?php
global $race_options;

$facebook = (isset($race_options['facebook_url'])) ? $race_options['facebook_url'] : '';
$twitter = (isset($race_options['twitter_url'])) ? $race_options['twitter_url'] : '';
$linkedin = (isset($race_options['linkedin_url'])) ? $race_options['linkedin_url'] : '';
$instagram = (isset($race_options['instagram_url'])) ? $race_options['instagram_url'] : '';
$pinterest = (isset($race_options['pinterest_url'])) ? $race_options['pinterest_url'] : '';
$github = (isset($race_options['github_url'])) ? $race_options['github_url'] : '';

?>
  <?php if (!is_404()): ?> 
  <footer>
    <div class="container">
      <?php if (isset($race_options['navbar_position']) && $race_options['navbar_position'] == 'top'): ?>
        <?php if ($facebook || $twitter || $linkedin || $instagram || $pinterest || $github): ?>
        <ul id="footer-social" class="nav">
          <?php if($facebook) { ?><li><a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="icon-facebook"></i></a></li><?php } ?>
          <?php if($twitter) { ?><li><a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="icon-twitter"></i></a></li><?php } ?>
          <?php if($linkedin) { ?><li><a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="icon-linkedin"></i></a></li><?php } ?>
          <?php if($instagram) { ?><li><a href="<?php echo esc_url($instagram); ?>" target="_blank"><i class="icon-instagram"></i></a></li><?php } ?>
          <?php if($pinterest) { ?><li><a href="<?php echo esc_url($pinterest); ?>" target="_blank"><i class="icon-pinterest"></i></a></li><?php } ?>
          <?php if($github) { ?><li><a href="<?php echo esc_url($github); ?>" target="_blank"><i class="icon-github"></i></a></li><?php } ?>
        </ul>
        <?php endif ?>
      <?php endif ?>
      <?php if (isset($race_options['copyright_text'])): ?>
        <h5 class="copyright"><?php echo $race_options['copyright_text']; ?></h5>
      <?php else : ?>
        <h5 class="copyright"><?php echo date('Y'); ?> &copy; <?php bloginfo('name'); ?>. All rights reserved.</h5>
      <?php endif; ?>
    </div>
  </footer>
  <?php endif ?>
</div>
<?php wp_footer(); ?>
</body>
</html>