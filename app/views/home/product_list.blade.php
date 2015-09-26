@extends('_layouts.home')

@section('content')

<div class="title">
    <p>
      Sản Phẩm Mới
    </p>
  </div>
  <div class="product-main sub-list-product">

    @foreach($list_product as $product)
    <div class="pd-content">
        <a href="/product/detail/{{$product[1]->id}}" class="img-content">
            <img src="{{$product[0][0]->url}}"
            data-alt-src="
            <?php
             if(isset($product[0][1]))
             {
                echo $product[0][1]->url;
             }
             else
             {
                echo $product[0][0]->url;
             }
             ?>
             " alt="">
        </a>
        <div class="content-product-detail">
            <a href="">
              <h2>{{$product[1]->name}}</h2>
              <p>{{$product[1]->description_short}}</p>
              <span>{{$product[1]->price_original}} VNĐ</span>
            </a>
          </div>
    </div>
    @endforeach
    <div class="clearfix"></div>
    <?php echo $list_prod->links(); ?>
    <!--<div class="pages">
      <ul>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-menu-left"></span></a></li>
        <li>
          <a href="#">1</a>
        </li>
        <li>
          <a href="#">2</a>
        </li>
        <li>
          <a href="#">3</a>
        </li>
        <li>
          <a href="#">...</a>
        </li>
        <li>
          <a href="#">10</a>
        </li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-menu-right"></span></a></li>
      </ul>
    </div>-->
  </div>

@stop