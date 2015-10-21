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
            <h3>Đăng nhập</h3>
            {{ Form::open(array('method' => 'POST','route' => 'user.login','role'=>'form', 'id'=>'login-form', 'name'=>'login-form', 'data-toggle' => 'validator')) }}

                  <div class="form-group">
                    {{ Form::label('name', 'Tên đăng nhập') }}
                    {{ Form::input('text','username','',array('class'=>'form-control','id'=>'usernameLogin','placeholder'=>'Tên đăng nhập', 'required')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('name', 'Mật khẩu') }}
                      {{ Form::input('password','password','',array('class'=>'form-control','id'=>'passwordLogin','placeholder'=>'Mật khẩu', 'required')) }}
                  </div>

                  <button type="button" id="login-btn" class="btn btn-default">Đăng nhập</button>
            {{ Form::close() }}
            <input type="hidden" id="is-from-approve" value="false" />
          </div>
          <div id="menu1" class="tab-pane fade">
            <h3>Đăng ký</h3>
            {{ Form::open(array('method' => 'POST','route' => 'user.register','role'=>'form', 'id'=>'register-form', 'name'=>'register-form', 'data-toggle' => 'validator')) }}
                  <div class="form-group">
                    {{ Form::label('name', 'Tên') }}
                    {{ Form::input('text','name','',array('class'=>'form-control','id'=>'name','placeholder'=>'Tên', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Tên đăng nhập') }}
                    {{ Form::input('text','username','',array('class'=>'form-control','id'=>'username','placeholder'=>'Tên đăng nhập', 'required')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('name', 'Mật khẩu') }}
                      {{ Form::input('password','password','',array('class'=>'form-control','id'=>'password','placeholder'=>'Mật khẩu', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Nhập lại mật khẩu') }}
                    {{ Form::input('password','password','',array('class'=>'form-control','id'=>'re-password','placeholder'=>'Nhập lại mật khẩu')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Điện thoại') }}
                    {{ Form::input('text','phone','',array('class'=>'form-control','id'=>'phone','placeholder'=>'Điện thoại', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Email') }}
                    {{ Form::input('text','email','',array('class'=>'form-control','id'=>'email','placeholder'=>'Email', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Địa chỉ') }}
                    {{ Form::input('text','address','',array('class'=>'form-control','id'=>'address','placeholder'=>'Địa chỉ', 'required')) }}
                  </div>
                  <button type="button" id="register-btn" class="btn btn-default">Đăng ký</button>
            {{ Form::close() }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div class="modal fade" id="update-user-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cập nhật thông tin</h4>
      </div>
      <div class="modal-body">
        <div class="tab-content">
            {{ Form::open(array('method' => 'POST','route' => 'user.edit','role'=>'form', 'id'=>'update-form', 'name'=>'update-form', 'data-toggle' => 'validator')) }}
                  <div class="form-group">
                    {{ Form::label('name', 'Tên') }}
                    {{ Form::input('text','name_update','',array('class'=>'form-control','id'=>'name_update','placeholder'=>'Tên', 'required')) }}
                  </div>
                  <div class="form-group">
                      {{ Form::label('name', 'Mật khẩu') }}
                      {{ Form::input('password','password_update','',array('class'=>'form-control','id'=>'password_update','placeholder'=>'Mật khẩu', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Nhập lại mật khẩu') }}
                    {{ Form::input('password','password_update','',array('class'=>'form-control','id'=>'re-password_update','placeholder'=>'Nhập lại mật khẩu')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Điện thoại') }}
                    {{ Form::input('text','phone_update','',array('class'=>'form-control','id'=>'phone_update','placeholder'=>'Điện thoại', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Email') }}
                    {{ Form::input('text','email_update','',array('class'=>'form-control','id'=>'email_update','placeholder'=>'Email', 'required')) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('name', 'Địa chỉ') }}
                    {{ Form::input('text','address_update','',array('class'=>'form-control','id'=>'address_update','placeholder'=>'Địa chỉ', 'required')) }}
                  </div>
                  <button type="button" id="update-user-btn" class="btn btn-default">Cập nhật</button>
            {{ Form::close() }}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->