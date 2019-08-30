(function($) {
  Drupal.behaviors.cbf2019ExposedFilters = {
    attach: function (context, settings) {

      $(".map-canvas-view", context).each(function() {
        var gmCenterAddress = $(this).attr("data-address");
        var gmMarkerAddress = $(this).attr("data-address");
        var gmZoom = $(this).data('zoom') ? $(this).data('zoom') : 14;

        $(this).gmap3({
          action: "init",
          marker: {
            address: gmMarkerAddress,
            options: {
              icon: "https://citybibleforum.org/sites/all/themes/cbf2019/map-marker.png"
            }
          },
          map: {
            options: {
              zoom: gmZoom,
              zoomControl: true,
              zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
              },
              mapTypeControl: false,
              scaleControl: false,
              scrollwheel: false,
              streetViewControl: false,
              draggable: true,
              styles: [
                {"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},
                {"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},
                {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},
                {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                {"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},
                {"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},
                {"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},
                {"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},
                {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
                {"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},
                {"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},
                {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},
                {"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
                {"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},
                {"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},
                {"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
                {"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}
              ]
            }
          }
        });
      });

      if (context instanceof jQuery && context.hasClass('map-canvas-view-multiple')) {
        mapSearchPattern = '.view-content';
      }
      else {
        mapSearchPattern = '.map-canvas-view-multiple .view-content';
      }

      $(mapSearchPattern, context).each(function() {
        var gmZoom = $(this).data('zoom') ? $(this).data('zoom') : 14;
        var gmMarkers = [];
        var gmLat;
        var gmLong;
        var gmBounds = new google.maps.LatLngBounds();
        var gmIcon;
        var gmContent;

        var gmInfoWindow = new google.maps.InfoWindow({
          pixelOffset: new google.maps.Size(0, 30)
        });

        $('.marker', this).each(function() {
          gmLat = parseFloat($(this).attr("data-lat"));
          gmLong = parseFloat($(this).attr("data-long"));
          gmIcon = $(this).attr("data-icon");
          gmContent = [];

          $('.marker-item', this).each(function () {
            for (let i = 0; i < this.classList.length; i++) {
              var gmClassName = this.classList.item(i);
              if (gmClassName != 'marker-item') {
                break;
              }
            }
            gmContent.push({
              css: gmClassName,
              content: this.innerHTML
            });
          });

          var addMarker = true;

          for (let i = 0; i < gmMarkers.length; i++) {
            var latLng = gmMarkers[i].getPosition();
            if (Math.abs(latLng.lat() - gmLat) <= 0.0002 && Math.abs(latLng.lng() - gmLong) <= 0.0002) {
              addMarker = false;
              var gmActivity = null;
              var gmName = null;
              var gmAddress = null;
              for (let j = 0; j < gmMarkers[i].data.length; j++) {
                if (gmMarkers[i].data[j].css == 'marker-activity') {
                  gmActivity = gmMarkers[i].data[j];
                }
                if (gmMarkers[i].data[j].css == 'marker-name') {
                  gmName = gmMarkers[i].data.splice(j--, 1);
                }
                if (gmMarkers[i].data[j].css == 'marker-address') {
                  gmAddress = gmMarkers[i].data.splice(j--, 1);
                }
              }
              for (let j = 0; j < gmContent.length; j++) {
                if (gmContent[j].css == 'marker-activity'
                    && gmActivity !== null
                    && gmActivity.content == gmContent[j].content) {
                  continue;
                }
                if (gmContent[j].css == 'marker-name') {
                  gmName = gmContent[j];
                  continue;
                }
                if (gmContent[j].css == 'marker-address') {
                  gmAddress = gmContent[j];
                  continue;
                }
                gmMarkers[i].data.push(gmContent[j]);
              }
              if (gmName !== null) {
                gmMarkers[i].data.push(gmName);
              }
              if (gmAddress !== null) {
                gmMarkers[i].data.push(gmAddress);
              }
              break;
            }
          }

          if (addMarker) {
            gmBounds.extend({lat: gmLat, lng: gmLong});

            var marker = new google.maps.Marker({
                position: {lat: gmLat, lng: gmLong},
                data: gmContent,
                options: {
                  icon: gmIcon
                }
              })
            marker.addListener('click', function() {
              gmInfoWindow.setContent(marker.data);
              gmInfoWindow.open(gmMap, marker);
            });
            gmMarkers.push(marker);
          }
        });

        if (gmMarkers.length == 0) {
          return;
        }

        for (let i = 0; i < gmMarkers.length; i++) {
          var s = '<div class = "marker-content">';
          for (let j = 0; j < gmMarkers[i].data.length; j++) {
            s = s.concat('<div class = "marker-item ', gmMarkers[i].data[j].css, '">', gmMarkers[i].data[j].content, '</div>');
          }
          gmMarkers[i].data = s.concat('</div>');
        }

        var gmMap = new google.maps.Map(
          $(this)[0],
          {
            zoom: gmZoom,
            center: gmBounds.getCenter(),
            zoomControl: true,
            zoomControlOptions: {
              style: google.maps.ZoomControlStyle.SMALL,
              position: google.maps.ControlPosition.RIGHT_CENTER
            },
            mapTypeControl: false,
            scaleControl: false,
            scrollwheel: false,
            streetViewControl: false,
            draggable: true,
            styles: [
              {"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},
              {"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},
              {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},
              {"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
              {"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},
              {"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},
              {"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},
              {"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},
              {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
              {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},
              {"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},
              {"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},
              {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},
              {"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
              {"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},
              {"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},
              {"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
              {"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}
            ]
          }
        );
        gmMap.addListener('click', function() {
          gmInfoWindow.close();
        });

        var gmMarkerClusterer = new MarkerClusterer(
          gmMap,
          gmMarkers,
          {
            imagePath: '/sites/all/themes/cbf2019/images/1/map/m',
            gridSize: 20,
            maxZoom: 15,
          }
        );
        gmMarkerClusterer.setStyles([{
          url: '/sites/all/themes/cbf2019/images/1/map/cluster.png',
          width: 37,
          height: 37,
          textColor: 'white'
        }]);

        if (
          gmBounds.getNorthEast().lat() - gmBounds.getSouthWest().lat() > 0.01
          || gmBounds.getNorthEast().lng() - gmBounds.getSouthWest().lng() > 0.01
        ) {
          gmMap.fitBounds(gmBounds);
        }
      });

      $(".fullwidth-slider-view", context).each(function() {
        var autoplay = $(this).closest('.slider-wrapper').data('autoplay')

        $(this).owlCarousel({
          autoPlay: autoplay ? autoplay : false,
          slideSpeed: 350,
          singleItem: true,
          autoHeight: true,
          navigation: true,
          navigationText: ["<i class='fal fa-angle-left'></i>", "<i class='fal fa-angle-right'></i>"]
        });
      });

      $(".item-carousel-4-view", context).each(function() {
        var autoplay = $(this).closest('.slider-wrapper').data('autoplay')

        $(this).owlCarousel({
          autoPlay: autoplay ? autoplay : false,
          items: 4,
          itemsDesktop: [1199, 3],
          itemsTabletSmall: [768, 2],
          itemsMobile: [480, 1],
          navigation: true,
          navigationText: ["<i class='fal fa-angle-left'></i>", "<i class='fal fa-angle-right'></i>"],
          scrollPerPage : true
        });
      });
    }
  }
})(jQuery);
