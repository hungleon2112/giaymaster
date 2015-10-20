@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Thương hiệu <small>Danh sách</small>
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
        {{--<button type="button" class="btn btn-default" id="edit-button-brand">Cập nhật</button>--}}
        <button type="button" class="btn btn-default" id="delete-button-brand">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="update-panel-brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật thương hiệu</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="update-list-brand-id" name="update-list-brand-id">
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="name" placeholder="tên">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-update-brand">Lưu</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-brand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa thương hiệu</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-brand-id" name="delete-list-brand-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-brand">Xóa</button>
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
                        <th data-field="name"  data-sortable="true">Tên</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listBrand as $p)
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="{{$p->id}}" id="brand_id_hidden" name="brand_id">
                                <a href="/admin/brand/edit?id={{$p->id}}">{{$p->name}}</a>
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