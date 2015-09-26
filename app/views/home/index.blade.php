@extends('_layouts.home')

@section('content')

<div class="title">
    <p>
      Sản Phẩm Mới
    </p>
    </div>
    <div class="product-main">
    @foreach($product_img as $product_id => $img)
        <div class="pd-content">
          <a href="#">
            <img src="{{$img}}" alt="">
           </a>
        </div>
    @endforeach
    </div>

@stop