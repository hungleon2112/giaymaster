
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
       <!--<a href="#" class="chat">Chat with me in facebook</a>-->
      </div>
      <div class="top-nav">
       <?php
        if (isset($user_info))
        {
        ?>
        <ul>
            <a href="#" id="show-user-profile">Xin chào {{$user_info->name}}</a>/
            <a href="/order/show" id="">Theo dõi đơn hàng</a>/
            <a href="#" id="logout-btn">Đăng xuất</a>
        </ul>
        <?php
        }
        else
        {
        ?>
           <a href="#" id="authenticate-button">Đăng nhập / Đăng ký</a>
        <?php
        }
       ?>

      </div>
      <div class="cart-content">
       <i class="icon icon-cart"></i>
       <p>GIỎ Hàng <span id="cart-quantity">({{count(Session::get('giay.cart'))}})</span></p>
      </div>
      <div class="clearfix"></div>
      @include('_partials.cart-top')
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
          <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li>
          <a href="#">Nam</a>
          <div class="sub-menu row">
            @foreach($result as $key => $value)
                <div class="col-md-2 col-xs-4">
                    <h2>{{$key}}</h2>
                    <ul>
                        @foreach($value as $val)
                            <li>
                                {{ HTML::linkRoute('product.list',$val->name, [$val->id, 'male'] ) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <div class="col-md-4 col-xs-12">
              <a href="#">
                <img src="/front/images/banner_manu.jpg" alt="">
              </a>
            </div>
          </div>
        </li>
        <li>
          <a href="#">Nữ</a>
          <div class="sub-menu row">
            @foreach($result as $key => $value)
                <div class="col-md-2 col-xs-4">
                    <h2>{{$key}}</h2>
                    <ul>
                        @foreach($value as $val)
                            <li>
                                {{ HTML::linkRoute('product.list',$val->name, [$val->id, 'female'] ) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
            <div class="col-md-4 col-xs-12">
              <a href="#">
                <img src="/front/images/banner_manu.jpg" alt="">
              </a>
            </div>
          </div>
        </li>
        <li>
          <a href="#">Brands</a>
          <div class="sub-menu row">
            <div class="col-md-2 col-xs-4">
              <h2></h2>
              <ul>
              <?php
              foreach($listBrand as $brand){
              ?>
                  <li>
                    {{ HTML::linkRoute('product.list.brand',$brand->name, $brand->id ) }}
                  </li>
              <?php
              }
              ?>
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
          {{ HTML::linkRoute('contact','Liên hệ' ) }}
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
