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
              icon: Drupal.settings.base_path + Drupal.settings.theme_path + "/images/map-marker.png"
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
                {},
                {"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}
              ]
            }
          }
        });
      });

      $(".fullwidth-slider-view", context).each(function() {
        var autoplay = $(this).closest('.slider-wrapper').data('autoplay')

        $(this).owlCarousel({
          autoPlay: autoplay ? autoplay : false,
          slideSpeed: 350,
          singleItem: true,
          autoHeight: true,
          navigation: true,
          navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
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
          navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
      });
    }
  }
})(jQuery);
