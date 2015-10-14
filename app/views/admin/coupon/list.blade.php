@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Coupon <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<!--<div class="row">
    <div class="col-xs-12">
    <form class="form-inline">
          <div class="form-group">
            <label for="Show">Hiện dữ liệu trên 1 trang </label>
            <select class="form-control" style="width:80px !important;" id="showing">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="showing-button">Chấp nhận</button>
    </form>
    </div>
</div>-->

<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="edit-button-coupon">Cập nhật</button>
        <button type="button" class="btn btn-default" id="delete-button-coupon">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="update-panel-coupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật coupon</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="update-list-coupon-id" name="update-list-coupon-id">
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="name" placeholder="tên">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-update-coupon">Lưu</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-coupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa coupon</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-coupon-id" name="delete-list-coupon-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-coupon">Xóa</button>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table data-toggle="table" data-search="true"   class="table table-hover" data-sort-order="desc" data-sort-name="name" data-click-to-select="true" >
                <thead>
                    <tr>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="name"  data-sortable="true">Code</th>
                        <th data-field="desc"  data-sortable="true">Mô tả</th>
                        <th data-field="from_date"  data-sortable="true">Từ ngày</th>
                        <th data-field="to_date"  data-sortable="true">Đến ngày</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listCoupon as $p)
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="{{$p->id}}" id="coupon_id_hidden" name="coupon_id">
                                <a href="/admin/coupon/edit?id={{$p->id}}">{{$p->code}}</a>
                            </td>
                            <td>
                                {{$p->description}}
                            </td>
                            <td>
                                {{$p->from_date}}
                            </td>
                            <td>
                                {{$p->to_date}}
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
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