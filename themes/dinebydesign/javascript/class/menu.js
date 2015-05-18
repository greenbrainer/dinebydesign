var menu = function() { this.init(); };
menu.prototype = {
   init: function() {
      if(!this._setVars()) return;
   },

   _setVars: function() { var $this = this;
      this._tabs = $('.jsMenuOpen');
      if(!this._tabs.length) return false;

      var idx = 0;
      this._instances = new Array();
      this._tabs.each(function() {
        $this._instances[idx] = new menuInstance($(this));
        idx++;
      });

      return true;
   },

   refresh: function() {
      if(typeof(this._instances)!='undefined') {
         this._instances = null;
      }
      this.init();
   }
};

var menuInstance = function(obj) { this.init(obj); };
menuInstance.prototype = {
   init: function(obj) {
      if(!this._setVars(obj)) return;
      this._setEvents();
   },

   _setVars: function(obj) {
      this._handler = $(obj);
      if(!this._handler.length) return false;
      
      this._container = this._handler.next('.submenu');
      if(!this._container.length) return false;
      
      return true;
   },

   _setEvents: function() { var $this = this;
      this._handler.on('click', function(e) {
         e.preventDefault();
         
         $this._subMenuToggle();
      });
   },
   
   _subMenuToggle: function() { var $this = this;
      if(this._container.is(':hidden')) {
         this._container.slideDown();
         this._handler.addClass('active');
      }
      else {
         this._handler.removeClass('active');
         this._container.slideUp();
      }
   }
};