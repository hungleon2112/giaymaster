@extends('_layouts.home')

@section('content')

<div class="title">
<p>
Sản Phẩm
</p>
</div>
<div class="product-main product-detail">
<div class="row">
<div class="col-md-6">
<div class="product-content">
<input type="hidden" value="{{$product_info[1][0]->id}}" id="product_id" />
<input type="hidden" id="size" />
<input type="hidden" id="code"  value="{{$product_info[1][0]->code}}"  />
<input type="hidden" id="name"  value="{{$product_info[1][0]->name}}"  />
<input type="hidden" id="price" value="{{$product_info[1][0]->price_original}}" />
<div class="big-img">
<img src="{{$product_info[0][0]->url}}" alt="">
</div>
<div class="small-img">
<?php
for($i = 1 ; $i < count($product_info[0]); $i ++){
?>
    <a href="#">
      <img src="{{$product_info[0][$i]->url}}" alt="">
    </a>
<?php
}
?>

</div>
</div>
<!--
<div class="social-content">
<img src="/front/images/social_content.jpg" alt="">
</div>
-->
</div>
<div class="col-md-6 detail-text">
<h3>{{$product_info[1][0]->name}}</h3>
<span class="sprice">{{$product_info[1][0]->price_original}} VNĐ</span>
<div class="size">
<span>Size</span>
<ul>
<?php
$size = $product_info[1][0]->size;
$size_list = explode(",", $size);
for($i = 0; $i < count($size_list); $i++)
{
?>
<li>
  <a href="javascript:;" size="{{$size_list[$i]}}" class="size-href" size-value="{{$size_list[$i]}}">{{$size_list[$i]}}</a>
</li>
<?php
}
?>

</ul>
<div class="clearfix"></div>
</div>
<div class="quantity">
<label for="">Quantity</label>

<select class="form-control" id="quantity">
<?php
for($i = 1; $i <= $add_cart_quantity ; $i++)
{
?>
    <option value="{{$i}}">{{$i}}</option>
<?php
}
?>
</select>
</div>
<button class="btn" id="add-to-cart-btn"><span class="glyphicon glyphicon-shopping-cart"></span>Add to Cart</button>
<!--<div class="style-content">
STYLE# 747212-818
</div>-->
<div class="description">
{{$product_info[1][0]->description_full}}
</div>
<div class="size-chart">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingOne">
    <h4 class="panel-title">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Size Chart
        <i class="pull-right glyphicon glyphicon-plus"></i>
      </a>
    </h4>
  </div>
  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
      <div class="tab-size-chart">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Men</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Women</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <div class="sizes mens open">
              <table cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>US</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>UK</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>Europe</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>CM</strong></span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">5.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">38.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">24</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">39</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">24.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">40</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">25</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">40.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">25.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">41</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">26</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">42</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">26.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">42.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">27</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">43</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">27.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">44</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">28</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">44.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">28.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">45</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">29</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">45.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">29.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">46</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">30</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">47</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">30.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">47.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">31</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">48</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">31.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">14</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">48.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">32</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">14</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">49.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">33</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">50.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">34</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">51</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">34.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">17</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">51.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">35</span></p>
                </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">
            <div class="sizes mens open">
              <table cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>US</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>UK</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>Europe</strong></span></p>
                </td>
                <td valign="top">
                <p><span style="color: #000000; font-family: Helvetica;"><strong>CM</strong></span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">5.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">38.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">24</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">39</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">24.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">40</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">25</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">6.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">40.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">25.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">41</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">26</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">7.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">42</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">26.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">42.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">27</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">8.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">43</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">27.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">44</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">28</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">9.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">44.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">28.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">45</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">29</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">10.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">45.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">29.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">46</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">30</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">11.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">47</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">30.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">47.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">31</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">12.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">48</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">31.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">14</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">13</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">48.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">32</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">14</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">49.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">33</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">50.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">34</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">15.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">51</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">34.5</span></p>
                </td>
                </tr>
                <tr>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">17</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">16</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">51.5</span></p>
                </td>
                <td valign="top">
                <p align="right"><span style="color: #000000; font-family: Helvetica;">35</span></p>
                </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 recommened">
<h4> RECOMMENDED </h4>
<div class="product-main sub-list-product">
<div class="pd-content">
<a href="#" class="img-content">
  <img src="/front/images/pd_me_1.jpg" alt="">
</a>
<div class="content-product-detail">
  <a href="">
    <h2>AIR JORDANS </h2>
    <p>air jordan 13 retro "grey toe"</p>
    <span>$275</span>
  </a>
</div>
</div>
<div class="pd-content">
<a href="#" class="img-content">
  <img src="/front/images/pd_me_1.jpg" alt="">
</a>
<div class="content-product-detail">
  <a href="">
    <h2>AIR JORDANS </h2>
    <p>air jordan 13 retro "grey toe"</p>
    <span>$275</span>
  </a>
</div>
</div>
<div class="pd-content">
<a href="#" class="img-content">
  <img src="/front/images/pd_me_1.jpg" alt="">
</a>
<div class="content-product-detail">
  <a href="">
    <h2>AIR JORDANS </h2>
    <p>air jordan 13 retro "grey toe"</p>
    <span>$275</span>
  </a>
</div>
</div>
<div class="pd-content">
<a href="#" class="img-content">
  <img src="/front/images/pd_me_1.jpg" alt="">
</a>
<div class="content-product-detail">
  <a href="">
    <h2>AIR JORDANS </h2>
    <p>air jordan 13 retro "grey toe"</p>
    <span>$275</span>
  </a>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="cart-inform-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal">Thêm vào giỏ hàng thành công.</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop