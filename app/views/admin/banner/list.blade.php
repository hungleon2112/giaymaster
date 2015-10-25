@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Banner <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="delete-button-banner">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-banner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa banner</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-banner-id" name="delete-list-banner-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-banner">Xóa</button>
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
                        <th data-field="view"  data-sortable="true">View</th>
                        <th data-field="description"  data-sortable="true">Mô tả</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listBanner as $p)
                        <tr>
                            <td></td>
                            <td><a href="/admin/banner/edit?id={{$p->id}}">View</a></td>
                            <td>{{$p->description}}</td>

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