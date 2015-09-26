<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/front/js/bootstrap.min.js"></script>
<script src="/front/js/jquery.bxslider.js"></script>
<script src="/front/js/jquery.collagePlus.js"></script>
<script src="/front/js/jquery.removeWhitespace.js"></script>
<script src="/front/js/jquery.collageCaption.js"></script>
<script src="/front/js/front_js.js"></script>
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
  jQuery('.header-middle nav > ul > li > a').mouseenter(function(){
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

// gallery slider
      $('.bxslider_gallery').bxSlider({
        pagerCustom: '#bx-pager'
      });

  // hover images
  var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
  }
  $(function () {
    $('.img-content img').hover(sourceSwap, sourceSwap);
  });
  // End hover images
});
</script>


<!-- gallery auto arrange images -->
 <script type="text/javascript">

// All images need to be loaded for this plugin to work so
// we end up waiting for the whole window to load in this example
$(window).load(function () {
    $(document).ready(function(){
        collage();
        $('.Collage').collageCaption();
    });
});


// Here we apply the actual CollagePlus plugin
function collage() {
    $('.Collage').removeWhitespace().collagePlus(
        {
            'fadeSpeed'     : 2000,
            'targetHeight'  : 200,
            'effect'        : 'effect-4',
            'direction'     : 'vertical'
        }
    );
};

// This is just for the case that the browser window is resized
var resizeTimer = null;
$(window).bind('resize', function() {
    // hide all the images until we resize them
    $('.Collage .Image_Wrapper').css("opacity", 0);
    // set a timer to re-apply the plugin
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(collage, 200);
});

</script>

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(51.508742,-0.120850);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>