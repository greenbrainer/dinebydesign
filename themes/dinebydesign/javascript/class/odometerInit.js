var odometerInit = function(){
   this.init();
};
odometerInit.prototype = {
   _inited: false,

   init: function() { var $this = this;
      if(!this._setVars()) return;
      this._initAllOdometer();
      setInterval(function(){
         var scroll = $(document).scrollTop();
         $this.onScroll(scroll);
      }, 200);
   },

   _setVars: function() { var $this = this;
      if($(window).width() <= 750) { return false; }
      this._odometers = $('.jsOdometer');
      if(!this._odometers.length) return false;

      this._inited = true;
      
      return true;
   },

   _initAllOdometer: function() { var $this = this;

      this._odometers.each(function(){
         $this._initOdometer($(this));
      });

   },

   _initOdometer: function(obj) {
      var val = obj.text();
      var vl = val.length;
      obj.attr('data-def-val', val);
      var nVal = Math.pow(10, (vl-1));
      if(nVal==1) nVal=0;
      obj.attr('data-null-val', nVal);
      obj.text(nVal);
   },

   _checkAllOdometer: function(scrollBot) { var $this = this;
      this._odometers.each(function() {
         $this._checkOdometer($(this), scrollBot);
      });
   },

   _checkOdometer: function(obj, scrollBot) {
      var objTop = obj.offset().top;

      if(scrollBot > objTop) {
         var oldVal = obj.text();
         var newVal = obj.attr('data-def-val');
         if( newVal != oldVal ){
            obj.text(newVal);
            
            this._inited = false;
         }
      }
   },

   onScroll: function(scrollTop) {
      if(!this._inited) return;
      
      var scrollBot = scrollTop + $(window).height();
      this._checkAllOdometer(scrollBot);
   }
};