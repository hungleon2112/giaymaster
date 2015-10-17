@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Đại lý chính thức <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12">
    <form class="form-inline">
          <div class="form-group">
            <label for="Show">Hiện dữ liệu trên 1 trang </label>
            <select class="form-control" style="width:80px !important;" id="showing">
                <option>10</option>
                <option>30</option>
                <option>50</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="showing-user-button">Chấp nhận</button>
    </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
    <form class="form-inline">
          <div class="form-group">
            <label for="Show">Chọn tháng</label>
            <select class="form-control" style="width:80px !important;" id="filter-month-agent">
                <?php
                for($i = 1; $i <= 12; $i ++)
                {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
			<label for="Show">Chọn năm</label>
            <select class="form-control" style="width:90px !important;" id="filter-year-agent">
                <?php
                for($i = 2010; $i <= 2050; $i ++)
                {
                ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
                }
                ?>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="filter-month-date-agent-button">Chấp nhận</button>
    </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="delete-button-user">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa Đại lý</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-user-id" name="delete-list-user-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete-user">Xóa</button>
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
                        <th data-field="phone"  data-sortable="true">Điện thoại</th>
                        <th data-field="email"  data-sortable="true">Email</th>
                        <th data-field="address"  data-sortable="true">Địa chỉ</th>
                        <th data-field="aoquan-branch"  data-sortable="true">Tổng ngành hàng Quần áo<br/> (<?php echo (Session::get('month_order')) != '' ? Session::get('month_order') : date("m"); ?>/<?php echo (Session::get('year_order')) != '' ? Session::get('year_order') : date("Y"); ?>)</th>
                        <th data-field="giaydep-branch"  data-sortable="true">Tổng ngành hàng Giày dép<br/> (<?php echo (Session::get('month_order')) != '' ? Session::get('month_order') : date("m"); ?>/<?php echo (Session::get('year_order')) != '' ? Session::get('year_order') : date("Y"); ?>)</th>
                        <th data-field="phukien-branch"  data-sortable="true">Tổng ngành hàng Phụ kiện <br/>(<?php echo (Session::get('month_order')) != '' ? Session::get('month_order') : date("m"); ?>/<?php echo (Session::get('year_order')) != '' ? Session::get('year_order') : date("Y"); ?>)</th>
                        <th data-field="all-branch"  data-sortable="true">Tổng đơn hàng<br/> (<?php echo (Session::get('month_order')) != '' ? Session::get('month_order') : date("m"); ?>/<?php echo (Session::get('year_order')) != '' ? Session::get('year_order') : date("Y"); ?>)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listUser as $p)
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" value="{{$p->Id}}" id="user_id_hidden" name="user_id">
                                <a href="/admin/agentOfficial/order/list/{{$p->Id}}">{{$p->Name}}</a>
                            </td>
                            <td>
                                {{$p->Phone}}
                            </td>
                            <td>
                                {{$p->Email}}
                            </td>
                            <td>
                                {{$p->Address}}
                            </td>
                            <td>
                                {{number_format($p->TotalAoQuan)}} <br>
								Mức discount: {{number_format($p->DiscountAoQuan)}}% <br>
								Tiền discount: {{number_format($p->TotalAoQuanDiscount)}}
                            </td>
                            <td>
                                {{number_format($p->TotalGiayDep)}} <br>
								Mức discount: {{number_format($p->DiscountGiayDep)}}% <br>
								Tiền discount: {{number_format($p->TotalGiayDepDiscount)}}
                            </td>
                            <td>
                                {{number_format($p->TotalPhuKien)}} <br>
								Mức discount: {{number_format($p->DiscountPhuKien)}}% <br>
								Tiền discount: {{number_format($p->TotalPhuKienDiscount)}}
                            </td>
                            <td>
                                {{number_format($p->Total)}} <br>
								Tiền discount: {{number_format($p->TotalDiscount)}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <?php echo $listUser->links(); ?>
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