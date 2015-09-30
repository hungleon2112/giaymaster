@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Role <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="edit-button-role">Cập nhật</button>
        <button type="button" class="btn btn-default" id="delete-button-role">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="update-panel-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật Role</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="update-list-role-id" name="update-list-role-id">
          <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" id="name" placeholder="tên">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-update-role">Lưu</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-role" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Role</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-role-id" name="delete-list-role-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-role">Xóa</button>
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
                    @foreach($listRole as $p)
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="{{$p->id}}" id="role_id_hidden" name="role_id">
                                <a href="/admin/role/edit?id={{$p->id}}">{{$p->name}}</a>
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