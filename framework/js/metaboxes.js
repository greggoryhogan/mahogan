jQuery(document).ready(function($){
  $('#add-row').on('click', function() {
    var row = $('.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text').removeAttr('id');
    row.insertBefore('#cloner_field');
    return false;
  });
  
  $('.remove_button').on('click', function() {
    $(this).parents('.cp_slide_box').remove();
    return false;
  });

  $('#cp_section_type').on('change', function(){
    var selected = $('#cp_section_type option:selected').attr('value');

    $('#post-body div[id^=cp_page_options_]').not('#cp_page_options_index').hide();
    $('#post-body #cp_page_options_'+selected+'').fadeIn(500);

    if (selected == 'home') {
      $('#cp_home_slider').fadeIn(500);
    } else{
      $('#cp_home_slider').hide();
      $('#cp_home_slider .widefat').val('');
      $('.cp_slide_screenshot img').attr('src', '');
    }
  }).trigger('change');

  $('#page_template').on('change', function(){
    var selected = $('#page_template option:selected').attr('value');

    if (selected == 'blog-page.php') {
      $('#cp_page_options_index').fadeIn(500);
      $('#post-body div[id^=cp_page_options_], #cp_page_options').not('#cp_page_options_index').addClass('not-visible');
    } else{
      $('#cp_page_options_index').hide();
      $('#post-body div[id^=cp_page_options_], #cp_page_options').not('#cp_page_options_index').removeClass('not-visible');
    }
  }).trigger('change');

  $('.post-format[name=post_format]').on('change', function() {
    $('div[id^=cp_post_options_]').hide();
    var selected = $('.post-format[name=post_format]:checked').val();
    $('#post-body #cp_post_options_'+selected+'').fadeIn(500);
  }).trigger('change');

  $('#cp_home_background').on('change', function(){
    var selected = $('#cp_home_background option:selected').attr('value');

    if (selected != 'image') {
      $('#cp_home_background_image_field').hide();
      $('#cp_home_background_image').val('');
    } else{
      $('#cp_home_background_image_field').fadeIn(500);
    }    

    if (selected != 'slider') {
      $('.cp_slide_box .upload_field').hide();
      $('.cp_slide_box .upload_field .widefat').val('');
      $('.cp_slide_screenshot').hide();
      $('.cp_slide_screenshot img').attr('src', '');
    } else{
      $('.cp_slide_box .upload_field').fadeIn(500);
      $('.cp_slide_screenshot').fadeIn(500);
    }

    if (selected != 'video') {
      $('#cp_home_background_video_field').hide();
      $('#cp_home_background_video').val('');
      $('#cp_slider_animated_field').fadeIn(500);
    } else{
      $('#cp_home_background_video_field').fadeIn(500);
      $('#cp_slider_animated_field').hide();
    }
  }).trigger('change');

  $('.upload_field .widefat').on('change', function() {
    imageContainer = $(this).closest('.cp_slide_box').find('.cp_slide_screenshot img');
    imageContainer.attr('src', $(this).val());
  }).trigger('change');

  var custom_uploader;
 
  $('.upload_button').click(function(e) { 
    e.preventDefault();
    var this_btn = $(this);

    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose Image',
        button: {
            text: 'Choose Image'
        },
        multiple: false
    });

    custom_uploader.on('select', function() {
        attachment = custom_uploader.state().get('selection').first().toJSON();        
        this_btn.prev().val(attachment.url).trigger('change');
    }); 
    
    custom_uploader.open();
  });

  $('#cp_section_background').on('change', function(){
    if ($('#cp_section_background option:selected').val() == 'custom') {
      $('#cp_custom_background_field').fadeIn(500);
      $('#cp_default_text_color_field').fadeIn(500);
    } else{
      $('#cp_custom_background_field').hide();
      $('#cp_default_text_color_field').hide();
    }
  }).trigger('change');

  $('#cp_custom_background').wpColorPicker();

  $('.date-picker').datepicker({
    dateFormat : 'yy-mm-dd'
  });

  $('.icon-list .fa').click(function() {
    $('.icon-list .fa').removeClass('selected');
    $(this).addClass('selected');
    var icon = $(this).attr('class').replace(' selected', '');
    $(this).parents('.cp_field').find('#cp_service_icon').attr('value', icon);
    $('#selected_icon i').removeAttr('class');
    $('#selected_icon i').addClass(icon);
  });
  
});