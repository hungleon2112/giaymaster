@extends('_layouts.home_3')

@section('content')

<h3 class="title">Contact</h3>
<div class="contact row">
  <div class="col-md-3 col-sm-3 ">
    <div class="logo">
      <h2>
        SHop GIAY
      </h2>
    </div>
    <div class="address">
      812 Broadway <br>
      New York, NY 10003 <br>
      503 N Fairfax Ave <br>
      Los Angeles, CA 90036 <br>
    </div>
    <div class="socail-network">
     <a href="#"><i class="icon icon-instergram"></i></a>
     <a href="#"><i class="icon icon-tt"></i></a>
     <a href="#"><i class="icon icon-face"></i></a>
     <a href="#"><i class="icon icon-mail"></i></a>
     <div class="clearfix"></div>
     <a href="#" class="chat">Chat with me in facebook</a>
    </div>
  </div>
  <div class="col-md-9 col-sm-9">
    <form action="">
      <div class="form-group">
        <label for="exampleInputEmail1">SUBJECT*</label>
        <input type="text" class="form-control" id="exampleInputEmail1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">ORDER NUMBER (IF APPLICABLE)</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">COMMENT*</label>
        <textarea class="form-control" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">YOUR NAME*</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">EMAIL*</label>
        <input type="text" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <button type="submit" class="btn">Send your Question</button>
      </div>
    </form>
  </div>
</div>
@stop