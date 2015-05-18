var slider = function() { this.init(); };
slider.prototype = {
   init: function () {
      if(!this._setVars()) return;
      this._runSliders();
   },
   
   _setVars: function() { var $this = this;
      this._sliderMain = $('.jsSliderContainer');
      
      this._sliderMainControlsName = '.slider .bx-controls .bx-pager .bx-pager-item';
      
      this._sliderTwitter = $('.jsSliderTwitter');
      
      this._sliderTestimonials = $('.jsSliderTestimonials');
      
      this._sliderTestimonialsName = '.jsSliderTestimonials';
      
      this._sliderTestimonialsWrapperName = '.jsSliderTestimonialsWrapper';
      
      this.singleSlidePrecentage = 0;
      
      this.sliderObject = null;
      this.sliderTestimonialsObject = null;
      
      this._sliderGallery = $('.jsSliderGallery');

      return true;
   },
   
   _runSliders: function() { var $this = this;
      if(this._sliderMain.length > 1) {
         var slidesCount = 2;
         if($(window).width() <= 750) {
            slidesCount = 1;
         }
         this.sliderObject = this._sliderMain.bxSlider({
            minSlides: slidesCount,
            maxSlides: slidesCount,
            moveSlides: 1,
            slideWidth: 610,
            onSliderLoad: function() {
               var countSlider = parseInt($this._sliderMain.getSlideCount());
               if(countSlider > 0) {
                  $this.singleSlidePrecentage = 100/countSlider;
                  $($this._sliderMainControlsName).width($this.singleSlidePrecentage + '%');
               }
            }
         });
      }
      
      if(this._sliderTwitter) {
         this._sliderTwitter.bxSlider();
      }
      
      if(this._sliderTestimonials) {
         var sliderTestimonialsTouchScroll = true;
         if($(window).width() <= 750) {
            sliderTestimonialsTouchScroll = false;
         }
         this.sliderTestimonialsObject = this._sliderTestimonials.bxSlider({
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
      
      if(this._sliderGallery) {
         this._sliderGallery.bxSlider();
      }
   }
};