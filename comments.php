<?php
if ( post_password_required() ) {
  return;
}
?>
<!-- Comments -->
<div id="comments">

  <?php if ( have_comments() ) : ?>

  <h5>
      <?php
        printf( _n( 'One comment', '%1$s comments', get_comments_number(), 'cp_race_theme' ),
        number_format_i18n( get_comments_number() ), get_the_title() );
      ?>
  </h5>  

  <ul class="comments-list">
    <?php wp_list_comments(array('callback'  => 'cp_race_comments')); ?>
  </ul>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <ul id="comments-pagination" class="nav nav-pills">
    <li class="nav-prev"><?php previous_comments_link('<i class="icon-left-open"></i>'); ?></li>
    <li class="nav-next"><?php next_comments_link('<i class="icon-right-open"></i>'); ?></li>
  </ul>
  <?php endif;?>

  <?php if ( ! comments_open() ) : ?>
  <p class="no-comments"><?php _e( 'Comments are closed.', 'cp_race_theme' ); ?></p>
  <?php endif; ?>

  <?php endif;?>
</div>

<?php
  $args = array(
    'id_form' => 'form-comments',
    'id_submit' => 'submit-btn',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'comment_field' => '<div class="form-group"><textarea name="comment" id="comment-field" class="form-control" placeholder="'.__('Comment', 'cp_race_theme').'"></textarea></div>',
    'fields' => apply_filters( 'comment_form_default_fields', array(
      'author'  =>  '<div class="form-double">'.
                    '<div class="form-group">'.
                    '<input name="author" type="text" class="form-control" placeholder="'.__('Name', 'cp_race_theme').'"></div>',
      'email'   =>  '<div class="form-group last">'.
                    '<input name="email" type="text" class="form-control" placeholder="'.__('Email', 'cp_race_theme').'"></div>'.
                    '</div>',
      'url'     => ''
    )),
    'title_reply'       => __( '<h5>Leave a comment</h5>', 'cp_race_theme' ),
    'title_reply_to'    => __( '<h5>Leave a comment to %s</h5>', 'cp_race_theme' ),
    'cancel_reply_link' => __( 'Cancel Reply', 'cp_race_theme' ),
    'label_submit'      => __( 'Post Comment', 'cp_race_theme' ),
  );
  comment_form($args);
?>
<!-- End Comments -->
