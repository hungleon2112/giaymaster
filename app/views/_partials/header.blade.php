
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
                                        {{ HTML::linkRoute('category.show',$val->name, [$val->id, 'male'] ) }}
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
                                        {{ HTML::linkRoute('category.show',$val->name, [$val->id, 'female'] ) }}
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
                        <li>
                          <a href="#">5TheWay</a>
                        </li>
                        <li>
                          <a href="#">Nike</a>
                        </li>
                        <li>
                          <a href="#">Adidas</a>
                        </li>
                        <li>
                          <a href="#">Puma</a>
                        </li>
                        <li>
                          <a href="#">RipCurl</a>
                        </li>
                        <li>
                          <a href="#">The NorthFace</a>
                        </li>
                        <li>
                          <a href="#">Overdose</a>
                        </li>
                        <li>
                          <a href="#">KenStyle</a>
                        </li>
                        <li>
                          <a href="#">Real Tree</a>
                        </li>
                        <li>
                          <a href="#">Game Guard</a>
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
