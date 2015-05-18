var contactMap = function(){
   this.init();
};
contactMap.prototype = {   

   init: function(){ var $this = this;
      if(typeof(google)=='undefined' || typeof(google.maps)=='undefined') return;
    
      this._maps = $('.jsContactMap');
      if(!this._maps.length) return false;

      this._pin_s = new google.maps.MarkerImage('/themes/dinebydesign/images/marker_map.png', null, null, new google.maps.Point(18, 47));

      var zoom = this._maps.data('zoom');
      if(zoom==undefined) zoom=15;
      else zoom = parseInt(zoom);

      var latString = this._maps.data('lat');
      var lngString = this._maps.data('lng');
      var latlng = new google.maps.LatLng(parseFloat(latString),parseFloat(lngString));

      $this._initMap(this._maps, latlng, zoom);
   },

   _initMap: function(mapObj, latlng, zoom){ var $this = this;

      var style=[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2f2f2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#425a68"},{visibility:"on"}]}];

      var _mapOptions = {
         zoom: zoom,
         center: latlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP,
         panControl: false,
         zoomControl: true,
         zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.LEFT_TOP
         },
         mapTypeControl: false,
         scaleControl: false,
         streetViewControl: false,
         overviewMapControl: false,
         scrollwheel: false,
         draggable: false,
         styles: style
      };   

      var _map = new google.maps.Map(mapObj[0], _mapOptions);

      var _marker = new google.maps.Marker({
         position: latlng,
         map: _map,
         icon: this._pin_s,
         animation: google.maps.Animation.DROP
      });
   }
};