<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    @include('_partials.home_css_include')

  </head>
  <body>
    @include('_partials.menu')
    <div class="main">
      <header>
        @include('_partials.header')
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
                    @yield('content')
                </div>
              </div>
            </div>

      <footer>
        @include('_partials.footer')
      </footer>

    </div>
    @include('_partials.authenticate')
    @include('_partials.home_js_include')

  </body>
</html>