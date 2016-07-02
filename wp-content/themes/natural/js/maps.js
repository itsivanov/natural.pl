var maps = false;
var config = false;
var aId = 1;

$(document).ready(function() {

  var coordinatesAndInfoForMaps = $('#coordinates_and_info_for_maps').val();

  if(coordinatesAndInfoForMaps != undefined)
  {
      var arrayMaps = coordinatesAndInfoForMaps.split('~');
      var countDiv = arrayMaps.length;

      maps = {};
      for (var i = 1; i < countDiv; i++) {
        var divName = 'map_' + i;
        maps[divName] = divName;
      }

      config = {};
      for (var i = 0; i < countDiv - 1; i++) {
          var items = arrayMaps[i];
          items = items.split('|');

          var divName = 'map_' + (i + 1);

          config[divName] = {};
          config[divName]['lat']       = items[0];
          config[divName]['lng']       = items[1];
          config[divName]['text']      = items[2];
          config[divName]['title']     = items[3];
          config[divName]['link']      = items[4];
      }

      MYMAP.init(16);

  }

  // Large map
  MYMAP.largeMap();

});


var MYMAP = {
  map: null,
	bounds: null,
  mapsIDs : false,
  config : false,
  maps : {},
  markers : {},
};

MYMAP.init = function(zoom) {
    var self = this;

    self.mapsIDs = maps;
    self.config = config;

    // Titles for maps
    for(object in self.mapsIDs)
    {
        var curent = self.mapsIDs[object];
        $('#' + curent).before('<p class="title_maps">' + self.config[curent].title + '</p>');
        $('#' + curent).after('<p class="url_maps"><a href="' + self.config[curent].link + '">Przejdź na storonę &gt;</a></p>');
    }

    MYMAP.coordinateСonversion();
}

MYMAP.showAllWindow = function() {
  var self = this;

  for(var i in self.markers)
  {
    self.openwindow(self.markers[i]);
  }
}

MYMAP.placeMarkers = function(callback) {
    var self = this;

    for(var i in this.mapsIDs)
    {
        var current = self.config[self.mapsIDs[i]];
        var latlng = new google.maps.LatLng(current['lat'], current['lng']);

        self.markers[i] = new google.maps.Marker({
            position: latlng,
            icon: "/wp-content/themes/natural/images/marker.png",
            title: 'Uluru (Ayers Rock)',
            map: self.maps[i],
            id : i
        });


        // To add the marker to the map, call setMap();
        self.markers[i].setMap(self.maps[i]);
        self.markers[i].addListener('click', function() {
          self.openwindow(this);
        });
    }

    callback(true);
}

MYMAP.openwindow = function(marker){

    var current = self.config[marker.id];

    // Content in openwindow
    var shortTitle  = current.text.split(",");
    shortTitle      = '<div class="content_info_window" style="width: 75%; display: inline-block">'
                      + '<div style="font-weight: bold; font-size: 0.9rem;" class="short_title_maps">' +  shortTitle[0] + '</div>';
    var linkBigMaps = '<a id="' + aId + '" href="#" style="display: block; color: #369fd8; text-decoration: none; font-weight: bold; margin-top: 1rem;" '
                      + 'class="link_big_maps link-map">Wyświeti większą mąpę</a>'
                      + '</div>'
                      + '<div style="width: 25%; display: inline-block; vertical-align: top; text-align: center;" class="maps_star">'
                      + '<a style="text-decoration: none;" target="_blank" href="https://accounts.google.com/ServiceLogin">'
                      + '<img src="/wp-content/themes/natural/images/icon-star.png">'
                      + '<span style="display: block; color: #369fd8; font-weight: bold; margin-top: 0.5rem;">Zapisz</span>'
                      + '<a>'
                      + '</div>';

    var all_content = '<div class="content_preview_maps">' + shortTitle + current.text + linkBigMaps + '</div>';
    aId++;

    infowindow = new google.maps.InfoWindow({
      content: all_content
    });
    infowindow.open(marker.map, marker);
}

MYMAP.coordinateСonversion = function() {
    var self = this;

    self.mapsIDs = maps;
    self.config = config;

    for(var i in this.mapsIDs)
    {
        var latlng = new google.maps.LatLng(self.config[self.mapsIDs[i]]['lat'], self.config[self.mapsIDs[i]]['lng']);

        var myOptions = {
          zoom:16,
          center: latlng,
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        self.maps[i] = new google.maps.Map(document.getElementById(this.mapsIDs[i]), myOptions);
    }

    self.placeMarkers(function(done){
      if(done)
      {
        self.showAllWindow();
      }
    });

}

MYMAP.idСonversion = function(){
    var countA = $('.map_container a.link_big_maps').length;
    for (var i = 0; i < countA; i++) {
       $('.map_container a.link_big_maps:eq(' + i + ')').attr("id", i + 1);
    }
}

MYMAP.largeMap = function(){

  $(".map_container").on('click', 'a.link_big_maps', function() {
       $("html").css("height","100%");
       $('.min_menu-cont').css({'height':'auto', 'min-height':'auto'});
       $('.overlay').css({'opacity':'1', 'visibility':'visible'});
       $('.google_maps_' + this.id).addClass('full-map');

       MYMAP.coordinateСonversion();
  });

  $(".map_container").on('click', '.btn-close-map', function() {
      $("html").css("height","auto");
      $('.overlay').css({'opacity':'0', 'visibility':'hidden'});
      $(".map_container > div").removeClass('full-map');
      $('.min_menu-cont').css({'height':'100%', 'min-height':'100%'});

      MYMAP.coordinateСonversion();
      MYMAP.idСonversion();
  });

}
