@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                User <small id="modify-type"><?php echo (!isset($user) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.user.add','role'=>'form', 'id'=>'user-form', 'name'=>'user-form')) }}
          <input type="hidden" value="{{ isset($user)?$user->id:'' }}" id="id" name="id">
         <!-- Name -->
          <div class="form-group">
              {{ Form::label('name', 'Tên') }}
              {{ Form::input('text','name',isset($user)?$user->name:'',array('class'=>'form-control','id'=>'name','placeholder'=>'Tên', 'required')) }}
            </div>
            <div class="form-group">
              {{ Form::label('name', 'Tên đăng nhập') }}
              {{ Form::input('text','username',isset($user)?$user->username:'',array('class'=>'form-control','id'=>'username','placeholder'=>'Tên đăng nhập', 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Mật khẩu') }}
                {{ Form::input('password','password',isset($user)?$user->password:'',array('class'=>'form-control','id'=>'password','placeholder'=>'Mật khẩu', 'required')) }}
            </div>
            <div class="form-group">
              {{ Form::label('name', 'Nhập lại mật khẩu') }}
              {{ Form::input('password','password',isset($user)?$user->password:'',array('class'=>'form-control','id'=>'re-password','placeholder'=>'Nhập lại mật khẩu')) }}
            </div>
            <div class="form-group">
              {{ Form::label('name', 'Điện thoại') }}
              {{ Form::input('text','phone',isset($user)?$user->phone:'',array('class'=>'form-control','id'=>'phone','placeholder'=>'Điện thoại', 'required')) }}
            </div>
            <div class="form-group">
              {{ Form::label('name', 'Email') }}
              {{ Form::input('text','email',isset($user)?$user->email:'',array('class'=>'form-control','id'=>'email','placeholder'=>'Email', 'required')) }}
            </div>
            <div class="form-group">
              {{ Form::label('name', 'Địa chỉ') }}
              {{ Form::input('text','address',isset($user)?$user->address:'',array('class'=>'form-control','id'=>'address','placeholder'=>'Địa chỉ', 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('role_id', 'Role') }}
                <select class="form-control"  id="role_id" name="role_id">
                    <?php
                    for($i = 0; $i < count($role) ; $i++)
                    {
                    ?>
                        <option value="{{$role[$i]->id}}">{{$role[$i]->name}}</option>
                    <?php
                    }
                    ?>
                </select>
            </div>

          <button type="button" id="user-add" class="btn btn-default"><?php echo (!isset($user) ? 'Thêm User' : 'Cập nhật User')  ?></button>

         {{ Form::close() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-user-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($user) ? 'Thêm' : 'Cập nhật')  ?></b> User thành công</h4>
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
<div class="modal fade" id="loading-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img width="300px; height:300px;" src="http://www.mastertokoonline.com/wp-content/plugins/wp-lazy-load/images/loading.gif">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop