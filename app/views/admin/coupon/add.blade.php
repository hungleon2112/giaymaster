@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Coupon <small id="modify-type"><?php echo (!isset($coupon) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.coupon.add','role'=>'form', 'id'=>'coupon-form', 'name'=>'coupon-form')) }}
          <input type="hidden" value="{{ isset($coupon)?$coupon->id:'' }}" id="id" name="id">
         <!-- Name -->
          <div class="form-group">
            {{ Form::label('code', 'Code') }}
            {{ Form::input('text','code',isset($coupon)?$coupon->code:'',array('class'=>'form-control','id'=>'code','placeholder'=>'Code')) }}
          </div>

            <div class="form-group">
              {{ Form::label('code', 'Mô tả') }}
              {{ Form::input('text','description',isset($coupon)?$coupon->description:'',array('class'=>'form-control','id'=>'description','placeholder'=>'Mô tả')) }}
            </div>

            <div class="form-group">
              {{ Form::label('from_date', 'Từ ngày') }}
              {{ Form::input('text','from_date',isset($coupon)?$coupon->from_date:'',array('class'=>'form-control date-picker','id'=>'from_date', 'data-date-format'=>"yyyy/mm/dd")) }}
            </div>

            <div class="form-group">
              {{ Form::label('to_date', 'Đến ngày') }}
              {{ Form::input('text','to_date',isset($coupon)?$coupon->to_date:'',array('class'=>'form-control date-picker','id'=>'to_date', 'data-date-format'=>"yyyy/mm/dd")) }}
            </div>

          <button type="button" id="coupon-add" class="btn btn-default"><?php echo (!isset($coupon) ? 'Thêm coupon' : 'Cập nhật coupon')  ?></button>

         {{ Form::close() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-coupon-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($coupon) ? 'Thêm' : 'Cập nhật')  ?></b> coupon thành công</h4>
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