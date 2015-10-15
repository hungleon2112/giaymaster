@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Đơn hàng <small>Danh sách</small>
        </h1>
    </div>
</div>
<!-- /.row -->
{{--<div class="row">--}}
    {{--<div class="col-xs-12">--}}
    {{--<form class="form-inline">--}}
          {{--<div class="form-group">--}}
            {{--<label for="Show">Hiện dữ liệu trên 1 trang </label>--}}
            {{--<select class="form-control" style="width:80px !important;" id="showing">--}}
                {{--<option>10</option>--}}
                {{--<option>30</option>--}}
                {{--<option>50</option>--}}
            {{--</select>--}}
          {{--</div>--}}
          {{--<button type="button" class="btn btn-default" id="showing-order-button">Chấp nhận</button>--}}
    {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}
<br>
<div class="row">
    <div class="col-xs-12">
    <form class="form-inline">
          <div class="form-group">
            <label for="Show">Từ ngày </label>
            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd"  id="agent-beginner-from-date" name="agent-beginner-from-date">

            <label for="Show">Đến ngày </label>
            <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd"  id="agent-beginner-to-date" name="agent-beginner-to-date">
          </div>
          <button type="button" class="btn btn-default" id="agent-beginner-filter-date-button">Chấp nhận</button>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table data-toggle="table" data-search="true"   class="table table-hover" data-sort-order="desc" data-sort-name="date" data-click-to-select="true" >
                <thead>
                    <tr>
                        <th></th>
                        <th data-field="name"  data-sortable="true">Mã hóa đơn</th>
                        <th data-field="date"  data-sortable="true">Thời gian</th>
                        <th data-field="email"  data-sortable="true">Khách hàng</th>
                        <th data-field="total"  data-sortable="true">Tổng đơn</th>
                        <th data-field="code"  data-sortable="true">Khuyến mãi</th>
                        <th data-field="total_final"  data-sortable="true">Tổng cộng</th>
                        <th data-field="ship_fee"  data-sortable="true">Tiền ship</th>
                        <th data-field="status"  data-sortable="true">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_order as $p)
                        <tr>
                            <td><input class="form-control" type="button" id="show-order-detail-on-table" trID="order_detail_of_{{$p->OrderId}}" value="View"/> </td>
                            <td>
                                <input type="hidden" value="{{$p->OrderId}}" id="order_id_hidden_order_detail_of_{{$p->OrderId}}" name="order_id">
                                <input type="hidden" value="{{$p->OrderDate}}" id="order_date_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->OrderTotal}}" id="order_total_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->Customer}}" id="order_customer_hidden_order_detail_of_{{$p->OrderId}}" >
                                <input type="hidden" value="{{$p->OrderTotalFinal}}" id="order_total_final_hidden_order_detail_of_{{$p->OrderId}}" >
                                <input type="hidden" value="{{$p->CouponCode}}" id="order_coupon_code_hidden_order_detail_of_{{$p->OrderId}}" >
                                <input type="hidden" value="{{$p->Status}}" id="order_status_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->StatusId}}" id="order_status_id_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->TranType}}" id="order_tran_type_hidden_order_detail_of_{{$p->OrderId}}">

                                <input type="hidden" value="{{$p->Note}}" id="order_note_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->Storage}}" id="order_storage_hidden_order_detail_of_{{$p->OrderId}}">
                                <input type="hidden" value="{{$p->ShipFee}}" id="order_ship_fee_hidden_order_detail_of_{{$p->OrderId}}">

                                <input type="hidden" value="{{$p->TranTypeId}}" id="order_tran_type_id_hidden_order_detail_of_{{$p->OrderId}}">
                                {{--<a href="/admin/user/edit?id={{$p->OrderId}}">HD{{$p->OrderId}}</a>--}}
                                HD{{$p->OrderId}}
                            </td>
                            <td>
                                {{$p->OrderDate}}
                            </td>
                            <td>
                                {{$p->Customer}}
                            </td>
                            <td>
                                {{number_format($p->OrderTotal)}}
                            </td>
                            <td>
                                <?php
                                if($p->CouponCode != '0' && $p->CouponCode != 'null')
                                {
                                    echo '<a href="/admin/coupon/edit?id='.$p->CouponId.'">'.$p->CouponCode.'</a> - '.$p->CouponPercentage.'%
                                    <br/>
                                    Từ ngày: '.$p->CouponFromDate.'
                                    <br/>
                                    Đến ngày: '.$p->CouponToDate.'
                                    ';
                                }
                                ?>
                            </td>
                            <td>
                                {{number_format($p->OrderTotalFinal)}}
                            </td>
                            <td>
                                {{number_format($p->ShipFee)}}
                            </td>
                            <td>
                                <span class="badge" style="color:white; padding: 10px; background-color: {{$p->Color}}">{{$p->Status}}</span>

                            </td>
                        </tr>

                        <div class="container" id="order_detail_of_{{$p->OrderId}}" style="display: none">
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Mã sản phẩm</b>
                                </div>
                                <div class="col-md-2">
                                    <b>Tên sản phẩm</b>
                                </div>
                                <div class="col-md-2">
                                    <b>Size</b>
                                </div>
                                <div class="col-md-2">
                                    <b>Đơn giá</b>
                                </div>
                                <div class="col-md-2">
                                    <b>Số lượng</b>
                                </div>
                                <div class="col-md-2">
                                    <b>Thành tiền</b>
                                </div>
                            </div>
                            <?php
                            for($j = 0 ; $j < count($p->Order_Detail) ; $j++)
                            {
                                $order_detail = $p->Order_Detail[$j];
                                if(isset($order_detail))
                                {
                            ?>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php echo $order_detail->ProductCode ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $order_detail->ProductName ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $order_detail->OrderDetailSize ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo number_format($order_detail->ProductPrice) ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $order_detail->Quantity ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo number_format($order_detail->OrderDetailTotal) ?>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>


                    @endforeach
                </tbody>
            </table>
            <?php echo $list_order->links(); ?>
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

<!-- Modal Update Panel -->
<div class="modal fade" id="order-detail-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông tin</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row order-info">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Mã hóa đơn: </label>
                        <input type="hidden" id="order-id-update">
                        <input type="hidden" id="order-status-id">
                        <span class="margin-left-10" id="order-id"></span>
                    </div>
                    <div class="form-group">
                        <label>Thời gian: </label>
                        <span class="margin-left-10" id="order-date"></span>
                    </div>
                    <div class="form-group">
                        <label>Khách hàng: </label>
                        <span class="margin-left-10" id="order-customer"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Trạng thái: </label>
                        <span class="margin-left-10" id="order-status"></span>
                    </div>
                    <div class="form-group">
                        <label>Hình thức: </label>
                        <span class="margin-left-10" id="order-tran-type"></span>
                    </div>
                    <div class="form-group">
                        <label>Chi nhánh: </label>
                        <input type="text" name="order-store" id="order-store" class="form-control storage">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Ghi chú: </label>
                        <textarea class="form-control" style="display: inline-block" id="order-note" placeholder="Ghi chú"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tiền ship: </label>
                        <input type="text" name="order-ship-fee" id="order-ship-fee" class="form-control storage number-only">
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="list-order-detail">

                </div>
            </div>
            <div class="row">

            </div>
            <div class="modal-footer" style="text-align:left">
                <div class="form-group">
                    <label style="text-transform: uppercase">Cập nhật trạng thái đơn hàng</label>
                </div>
                <ul id="status-section">

                </ul>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update-order-btn">Cập nhật</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

@stop