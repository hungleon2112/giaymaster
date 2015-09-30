@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Nhánh hàng <small id="modify-type"><?php echo (!isset($branch) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.branch.add','role'=>'form', 'id'=>'branch-form', 'name'=>'branch-form')) }}
          <input type="hidden" value="{{ isset($branch)?$branch->id:'' }}" id="id" name="id">
         <!-- Name -->
          <div class="form-group">
            {{ Form::label('name', 'Tên') }}
            {{ Form::input('text','name',isset($branch)?$branch->name:'',array('class'=>'form-control','id'=>'name','placeholder'=>'Tên')) }}
          </div>

          <button type="button" id="branch-add" class="btn btn-default"><?php echo (!isset($branch) ? 'Thêm nhánh hàng' : 'Cập nhật nhánh hàng')  ?></button>

         {{ Form::close() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-branch-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($branch) ? 'Thêm' : 'Cập nhật')  ?></b> nhánh hàng thành công</h4>
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