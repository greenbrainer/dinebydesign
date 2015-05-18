var intro = function() { this.init(); };
intro.prototype = {
   init: function () { var $this = this;
      if(!this._setVars()) return;
      this._setEvents();
      this._initParallax();
      // setInterval(function() {
      //    if($this.countIterationsAfterScroll <= 3) {
      //       $this._headerBackgroundSlide();
      //       $this.countIterationsAfterScroll++;
      //    }
      // }, 100);
   },
   
   _setVars: function() { var $this = this;
      this._container = $('.jsIntroContainer');
      if(!this._container) return false;
      this._video = $('.jsIntroVideo');
      if(!this._video) return false;
      this._videoContainer = $('.jsIntroVideoContainer');
      if(!this._videoContainer) return false;
      this._scroll = $('.jsIntroScroll');
      if(!this._scroll) return false;
      this._control = $('.jsIntroControl');
      if(!this._control) return false;
      this._window = $(window);
      if(!this._window) return false;
      this._body = $('body');
      if(!this._body) return false;
      //this._headerBg = $('.headerBg');
      //if(!this._headerBg) return false;
      this._header = $('header');
      if(!this._header) return false;
      
      this.countIterationsAfterScroll = 0;
      this.videoStatus = 1;
      
      return true;
   },
   
   _setEvents: function() { var $this = this;
      this._scroll.on('click', function(e) {
         e.preventDefault();
         
         $this._scrollDown();
      });
      this._control.on('click', function(e) {
         e.preventDefault();
         
         $this._playToggle();
      });
      $(document).on('scroll', function() {
         $this.countIterationsAfterScroll = 0;
         $this._videoParallax();
         //$this._headerBackgroundSlide();
      });
   },
   
   _initParallax: function() { var $this = this;
      if(this._video.get(0)) {
         this._video.get(0).onloadedmetadata = function() {
            $this._container.height($this._video.height());
         };
      }
   },
   
   _videoParallax: function() { var $this = this;
      var bodyScrollTop = parseInt(this._window.scrollTop());
      this._videoContainer.css('top', -(bodyScrollTop/2));
      if(this.videoStatus == 1) {
         if(bodyScrollTop > this._container.height()) {
            this._playToggle();
         }
      }
   },
   
   // _headerBackgroundSlide: function() { var $this = this;
   //    var bodyScrollTop = this._window.scrollTop();
   //    var headerHeight = this._header.height();
   //    if($(window).width() >= 750) {
   //       var after = bodyScrollTop-(this._container.height()-headerHeight);
   //       if(after >= headerHeight) { after = headerHeight; }
   //       this._headerBg.css('height', after);
   //    }
   // },
   
   _scrollDown: function() { var $this = this;
      var containerHeight = this._container.height();
      
      $('html, body').animate({
         scrollTop: containerHeight
      }, 1000, 'swing');
   },
   
   _playToggle: function() { var $this = this;
      if(this._video.text()) {
         if(this._video.get(0).paused) {
            this._video.get(0).play();
            this._control.removeClass('play');
            this._control.addClass('pause');
            this.videoStatus = 1;
         }
         else {
            this._video.get(0).pause();
            this._control.removeClass('pause');
            this._control.addClass('play');
            this.videoStatus = 0;
         }
      }
   }
};