<?php $video_background = get_post_meta($post->ID, 'cp_home_background_video', true); ?>
<!-- Video Background-->
  <div id="video-wrapper"></div>
  <div class="player" data-property="{videoURL:'<?php echo $video_background; ?>'}"></div>
<!-- End Video Background-->  