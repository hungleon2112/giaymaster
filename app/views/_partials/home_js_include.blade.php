<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/front/js/bootstrap.min.js"></script>
    <script src="/front/js/jquery.bxslider.js"></script>
    <!-- Select menus on Android -->
    <script>
    $(function () {
      var nua = navigator.userAgent
      var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
      if (isAndroid) {
        $('select.form-control').removeClass('form-control').css('width', '100%')
      }
    })

    jQuery(document).ready(function() {
      // bx-slider
      $('.bx-slider').bxSlider({
        mode: 'fade',
        auto: true,
        autoControls: true,
        pause: 2000
      });
      // end bx-slider

      // sub menu start
      var hovering = false;
      jQuery('.header-middle > nav > ul > li > a').mouseenter(function(){
          // get current menu data
          var dataSubMenu = jQuery(this).next().html();
          // alert(dataSubMenu);
          if(typeof dataSubMenu !== "undefined")
          {
            hovering = true;
            if(jQuery('.sub-menu-content-empty .container').html() == dataSubMenu && jQuery(".sub-menu-content-empty .container").is(':visible') == true)
            {
                // jQuery(".sub-menu-content-empty").fadeOut();
                // jQuery(this).parents().find('li').removeClass('active');
            }
            else
            {
                // copy data
                jQuery('.sub-menu-content-empty .container').html(dataSubMenu);
      
                // display menu
                jQuery(".sub-menu-content-empty").fadeIn();
            }
          }
          else{
            hovering = false;
            closeMenu();
          }
       });

      jQuery('nav > ul > li > a').mouseleave(function(){
        startTimeout();
        hovering = false;
      });

      jQuery('.sub-menu-content-empty').mouseenter(function(){
        hovering = true;
      });

      jQuery('.sub-menu-content-empty').mouseleave(function(){
        jQuery(".sub-menu-content-empty").fadeOut();
        hovering = false;
      });

      function startTimeout() {
          // This method gives you 1 second to get your mouse to the sub-menu
          timeout = setTimeout(function () {
              closeMenu();
          }, 1000);
      };

      function closeMenu() {
          // Only close if not hovering
          if (!hovering) {
              $('.sub-menu-content-empty').stop(true, true).fadeOut();
          }
      };
      //end sub menu start

      $( "a.menu-icon" ).click(function() {
        $( ".main").toggleClass( "slide-out", 1000, "easeOutSine" );
      });
      $( "a.category-menu" ).click(function() {
        $( ".category").toggleClass( "slide-out", 1000, "easeOutSine" );
      });

      $(".nav-res > ul > li > a").click(function(){
        if($(this).next().is(":visible") != true)
        {
          $('.sub-menu').slideUp();
        }
        $(this).next().slideToggle(function(){

        });
      });

    });
    </script>