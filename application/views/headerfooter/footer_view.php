 <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/hammer.min.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/icons.js"></script>
    <script src="js/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
    <script>
      $(document).foundation();
    </script>
     <script>
    $(function() {
      var $slides = $('#slides');

      Hammer($slides[0]).on("swipeleft", function(e) {
        $slides.data('superslides').animate('next');
      });

      Hammer($slides[0]).on("swiperight", function(e) {
        $slides.data('superslides').animate('prev');
      });

      $slides.superslides({
        hashchange: true
      });
    });

  </script>

  </body>
</html>