@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Discount <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="delete-button-discount">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-discount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa discount</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-discount-id" name="delete-list-discount-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-discount">Xóa</button>
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
                        <th data-field="view"></th>
                        <th data-field="role_id"  data-sortable="true">Cấp đại lý</th>
                        <th data-field="branch_id"  data-sortable="true">Ngành hàng</th>
                        <th data-field="from_rate"  data-sortable="true">Từ</th>
                        <th data-field="to_rate"  data-sortable="true">Đến</th>
                        <th data-field="percentage"  data-sortable="true">Mức discount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listDiscount as $p)
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="{{$p->id}}" id="discount_id_hidden" name="discount_id">
                                <a href="/admin/discount/edit?id={{$p->id}}">Cập nhật</a>
                            </td>
                            <td>
                                {{$p->Role}}
                            </td>
                            <td>
                                {{$p->Branch}}
                            </td>
                            <td>
                                {{$p->From}}
                            </td>
                            <td>
                                {{$p->To}}
                            </td>
                            <td>
                                {{$p->Percentage}}
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