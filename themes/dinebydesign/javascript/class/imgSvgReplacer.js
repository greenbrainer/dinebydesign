var imgSvgReplacer = function() { this.init(); };
imgSvgReplacer.prototype = {
   init: function(){
      if(!this._setVars()) return;
      this._replace();
   },

   _setVars: function(){
      this.vectorImage = $('img.svg');
      if(typeof(this.vectorImage) == 'undefined') return false;

      return true;
   },

   _replace: function(){ var $this = this;
      this.vectorImage.each(function(){
         var img = $(this);
         var imgID = img.attr('id');
         var imgClass = img.attr('class');
         var imgSrc = img.attr('src');

         $.get(imgSrc, function(data){
            var svg = $(data).find('svg');

            if(typeof(imgID) != 'undefined') {
               svg = svg.attr('id', imgID);
            }
            if(typeof(imgClass) != 'undefined') {
               svg = svg.attr('class', imgClass+' svgReplaced');
            }
            
            svg = svg.removeAttr('xmlns:a');

            img.replaceWith(svg);
         }, 'xml');
      });
   }

};