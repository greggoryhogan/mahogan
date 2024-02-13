(function($) {

  "use strict"; 

  $(window).load(function() {

    //Preloader
    if ($('#rotator').length) {
      $("#rotator").rotator({
        starting: 0,
        ending: 100,
        percentage: true,
        color: '#fff',
        lineWidth: 10,
        timer: 10,
        radius: 40,
        fontStyle: 'Montserrat, sans-serif',
        fontSize: '20px',
        fontColor: '#fff',
        backgroundColor: '#363636',
        callback: function () {
          $('#mask').fadeOut(300);
        }
      });
    }

    //Animated Background Slider
    $('#backgrounds.animated').flexslider({
      animation: "fade",
      directionNav: false,
      controlNav: false,
      keyboard: false,
      slideshowSpeed: 6000,
      start: function () {
        $('#backgrounds').find(".slides > li.flex-active-slide").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1.2)',
            '-moz-transform': 'scale(1.2)',
            'transform': 'scale(1.2)',
          });
        })
      },
      before: function () {
        $('#backgrounds').find(".slides > li").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1)',
            '-moz-transform': 'scale(1)',
            'transform': 'scale(1)',
          });
        })
      },
      after: function () {
        $('#backgrounds').find(".slides > li.flex-active-slide").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1.2)',
            '-moz-transform': 'scale(1.2)',
            'transform': 'scale(1.2)',
          });
        })
      },
    });

    //Animated Background Slider
    $('#about-slider.animated').flexslider({
      animation: "slide",
      directionNav: true,
      controlNav: false,
      keyboard: false,
      slideshowSpeed: 6000,
      /*start: function () {
        $('#about-slider').find(".slides > li.flex-active-slide").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1.2)',
            '-moz-transform': 'scale(1.2)',
            'transform': 'scale(1.2)',
          });
        })
      },
      before: function () {
        $('#about-slider').find(".slides > li").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1)',
            '-moz-transform': 'scale(1)',
            'transform': 'scale(1)',
          });
        })
      },
      after: function () {
        $('#about-slider').find(".slides > li.flex-active-slide").each(function () {
          var $content = $(this);
          $content.css({
            '-webkit-transform': 'scale(1.2)',
            '-moz-transform': 'scale(1.2)',
            'transform': 'scale(1.2)',
          });
        })
      },*/
    });

    //Not Animated Background Slider
    $('#backgrounds.not-animated').flexslider({
      animation: "fade",
      directionNav: false,
      controlNav: false,
      keyboard: false,
      slideshowSpeed: 6000
    });

    //Home text rotator
    $('#home-slider').flexslider({
      animation: "slide",
      directionNav: false,
      controlNav: false,
      slideshowSpeed: 6000,
      direction: "vertical",
      animationSpeed: 800,
      touch: false
    });

    //Portfolio masonry
    var $container = $('#projects');
    $container.isotope({
      masonry: {
       columnWidth: 0
      },
      itemSelector: '.project'
    });

    //Portfolio filters
    $('#filters').on( 'click', 'li', function() {
      $('#filters li').removeClass('active');
      $(this).addClass('active');
      var filterValue = $(this).attr('data-filter');
      $container.isotope({ filter: filterValue });
    });

    //Video background
    if ($('.player').length) {
      $(".player").mb_YTPlayer({
        containment: '#video-wrapper',
        mute: true,
        quality: 'default'
      });
    };    

  });
  
  //Navigation Scrolling a[href^="#"]
  $('#topnav a[href^="#"], a[href^="#"].btn').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 700);
        return false;
      }
    }
  });

  //Close responsive nav
  $('#navigation li a').on('click', function() {
    if ($(window).width() < 768 && !$(this).parent().hasClass('menu-item-has-children')) {
      $('.navbar-toggle').click();
    }
  });

  //Toggle menu button transition
  $(window).scroll(function(event) {
    if ($(document).scrollTop() >= $('#home').height()) {
      $('#menu-toggle').addClass('dark');
    } else{
      $('#menu-toggle').removeClass('dark');
    }
  }).trigger('scroll');

  //Topnav transition
  $(window).scroll(function(event) {
    if ($(document).scrollTop() >= $('#home').height() / 2) {
      $('#topnav').addClass('scrolled');
    } else{
      $('#topnav').removeClass('scrolled');
    }
  }).trigger('scroll');

  //Sidebar open
  $('#menu-toggle').on('click', function(event) {
    $(this).toggleClass('active');
    $('#menu').toggleClass('open');
    $('#wrap').toggleClass('menu-open');
  });

  //Sidebar Navigation
  $('#main-menu a').click(function(event) {
    setTimeout(function(e){      
      $('#menu-toggle').trigger('click');
    }, 700)
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 700);
        return false;
      }
    }    
  });

  //Elements animation
  $('.animated').appear(function(){
    var element = $(this);
    var animation = element.data('animation');
    var animationDelay = element.data('delay');
    if (animationDelay) {
      setTimeout(function(){
        element.addClass( animation + " visible" );
        if (element.hasClass('counter')) {
          element.find('.value').countTo();
        }
      }, animationDelay); 
    } else{
      element.addClass( animation + " visible" );
      if (element.hasClass('counter')) {
        element.find('.value').countTo();
      }
    }  
  },{accY: -150});

  var $container = $('#projects');
  $container.imagesLoaded( function() {
    $(window).resize(function() {
     $container.isotope('reloadItems');
    });  
  });

  //Background images
  $('#backgrounds img').each(function() {
    var image = $(this).attr('src');
    $(this).parents('li').css('background-image', 'url('+image+')');
    $(this).remove();
  });

  // Side Images
  $('.bg-img').each(function() {
    var image = $(this).attr('src');
    $(this).parents('.img-holder').css('background-image', 'url('+image+')');
    $(this).remove();
  });

  //Parallax sections
  $('.parallax-section').each(function(index, el) {
    $(this).parallax('50%', 0.4);
  });

  //Services carousel
  $("#services-carousel").owlCarousel({
    items : 4,
    itemsDesktop : [1000,4],
    itemsDesktopSmall : [900,3],
    itemsTablet: [600,2],
    itemsMobile : false,
    autoPlay: 4000,
    pagination: false,
    navigation: true,
    navigationText: ['', '']
  });

  //Services tooltip
  $('.service').tooltip({
    trigger: 'hover',
    container: 'body',
    template: '<div class="tooltip service-tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
  });

  $('.project-slider p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
      $this.remove();
  });

  //Project slider
  $('#project-slider').flexslider({
    animation: "slide",
    slideshowSpeed: 6000
  });

  //Portfolio project slider
  function initProjectSlider() {
    $('#project-slider').flexslider({
      animation: "slide",
      slideshowSpeed: 6000
    });
  };

  //Portfolio Modal
  $('.project-overlay a').on('click', function(){     
    var projectUrl = $(this).attr("href");

    var project = '<div class="modal fade" id="project-modal"><div class="modal-dialog"><div class="modal-content"></div></div></div>';
    var closeButton = '<a href="#" id="modal-close" data-dismiss="modal" aria-hidden="true"><i class="icon-cancel-circled"></i></a>';

    $(project).modal({
      remote: projectUrl + ' #project'
    })
    .on('loaded.bs.modal', function () {
      initProjectSlider();
      $('#project-modal .modal-dialog').prepend(closeButton);
    })
    .on('hidden.bs.modal', function () {
      $(this).remove();      
    })   


    return false;
  
  });

  //Testimonials slides
  $('#testimonials-slider').flexslider({
    directionNav: false,
    animation: "slide"
  });  

  //Blog Carousel
  $("#blog-carousel").owlCarousel({
    items : 3,
    itemsDesktop : [1000,3],
    itemsDesktopSmall : [900,2],
    itemsTablet: [600,2],
    itemsMobile : false,
    autoPlay: 4000,
    pagination: true,
    navigation: false,
    navigationText: ['', '']
  });

  //Coming soon countdown
  var theDate = $('.countdown').data('date');
  if ($('.countdown').length) {
    $(".countdown").downCount({
      date: theDate,
      offset: 0
    });
  }

  $('img').on('dragstart', function(event){
    event.preventDefault();
  });


  $('.bg-header').each(function() {
    var image = $(this).attr('src');
    $(this).parent().css('background-image', 'url('+image+')');
    $(this).parent().addClass('parallax-section');
    $(this).remove();
  });


  //Css classes fix
  $('#contact-form .wpcf7-submit').addClass('btn btn-dark').removeClass('wpcf7-form-control');
  $('#contact-form .wpcf7-submit').parent().addClass('btn-parent');
  $('#topnav .sub-menu').addClass('dropdown-menu');
  $('#submit-btn').addClass('btn btn-dark');
  $('#submit-btn').parent().addClass('btn-parent');

  $('#topnav li.menu-item-has-children>a').on('click', function(event) {
    if ($(window).width() < 768) {
      event.preventDefault();
      var subMenu = $(this).parents('.menu-item-has-children').find('.sub-menu');
      subMenu.toggle();
    };
  });
  
})(jQuery);