var core = function() { this.init(); };
core.prototype = {
   init: function() {
      this._run();
   },

   _run: function() {
      document.imgSvgReplacer = new imgSvgReplacer();
      document.intro = new intro();
      document.slider = new slider();
      document.odometerInit = new odometerInit();
      document.tabs = new tabs();
      document.responsive = new responsive();
      document.contactMap = new contactMap();
      document.header = new header();
      document.menu = new menu();
   }
};

$(document).ready(function(){
   new core();
});
