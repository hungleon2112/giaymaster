<!-- Modal -->
<div class="modal fade" id="authenticate-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Đăng nhập / Đăng ký</h4>
      </div>
      <div class="modal-body">
         <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Đăng nhập</a></li>
          <li><a data-toggle="tab" href="#menu1">Đăng ký</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3>HOME</h3>
            <p>Some content.</p>
          </div>
          <div id="menu1" class="tab-pane fade">
            <h3>Đăng ký</h3>
            {{ Form::open(array('method' => 'POST','route' => 'admin.product.add','role'=>'form', 'id'=>'register-form', 'name'=>'register-form')) }}
                  <div class="form-group">
                    {{ Form::label('name', 'Tên') }}
                    {{ Form::input('text','name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Tên')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Tên đăng nhập') }}
                    {{ Form::input('text','username','',array('class'=>'form-control','id'=>'username','placeholder'=>'Tên đăng nhập')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('name', 'Mật khẩu') }}
                      {{ Form::input('password','password','',array('class'=>'form-control','id'=>'password','placeholder'=>'Mật khẩu')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Nhập lại mật khẩu') }}
                    {{ Form::input('password','password','',array('class'=>'form-control','id'=>'re-password','placeholder'=>'Nhập lại mật khẩu')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Điện thoại') }}
                    {{ Form::input('text','phone','',array('class'=>'form-control','id'=>'phone','placeholder'=>'Điện thoại')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Email') }}
                    {{ Form::input('text','email','',array('class'=>'form-control','id'=>'email','placeholder'=>'Email')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Địa chỉ') }}
                    {{ Form::input('text','address','',array('class'=>'form-control','id'=>'address','placeholder'=>'Địa chỉ')) }}
                  </div>
                  <button type="button" id="register-btn" class="btn btn-default">Đăng ký</button>
            {{ Form::close() }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->