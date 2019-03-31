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
        var gmBox;
        var gmIcon;
        var gmContent;

        $('.marker', this).each(function() {
          gmLat = parseFloat($(this).attr("data-lat"));
          gmLong = parseFloat($(this).attr("data-long"));
          gmIcon = $(this).attr("data-icon");
          gmContent = this.innerHTML;

          if (typeof gmBox === 'undefined') {
            gmBox = {
              top: gmLat,
              bottom: gmLat,
              left: gmLong,
              right: gmLong
            };
          }
          else {
            // In Australia gmLat is negative and gmLong is positive
            if (gmLat > gmBox.top) gmBox.top = gmLat;
            if (gmLat < gmBox.bottom) gmBox.bottom = gmLat;
            if (gmLong < gmBox.left) gmBox.left = gmLong;
            if (gmLong > gmBox.right) gmBox.right = gmLong;
          }

          gmMarkers.push({
            latLng: [gmLat, gmLong],
            data: gmContent,
            options: {
              icon: gmIcon
            }
          });
        });

        if (gmMarkers.length == 0) {
          return;
        }

        $(this).gmap3({
          action: "init",
          map: {
            options: {
              zoom: gmZoom,
              center: [ (gmBox.top + gmBox.bottom)/2, (gmBox.left + gmBox.right)/2 ],
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
            },
            events:{
              click: function() {
                var infowindow = $(this).gmap3({get:{name:"infowindow"}});
                if (infowindow) {
                  infowindow.close();
                }
              }
            }
          },
          marker: {
            values: gmMarkers,
            options: {
              draggable: false
            },
            events: {
              click: function(marker, event, context) {
                var map = $(this).gmap3("get"),
                  infowindow = $(this).gmap3({get:{name:"infowindow"}});
                if (infowindow) {
                  infowindow.open(map, marker);
                  infowindow.setContent(context.data);
                } else {
                  $(this).gmap3({
                    infowindow: {
                      anchor: marker,
                      options: {
                        content: context.data,
                        pixelOffset: new google.maps.Size(0, 30)
                      }
                    }
                  });
                }
              }
            }
          }
        });

        if (
          gmMarkers.length > 1
          && (
            gmBox.top - gmBox.bottom > 0.01
            || gmBox.right - gmBox.left > 0.01
          )
        ) {
          $(this).gmap3({
            autofit: {}
          });
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
