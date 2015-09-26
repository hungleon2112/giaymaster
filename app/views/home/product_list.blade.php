@extends('_layouts.home')

@section('content')

<div class="title">
    <p>
      Sản Phẩm Mới
    </p>
  </div>
  <div class="product-main sub-list-product">

    <div class="pd-content">
      @foreach($product_info as $product_id => $info)
        <a href="#" class="img-content">
            <img data-alt-src="../../../{{$info[0]}}" src="../../../{{$info[0]}}" alt="">
        </a>
        <div class="content-product-detail">
            <a href="">
              <h2>{{$info[1]->name}}</h2>
              <p>air jordan 13 retro "grey toe"</p>
              <span>{{$info[1]->price_original}}</span>
            </a>
          </div>
      @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="pages">
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
    </div>
  </div>

@stop