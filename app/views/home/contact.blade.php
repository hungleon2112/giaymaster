@extends('_layouts.home_3')

@section('content')

<h3 class="title">Liên hệ</h3>
<div class="contact row">
  <div class="col-md-3 col-sm-3 ">
    <div class="logo">
      <h2>
        MasterC
      </h2>
    </div>
    <div class="address">
      7A/43 Thành Thái <br>
      P.14 Q.10 TP.HCM <br>
      435 Huỳnh Văn Bánh <br>
      P.14 Q.Phú Nhuận TP.HCM <br>
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
        <label for="exampleInputEmail1">Tiêu đề</label>
        <input type="text" class="form-control" id="subject" name="subject">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nội dung</label>
        <textarea class="form-control" rows="3" name="content"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Tên</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <button type="submit" class="btn">Liên hệ</button>
      </div>
    </form>
  </div>
</div>
@stop