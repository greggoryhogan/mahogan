jQuery(document).ready(function($) { 

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

  $('#cp_team_member_photo, #cp_slide_image, #cp_testimonial_photo, #cp_client_logo').on('change', function() {
    $(this).prev().attr('src', $(this).val()).addClass('active');
  });
  
  $('#cp_shortcode_type').on('change', function(event) {    
    var selected = $('#cp_shortcode_type option:selected');

    $('div[id^=cp_shortcode_].cp_shortcode_section').hide();
    $('#cp_shortcode_'+selected.data('type')+'').fadeIn(500);

  }).trigger('change');

  $('#icon-list i').click(function() {
    $('#icon-list i').removeClass('selected');
    $(this).addClass('selected');
    var icon = $(this).attr('class').replace(' selected', '');
    $(this).parents('.cp_shortcode_field').find('.cp_shortcode_icon').attr('value', icon);
  });

  $('#feature-cloner').on('click', function() {
    var row = $('.feature-control.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text');
    row.insertBefore('#feature-cloner');
  });

  $('.feature-remover').on('click', function() {
    $(this).parents('.feature-control').remove();
    return false;
  });

  $('#add_shortcode').click(function() {
    var selected = $('#cp_shortcode_type option:selected');

    var ed = tinyMCE.activeEditor;
    var shortcodeContent = getShortcode(selected.data('type'));
    ed.selection.setContent(shortcodeContent);
    tb_remove();

    return false;
  });

  function getShortcode(id) {

    var output;
    var selected = $('#cp_shortcode_type option:selected');
    var type = selected.data('type');
    var shortcode = selected.attr('value');
    var cp_body = $('#cp_shortcode_'+type+'');

    // Columns    
    if (id == 'column') {
      var is_last_checkbox = cp_body.find('#cp_is_last_column');
      var is_last = '';

      var columnContent = cp_body.find('#cp_column_content').val();

      if (is_last_checkbox.is(':checked')) {
        is_last = '_last';
      }
      output = '['+ shortcode + is_last +']';
      output += columnContent;
      output += '[/'+ shortcode + is_last +']';
    }

    // Icon Boxes
    if (id == 'icon_box') {
      var title = cp_body.find('#cp_icon_box_title').val();
      var icon = cp_body.find('.cp_shortcode_icon').val();
      var text = cp_body.find('#cp_icon_box_text').val();

      output = '[' + shortcode;
      output += ' title="'+title+'"';
      output += ' icon="'+icon+'"'; 
      output += ']';
      output += text;
      output += '[/' + shortcode + ']';
    }

    // Counters
    if (id == 'counter') {
      var number = cp_body.find('#cp_counter_number').val();
      var icon = cp_body.find('.cp_shortcode_icon').val();
      var title = cp_body.find('#cp_counter_title').val();
      var animation = cp_body.find('.cp_animation').val();
      var animation_delay = cp_body.find('.cp_animation_delay').val();

      output = '[' + shortcode;
      output += ' number="'+number+'"';
      output += ' title="'+title+'"';
      output += ' icon="'+icon+'"';
      if (animation != 'none') {
        output += ' animation="'+animation+'" delay="'+animation_delay+'"';
      }      
      output += ']';
    }

    // Slideshow
    if (id == 'slideshow') {
      var content = cp_body.find('#cp_slideshow_content').val();

      output = '[' + shortcode + ']';
      output += content;
      output += '[/' + shortcode + ']';
    }

    // Image Slides
    if (id == 'slide') {
      var image = cp_body.find('#cp_slide_image').val();

      output = '[' + shortcode + ' image="'+image+'"]';
    };

    // Videos
    if (id == 'video') {
      var url = cp_body.find('#cp_video_url').val();

      output = '[video_embed]<br/>';
      output += url + '<br/>';
      output += '[/video_embed]';
    };

    // Slideshow
    if (id == 'services_carousel') {
      var content = cp_body.find('#cp_services_carousel_content').val();

      output = '[' + shortcode + ']';
      output += content;
      output += '[/' + shortcode + ']';
    }

    // Team Members
    if (id == 'team_member') {
      var photo = cp_body.find('#cp_team_member_photo').val();
      var name = cp_body.find('#cp_team_member_name').val();
      var position = cp_body.find('#cp_team_member_position').val();
      var description = cp_body.find('#cp_team_member_description').val();
      var facebook = cp_body.find('#cp_team_member_facebook').val();
      var twitter = cp_body.find('#cp_team_member_twitter').val();
      var linkedin = cp_body.find('#cp_team_member_linkedin').val();
      var gplus = cp_body.find('#cp_team_member_gplus').val();
      var animation = cp_body.find('.cp_animation').val();
      var animation_delay = cp_body.find('.cp_animation_delay').val();

      output = '[' + shortcode;
      output += ' photo="'+photo+'"';
      output += ' name="'+name+'"';
      if (position != '') {
        output += ' position="'+position+'"';
      }
      if (facebook != '') {
        output += ' facebook="'+facebook+'"';
      }
      if (twitter != '') {
        output += ' twitter="'+twitter+'"';
      }
      if (linkedin != '') {
        output += ' linkedin="'+linkedin+'"';
      }
      output += ']';
      output += description;
      output += '[/' + shortcode + ']';
    }

    // Pricing Tables
    if (id == 'pricing_table') {
      var title = cp_body.find('#cp_pricing_table_title').val();
      var currency = cp_body.find('#cp_pricing_table_currency').val();
      var price = cp_body.find('#cp_pricing_table_price').val();
      var featured = cp_body.find('#cp_pricing_table_featured');
      var featured_text = cp_body.find('#cp_pricing_table_featured_text').val();
      var button_text = cp_body.find('#cp_pricing_table_button_text').val();
      var button_url = cp_body.find('#cp_pricing_table_button_url').val();

      output = '[' + shortcode;
      output += ' title="'+title+'"';   
      output += ' currency="'+currency+'"';   
      output += ' price="'+price+'"';
      if (featured.is(':checked')) {
        output += ' featured="yes"';
        output += ' featured_text="'+featured_text+'"';
      }
      output += ' button_text="'+button_text+'"';
      output += ' button_url="'+button_url+'"';   
      output += ']';
      $('.cp_pricing_table_feature').each(function(i) {
        if ($(this).val() != '') {
          output += '&lt;li&gt;'+$(this).val()+'&lt;/li&gt;'
        }
      });
      output += '[/' + shortcode + ']';
    }

    // Testimonial Slider
    if (id == 'testimonial_slider') {
      var content = cp_body.find('#cp_testimonial_slider_content').val();

      output = '[' + shortcode + ']';
      output += content;
      output += '[/' + shortcode + ']';
    }

    // Testimonials
    if (id == 'testimonial') {
      var photo = cp_body.find('#cp_testimonial_photo').val();
      var client = cp_body.find('#cp_testimonial_client').val();
      var content = cp_body.find('#cp_testimonial_content').val();

      output = '[' + shortcode;
      output += ' photo="'+photo+'"';
      output += ' client="'+client+'"';          
      output += ']';
      output += content;
      output += '[/' + shortcode + ']';
    }

    // Clients
    if (id == 'client') {
      var logo = cp_body.find('#cp_client_logo').val();
      var animation = cp_body.find('.cp_animation').val();
      var animation_delay = cp_body.find('.cp_animation_delay').val();

      output = '[' + shortcode;
      output += ' logo="'+logo+'"';
      if (animation != 'none') {
        output += ' animation="'+animation+'" delay="'+animation_delay+'"';
      }      
      output += ']';
    }

    return output;
  }

});