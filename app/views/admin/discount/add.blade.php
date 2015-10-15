@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Discount <small id="modify-type"><?php echo (!isset($discount) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.discount.add','role'=>'form', 'id'=>'discount-form', 'name'=>'discount-form')) }}
          <input type="hidden" value="{{ isset($discount)?$discount->id:'' }}" id="id" name="id">
         <!-- Loại dại lý -->
          <div class="form-group">
            {{ Form::label('name', 'Cấp đại lý') }}
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

        <!-- Loại ngành hàng -->
        <div class="form-group">
          {{ Form::label('name', 'Ngành hàng') }}
          <select class="form-control"  id="branch_id" name="branch_id">
              <?php
              for($i = 0; $i < count($listBranch) ; $i++)
              {
              ?>
                  <option value="{{$listBranch[$i]->id}}">{{$listBranch[$i]->name}}</option>
              <?php
              }
              ?>
          </select>
        </div>
        <!--  -->
        <div class="form-group">
          {{ Form::label('name', 'Từ') }}
          {{ Form::input('text','from_rate',isset($discount)?$discount->from_rate:'',array('class'=>'form-control number-only','id'=>'from_rate','placeholder'=>'')) }}
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Đến') }}
          {{ Form::input('text','to_rate',isset($discount)?$discount->to_rate:'',array('class'=>'form-control number-only','id'=>'to_rate','placeholder'=>'')) }}
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Mức discount') }}
          {{ Form::input('text','percentage',isset($discount)?$discount->percentage:'',array('class'=>'form-control number-only','id'=>'percentage','placeholder'=>'')) }}
        </div>

          <button type="button" id="discount-add" class="btn btn-default"><?php echo (!isset($discount) ? 'Thêm discount' : 'Cập nhật discount')  ?></button>

         {{ Form::close() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-discount-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($discount) ? 'Thêm' : 'Cập nhật')  ?></b> discount thành công</h4>
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