<nav class="nav-res">
        <ul>
          <li>
            <a href="#">Trang chủ</a>
          </li>
          <li class="active">
            <a href="#">Nam <i class=" pull-right glyphicon glyphicon-chevron-down"></i></a>
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
              <div class="col-md-4 col-xs-12 banner-ad-content">
                <a href="#">
                  <img src="/front/images/banner_manu.jpg" alt="">
                </a>
              </div>
            </div>
          </li>
          <li>
              <a href="#">Nữ <i class=" pull-right glyphicon glyphicon-chevron-down"></i></a>
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
                <div class="col-md-4 col-xs-12 banner-ad-content">
                  <a href="#">
                    <img src="/front/images/banner_manu.jpg" alt="">
                  </a>
                </div>
              </div>
          </li>
          <li>
            <a href="#">Brands <i class="pull-right glyphicon glyphicon-chevron-down"></i></a>
            <div class="sub-menu row">
              <div class="col-md-2 col-xs-12">
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
              <div class="col-md-4 col-xs-12 banner-ad-content">
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