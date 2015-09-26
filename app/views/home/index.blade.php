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
          <a href="/product/detail/{{$product_id}}">
            <img src="{{$img}}" alt="" class="image-home">
           </a>
        </div>
    @endforeach
    </div>

@stop