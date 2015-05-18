var tabs = function() { this.init(); };
tabs.prototype = {
   init: function () {
      if(!this._setVars()) return;
      this._setEvents();
   },
   
   _setVars: function() { var $this = this;
      this._button = $('.jsTabsButton');
      if(!this._button) return false;
      this._content = $('.jsTabsContent');
      if(!this._content) return false;
      this._belt = $('.jsTabsBelt');
      if(!this._belt) return false;

      return true;
   },
   
   _setEvents: function() { var $this = this;
      this._button.on('click', function(e) {
         e.preventDefault();
         
         $this._tabToggle($(this));
      });
   },
   
   _tabToggle: function(obj) {  var $this = this;
      this._button.removeClass('active');
      this._content.removeClass('active');
      
      obj.addClass('active');
      var tabId = obj.attr('data-tab-id');
      this._content.each(function() {
         if($(this).attr('data-tab-id') == tabId) {
            $(this).addClass('active');
         }
      });
      
      var position = obj.offset();
      var parentPosition = obj.parent().offset();
      var offset = {
          top: position.top - parentPosition.top,
          left: position.left - parentPosition.left
      }
      
      var leftOffset = offset.left;
      this._belt.animate({
         left: leftOffset
      }, 300, 'swing');
   }
};