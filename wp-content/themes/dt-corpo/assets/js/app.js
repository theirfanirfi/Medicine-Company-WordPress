var DECENTTHEMES = DECENTTHEMES || {};

(function($){

  // USE STRICT
  "use strict";

  DECENTTHEMES.initialize = {

    init: function(){
      DECENTTHEMES.initialize.defaults();
      DECENTTHEMES.initialize.swiper();
      DECENTTHEMES.initialize.background();
      DECENTTHEMES.initialize.background_parallax();
      DECENTTHEMES.initialize.skills();
      DECENTTHEMES.initialize.map();
      DECENTTHEMES.initialize.countup();
      DECENTTHEMES.initialize.header();
      DECENTTHEMES.initialize.share_button();
    },
    defaults: function() {
      var $toggle = $('[data-dt-toggle]');

      $toggle.each(function() {
        var $this   = $(this),
            $class  = $this.data('dt-toggle');

        $this.on('click', function(e) {
          e.preventDefault();
          $this.toggleClass('active');
          $('body').toggleClass($class);
        })
      });

      // Site Preloader
      $(window).load(function () {
        $(".loader").fadeOut();
        $("#preloader").delay(350).fadeOut("slow");
      });

      /* Return To Top */
      $(window).scroll(function() {
        if ($(this).scrollTop() >= 400) {
          $('.return-to-top').addClass('visible');
        } else {
          $('.return-to-top').removeClass('visible');
        }
      });

      $('.return-to-top').on('click', function(e) {
        e.preventDefault();
        $('body,html').animate({
          scrollTop : 0
        }, 1000);
      });

      /* Map Visible */
      $('.corpo_google_map').each( function() {
          var $this = $(this);
          $('button', $this).on('click', function() {
            $('.map_trigger i', $this).toggleClass('fa-angle-down');
            $('.map_display_area', $this).toggleClass('map_active');
          });
      });

      // Searchform
      var menuForm = $('#menu-search-form');

      $('a', menuForm).on('click', function(e) {
        e.preventDefault();
        menuForm.toggleClass('search-visible');
        $('i', this).toggleClass('fa-search fa-close');

      })
    },

    swiper: function() {
      $('[data-carousel="swiper"]').each( function() {

        var $this       = $(this);
        var $container   = $this.find('[data-swiper="container"]');
        var $asControl   = $this.find('[data-swiper="ascontrol"]');

        var conf = function(element) {
          var obj = {
            slidesPerView: element.data('items'),
            centeredSlides: element.data('center'),
            loop: element.data('loop'),
            speed: element.data('speed'),
            initialSlide: element.data('initial'),
            effect: element.data('effect'),
            spaceBetween: element.data('space'),
            autoplay: element.data('autoplay'),
            direction: element.data('direction'),
            paginationType: element.data('pagination-type'),
            paginationClickable: true,
            breakpoints: element.data('breakpoints'),
            slideToClickedSlide: element.data('click-to-slide'),
            loopedSlides: element.data('looped'),
            fade: {
              crossFade: element.data('crossfade')
            }
          };
          return obj;
        }

        var $primaryConf = conf($container);
        $primaryConf.prevButton = $this.find('[data-swiper="prev"]');
        $primaryConf.nextButton = $this.find('[data-swiper="next"]');
        $primaryConf.pagination = $this.find('[data-swiper="pagination"]');

        var $ctrlConf = conf($asControl);

        function animateSwiper(selector, slider) {
          var makeAnimated = function animated() {
            selector.find('.swiper-slide-active [data-animate]').each(function(){
              var anim = $(this).data('animate');
              var delay = $(this).data('delay');
              var duration = $(this).data('duration');

              $(this).addClass(anim + ' animated')
              .css({
                webkitAnimationDelay: delay,
                animationDelay: delay,
                webkitAnimationDuration: duration,
                animationDuration: duration
              })
              .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass(anim + ' animated');
              });
            });
          };
          makeAnimated();
          slider.on('SlideChangeStart', function() {
            selector.find('[data-animate]').each(function(){
              var anim = $(this).data('animate');
              $(this).removeClass(anim + ' animated');
            });
          });
          slider.on('SlideChangeEnd', makeAnimated);
        };

        if ($container.length) {
          var $swiper = new Swiper( $container, $primaryConf);
          animateSwiper($this, $swiper);

          if ($asControl.length) {
            var $control = new Swiper( $asControl, $ctrlConf);
            $swiper.params.control = $control;
            $control.params.control = $swiper;
          }

        } else {
          console.log('Swiper container is not defined!');
        };

      });
    },

    background: function() {
      $('[data-bg-image]').each(function() {

        var img = $(this).data('bg-image');

        $(this).css({
          backgroundImage: 'url(' + img + ')',
        });
      });

      $('[data-bg-color]').each(function() {

        var value = $(this).data('bg-color');

        $(this).css({
          backgroundColor: value,
        });
      });
    },

    background_parallax: function() {
      $('[data-parallax="image"]').each(function() {

        var actualHeight = $(this).position().top;
        var speed      = $(this).data('parallax-speed');
        var reSize     = actualHeight - $(window).scrollTop();
        var makeParallax = -(reSize/2);
        var posValue   = makeParallax + "px";

        $(this).css({
          backgroundPosition: '50% ' + posValue,
        });
      });
    },

    countup: function() {
      var options = {
        useEasing : true,
        useGrouping : true,
        separator : ',',
        decimal : '.',
        prefix : '',
        suffix : ''
      };

      var counteEl = $('[data-counter]');

      if (counteEl) {
        counteEl.each(function() {
         var val = $(this).data('counter');

         var countup = new CountUp(this, 0, val, 0, 2.5, options);
         $(this).appear(function() {
          countup.start();
        }, {accX: 0, accY: 0})
       });
      }
    },

    skills: function() {

      $('[data-skillbar]').each(function() {

        var val = $(this).data('skillbar');

        $(this).appear(function() {
          $(this).animate({ width: val + "%" }, { duration: 1000});
        }, {accX: 0, accY: 0});

      });
    },

    map: function() {

      $('.gmap3-area').each(function() {
        var $this  = $(this),
        key    = $this.data('key'),
        lat    = $this.data('lat'),
        lng    = $this.data('lng'),
        mrkr   = $this.data('mrkr');

        $this.gmap3({
          center: [lat, lng],
          zoom: 16,
          mapTypeId : google.maps.MapTypeId.ROADMAP
        })
        .marker(function (map) {
          return {
            position: map.getCenter(),
            icon: mrkr
          };
        })

      });
    },

    header: function() {
      var header  = $('#header'),
          hh      = $('.corpo_bs_navbar', header).innerHeight(),
          faker   = $('#nav_fake_supporter');

      if ($(window).scrollTop() > hh ){
        $('.corpo_bs_navbar', header).addClass('navbar-fixed-top');
        faker.height(hh);
        
      } else {
        $('.corpo_bs_navbar', header).removeClass('navbar-fixed-top');
        faker.height(0);
      }
    },

    share_button: function() {
      $('.dt-share-btn').each(function() {

        $(this).on('click', function(e) {
          e.preventDefault();

          var width  = 575,
              height = 520,
              left   = ($(window).width()  - width)  / 2,
              top    = ($(window).height() - height) / 2,
              opts   = 'status=1' +
                ',width='  + width  +
                ',height=' + height +
                ',top='    + top    +
                ',left='   + left;


          window.open($(this).attr("href"), 'Share', opts);
        });

      });
    }
  };




  DECENTTHEMES.documentOnReady = {
    init: function(){
      DECENTTHEMES.initialize.init();
    },
  };


  DECENTTHEMES.documentOnResize = {
    init: function(){

    },
  };


  DECENTTHEMES.documentOnScroll = {
    init: function(){
      DECENTTHEMES.initialize.header();
      DECENTTHEMES.initialize.background_parallax();
    },

  };

  $(document).ready( DECENTTHEMES.documentOnReady.init );
  $(window).on( 'resize', DECENTTHEMES.documentOnResize.init );
  $(document).on( 'scroll', DECENTTHEMES.documentOnScroll.init );

})(jQuery);