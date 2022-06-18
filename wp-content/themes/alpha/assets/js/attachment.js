(function ($) {
  $(document).ready(function () {
    var slider = tns({
      container: ".slider",
      speed: "300",
      autoplayTimeout: 3000,
      items: 1,
      autoplay: true,
      autoHeight: true,
      contrals: false,
      autoplayButtonOutput: false,

      //  container: "#customize",
      //  items: 3,
      //  controlsContainer: "#customize-controls",
      //  navContainer: "#customize-thumbnails",
      //  navAsThumbnails: true,
      //  autoplay: true,
      //  autoplayTimeout: 1000,
      //  autoplayButton: "#customize-toggle",
      //  swipeAngle: false,
      //  speed: 400
    });
  });
})(jQuery);
