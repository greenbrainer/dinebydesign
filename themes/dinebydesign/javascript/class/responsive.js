var responsive = function() { this.init(); };
responsive.prototype = {
   init: function () { var $this = this;
      if(!this._setVars()) return;
      this._setEvents();
      this._onResize();
      this._videoVisibility();
      setTimeout(function() {
         $this._regenerateBg();
      }, 100);
   },
   
   _setVars: function() { var $this = this;
      this._window = $(window);
      this._body = $('body');
      
      this._video = $('.jsIntroVideo');
      this._videoSource = $('.jsIntroVideo source');
      this._videoTmpUrl = $('.jsIntroVideo source').attr('src');
      this._introContainer = $('.jsIntroContainer');
      
      this._sliderMainControlsName = '.slider .bx-controls .bx-pager .bx-pager-item';
      this._slidesCount = 2;
      
      this._sliderTestimonials = $('.jsSliderTestimonials');
      this._sliderTestimonialsWrapperName = '.jsSliderTestimonialsWrapper';
      
      this._tabsContentParent = $('.jsTabsContent').parent('.content');
      
      this._grayBg = $('.rightGrayBg');
      this._orangeBg = $('.rightOrangeBg');
      this._violetBg = $('.rightVioletBg');
      this._sidebar = $('.sidebar');
      this._bgWrapper = $('.bgWrapper');
      
      this._responsiveMenuButton = $('.jsResponsiveMenuButton');
      this._responsiveMenuContainer = $('.jsResponsiveMenuContainer');
      
      this._tabsContentParent = $('.jsTabsContent').parent('.tabsContent');
      
      return true;
   },
   
   _setEvents: function() { var $this = this;
      this._responsiveMenuButton.on('click', function(e) {
         e.preventDefault();
         
         $this._menuToggle();
      });
   },
   
   _menuToggle: function() { var $this = this;
      if(this._responsiveMenuContainer.is(':visible')) {
         this._responsiveMenuContainer.slideUp();
         this._responsiveMenuButton.removeClass('active');
      }
      else {
         this._responsiveMenuContainer.slideDown();
         this._responsiveMenuButton.addClass('active');
      }
   },
   
   _onResize: function() { var $this = this;
      this._window.on('resize', function() {
         $this._runResponsive();
      });
   },
   
   _runResponsive: function() { var $this = this;
      this._regenerateSliderControls();
      this._regenerateSliderTocuhScroll();
      this._regenerateSliderItemsOnScreen();
      this._resizeTabs();
      this._resizeVideo();
      this._regenerateBg();
      this._regenerateHeader();
      this._regenerateTabs();
   },
   
   _regenerateBg: function() { var $this = this;
      if((this._grayBg.text() || this._orangeBg.text() || this._violetBg.text()) && this._sidebar.text()) {
         if(this._bgWrapper.is(':visible')) {
            if(this._grayBg.text()) { var bgWrapper = this._grayBg; }
            if(this._orangeBg.text()) { var bgWrapper = this._orangeBg; }
            if(this._violetBg.text()) { var bgWrapper = this._violetBg; }
            
            var bgHeight = bgWrapper.outerHeight();
            var sidebarOffset = this._sidebar.offset();
            var sidebarWidth = this._window.width()-sidebarOffset.left;
            
            this._bgWrapper.css({
               'left': sidebarOffset.left,
               'width': sidebarWidth,
               'height': bgHeight
            });
         }
      }
   },
   
   _regenerateTabs: function() { var $this = this;
      if(this._tabsContentParent.text()) {
         var tabActive = this._tabsContentParent.find('.active')
         tabActive.css('height', 'auto');
         this._tabsContentParent.height(tabActive.height());
      }
   },
   
   _videoVisibility: function() { var $this = this;
      if(this._video.text()) {
         if(this._window.width() <= 750) {
            this._videoSource.attr('src', '');
            this._video.removeAttr('autoplay', '');
         }
      }
   },
   
   _regenerateHeader: function() { var $this = this;
      if(this._window.width() <= 750) {
         this._body.removeClass('fixedHeader');
      }
      else {
         this._responsiveMenuContainer.show();
      }
   },
   
   _regenerateSliderControls: function() { var $this = this;
      if($($this._sliderMainControlsName).text()) {
         setTimeout(function() {
            if(document.slider.singleSlidePrecentage > 0) {
               $($this._sliderMainControlsName).width(document.slider.singleSlidePrecentage + '%');
            }
         }, 50);
      }
   },
   
   _regenerateSliderTocuhScroll: function() { var $this = this;
      if(this._sliderTestimonials.text() && document.slider.sliderTestimonialsObject.text()) {
         var sliderTestimonialsTouchScroll = true;
         if($(window).width() <= 750) {
            sliderTestimonialsTouchScroll = false;
         }
         
         document.slider.sliderTestimonialsObject.reloadSlider({
            mode: 'vertical',
            slideMargin: 1,
            touchEnabled: sliderTestimonialsTouchScroll,
            onSliderLoad: function() {
               var pagerHeight = parseInt($($this._sliderTestimonialsWrapperName).find('.bx-pager').innerHeight());
               if(pagerHeight > 0) {
                  $($this._sliderTestimonialsWrapperName).find('.bx-pager').css('margin-top', -(pagerHeight/2));
               }
            }
         });
      }
   },
   
   _resizeTabs: function() { var $this = this;
      if(this._tabsContentParent.text()) {
         this._tabsContentParent.height(this._tabsContentParent.find('.active').height());
      }
   },
   
   _resizeVideo: function() { var $this = this;
      if(this._introContainer.text()) {
         if(this._window.width() > 750) {
            this._introContainer.height(this._video.height());
         }
         else {
            this._introContainer.height('auto');
         }
      }
   },
   
   _regenerateSliderItemsOnScreen: function() { var $this = this;
      if(document.slider.sliderObject) {
         var oldSlidesCount = this._slidesCount;
         if($(window).width() <= 750) {
            this._slidesCount = 1;
         }
         else {
            this._slidesCount = 2;
         }
         if(this._slidesCount != oldSlidesCount) {
            document.slider.sliderObject.reloadSlider({
               minSlides: $this._slidesCount,
               maxSlides: $this._slidesCount,
               moveSlides: 1,
               slideWidth: 610
            });
         }
      }
   }
};