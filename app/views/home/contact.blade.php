<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/css/jquery.bxslider.css" rel="stylesheet">
    <link href="/front/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
  </head>
  <body>
    <nav class="nav-res">
            <ul>
              <li>
                <a href="#">Trang chủ</a>
              </li>
              <li>
                <a href="#">Sản phẩm</a>
                <div class="sub-menu row">
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 2</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP WOMENS 2</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 2</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4 col-xs-12">
                    <a href="#">
                      <img src="/front/images/banner_manu.jpg" alt="">
                    </a>
                  </div>
                </div>
              </li>
              <li>
                <a href="#">Giới thiệu</a>
                <div class="sub-menu row">
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 3</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP WOMENS 3</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 3</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4 col-xs-12">
                    <a href="#">
                      <img src="/front/images/banner_manu.jpg" alt="">
                    </a>
                  </div>
                </div>
              </li>
              <li>
                <a href="#">Blog</a>
                <div class="sub-menu row">
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 4</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP WOMENS 4</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-2 col-xs-4">
                    <h2>SHOP MENS 4</h2>
                    <ul>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                      <li>
                        <a href="#">SNEAKERS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4 col-xs-12">
                    <a href="#">
                      <img src="/front/images/banner_manu.jpg" alt="">
                    </a>
                  </div>
                </div>
              </li>
              <li>
                <a href="#">Liên hệ</a>
              </li>
            </ul>
            <div class="clearfix"></div>
    </nav>
    <div class="main">
      <header>
        <div class="header-top">
          <div class="container">
            <p>Free Shipping</p>
          </div>
        </div>
        <div class="header-middle">
          <div class="container">
            <div class="header-mid-top">
              <a href="javascript:;" class="menu-icon"><span class="glyphicon glyphicon-th-list "></span></a>
              <div class="socail-network">
               <a href="#"><i class="icon icon-instergram"></i></a>
               <a href="#"><i class="icon icon-tt"></i></a>
               <a href="#"><i class="icon icon-face"></i></a>
               <a href="#"><i class="icon icon-mail"></i></a>
               <a href="#" class="chat">Chat with me in facebook</a>
              </div>
              <div class="top-nav">
               <ul>
                 <li><a href="#">Store locator</a></li>
                 <li><a href="#">Customer service</a></li>
                 <li><a href="#">Trach / return</a></li>
                 <li><a href="#">Signin / join</a></li>
               </ul>
              </div>
              <div class="cart-content">
               <i class="icon icon-cart"></i>
               <p>GIỎ Hàng <span>(0)</span></p>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="header-mid-bottom row">
              <div class="logo col-md-3 col-sm-3 col-xs-8">
                <h1>
                  <a href="#">
                    Shop Giay
                  </a>
                </h1>
              </div>
              <div class="search-bar col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                <input type="text">
                <span>Tìm kiếm</span>
                <a href="#"><span class="glyphicon glyphicon-search"></span></a>
              </div>
              <div class="clearfix"></div>
            </div>
            <nav>
              <ul>
                <li>
                  <a href="#">Trang chủ</a>
                </li>
                <li>
                  <a href="#">Sản phẩm</a>
                  <div class="sub-menu row">
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 2</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP WOMENS 2</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 2</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <a href="#">
                        <img src="/front/images/banner_manu.jpg" alt="">
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <a href="#">Giới thiệu</a>
                  <div class="sub-menu row">
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 3</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP WOMENS 3</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 3</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <a href="#">
                        <img src="/front/images/banner_manu.jpg" alt="">
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <a href="#">Blog</a>
                  <div class="sub-menu row">
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 4</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP WOMENS 4</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-2 col-xs-4">
                      <h2>SHOP MENS 4</h2>
                      <ul>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                        <li>
                          <a href="#">SNEAKERS</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4 col-xs-12">
                      <a href="#">
                        <img src="/front/images/banner_manu.jpg" alt="">
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <a href="#">Liên hệ</a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </nav>
          </div>
        </div>
        <div class="sub-menu-content-empty">
          <div class="container"></div>
        </div>
        <div class="clearfix"></div>
      </header>
      <div class="banner">
        <div class="banner_images_content">
          <div id="googleMap"></div>
        </div>
        <div class="description_banner">
          <p>
            Pellentesque habitant <br>
            morbi tristique <span>senectus et</span>
          </p>
          <span>Proin malesuada consectetur erat, vitae lacinia</span>
        </div>
      </div>
      <div class="main_content">
        <div class="container">
          <div class="blog-content">
            <h3 class="title">Contact</h3>
            <div class="contact row">
              <div class="col-md-3 col-sm-3 ">
                <div class="logo">
                  <h2>
                    SHop GIAY
                  </h2>
                </div>
                <div class="address">
                  812 Broadway <br>
                  New York, NY 10003 <br>
                  503 N Fairfax Ave <br>
                  Los Angeles, CA 90036 <br>
                </div>
                <div class="socail-network">
                 <a href="#"><i class="icon icon-instergram"></i></a>
                 <a href="#"><i class="icon icon-tt"></i></a>
                 <a href="#"><i class="icon icon-face"></i></a>
                 <a href="#"><i class="icon icon-mail"></i></a>
                 <div class="clearfix"></div>
                 <a href="#" class="chat">Chat with me in facebook</a>
                </div>
              </div>
              <div class="col-md-9 col-sm-9">
                <form action="">
                  <div class="form-group">
                    <label for="exampleInputEmail1">SUBJECT*</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">ORDER NUMBER (IF APPLICABLE)</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">COMMENT*</label>
                    <textarea class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">YOUR NAME*</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">EMAIL*</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn">Send your Question</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <div class="container">
            <div class="banner-ad">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <img src="/front/images/banner_samll_1.jpg" alt="">
                </div>
                <div class="col-sm-6">
                  <img src="/front/images/banner_small_2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="welcome-ad">
              <h3>FLIGHT CLUB</h3>
              <p> For nearly a decade, Flight Club has been the most trusted source for buying and selling the <br>rarest and most coveted sneakers, worldwide. You'll find the deepest and most versatile <br>selection of kicks here -- from Air Jordan to Nike to adidas to New Balance -- available to ship <br> worldwide, and ready to buy at both Flight Club shops between New York and Los Angeles.</p>
            </div>
            <div class="newsletter">
              <div class="row">
                <div class="col-md-6">
                  <label for="">Newsletter</label>
                  <input type="text" placeholder="Fill your email here">
                  <button class="btn">Signup</button>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-6">
                  <img src="/front/images/faebook.jpg" alt="" class="fl">
                  <div class="socail-network">
                   <a href="#"><i class="icon icon-instergram"></i></a>
                   <a href="#"><i class="icon icon-tt"></i></a>
                   <a href="#"><i class="icon icon-face"></i></a>
                   <a href="#"><i class="icon icon-mail"></i></a>
                   <a href="#" class="chat">Chat with me in facebook</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-main-content">
              <div class="row">
                <div class="col-md-2 col-xs-4">
                  <h3>Customer Service</h3>
                  <ul>
                    <li>
                      <a href="#">Track Your Order</a>
                    </li>
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                    <li>
                      <a href="#">Delivery & Return</a>
                    </li>
                    <li>
                      <a href="#">Terms of Use</a>
                    </li>
                    <li>
                      <a href="#">Privacy Policy</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-2 col-xs-4">
                  <h3>Customer Service</h3>
                  <ul>
                    <li>
                      <a href="#">Track Your Order</a>
                    </li>
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                    <li>
                      <a href="#">Delivery & Return</a>
                    </li>
                    <li>
                      <a href="#">Terms of Use</a>
                    </li>
                    <li>
                      <a href="#">Privacy Policy</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-2 col-xs-4">
                  <h3>Customer Service</h3>
                  <ul>
                    <li>
                      <a href="#">Track Your Order</a>
                    </li>
                    <li>
                      <a href="#">FAQ</a>
                    </li>
                    <li>
                      <a href="#">Delivery & Return</a>
                    </li>
                    <li>
                      <a href="#">Terms of Use</a>
                    </li>
                    <li>
                      <a href="#">Privacy Policy</a>
                    </li>
                  </ul>
                </div>
                <div class="col-md-6 col-xs-12">
                  <div class="logo">
                    <h2>
                      SHop GIAY
                    </h2>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-xs-4">
                      <p>812 Broadway</p>
                      <p>New York, NY 10003</p>
                      <p>@ 11th & 12th</p>
                    </div>
                    <div class="col-md-6 col-xs-4">
                      <p>503 N Fairfax Ave</p>
                      <p>Los Angeles, CA 90036</p>
                      <p>@ Shopgiay</p>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </footer>
    </div>
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

    });
    </script>

  </body>
</html>