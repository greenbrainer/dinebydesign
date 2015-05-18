var header = function() { this.init(); };
header.prototype = {
   init: function () { var $this = this;
      if(!this._setVars()) return;
      this._setEvents();
   },
   
   _setVars: function() { var $this = this;
      this._window = $(window);
      this._body = $('body');
      
      return true;
   },
   
   _setEvents: function() { var $this = this;
      $(document).on('scroll', function() {
         $this._fixedHeader();
      });
   },
   
   _fixedHeader: function() { var $this = this;
      if(this._window.width() > 750) {
         var bodyScrollTop = this._window.scrollTop();
         if(bodyScrollTop >= 69) {
            this._body.addClass('fixedHeader');
         }
         else {
            this._body.removeClass('fixedHeader');
         }
      }
   }
};