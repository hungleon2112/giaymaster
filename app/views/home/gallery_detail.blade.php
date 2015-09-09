@extends('_layouts.home_2')

@section('content')
<h3 class="title">Gallery</h3>
<div class="row blog-content-small gallery">
  <ul class="bxslider_gallery">
    <li><img src="/front/images/gallery/1.jpg" /></li>
    <li><img src="/front/images/gallery/2.jpg" /></li>
    <li><img src="/front/images/gallery/3.jpg" /></li>
    <li><img src="/front/images/gallery/4.jpg" /></li>
  </ul>
  <div id="bx-pager">
    <a data-slide-index="0" href=""><img src="/front/images/gallery/thumb/1.jpg" /></a>
    <a data-slide-index="1" href=""><img src="/front/images/gallery/thumb/2.jpg" /></a>
    <a data-slide-index="2" href=""><img src="/front/images/gallery/thumb/3.jpg" /></a>
    <a data-slide-index="3" href=""><img src="/front/images/gallery/thumb/4.jpg" /></a>

  </div>
</div>
@stop