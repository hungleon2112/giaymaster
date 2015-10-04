@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            User <small>Danh sách</small>
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
          <button type="button" class="btn btn-default" id="showing-order-button">Chấp nhận</button>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table data-toggle="table" data-search="true"   class="table table-hover" data-sort-order="desc" data-sort-name="name" data-click-to-select="true" >
                <thead>
                    <tr>
                        <th></th>
                        <th data-field="name"  data-sortable="true">Mã hóa đơn</th>
                        <th data-field="phone"  data-sortable="true">Thời gian</th>
                        <th data-field="email"  data-sortable="true">Khách hàng</th>
                        <th data-field="address"  data-sortable="true">Tổng cộng</th>
                        <th data-field="role"  data-sortable="true">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_order as $p)
                        <tr>
                            <td><input class="form-control" type="button" id="show-order-detail-on-table" trID="order_detail_of_{{$p->OrderId}}" value="View"/> </td>
                            <td>
                                <input type="hidden" value="{{$p->OrderId}}" id="order_id_hidden" name="order_id">
                                <input type="hidden" value="{{$p->OrderDate}}" id="order_date_hidden">
                                <input type="hidden" value="{{$p->Total}}" id="order_total_hidden">
                                <input type="hidden" value="{{$p->Customer}}" id="order_customer_hidden" >
                                <input type="hidden" value="{{$p->Status}}" id="order_status_hidden">
                                <a href="/admin/user/edit?id={{$p->OrderId}}">HD{{$p->OrderId}}</a>
                            </td>
                            <td>
                                {{$p->OrderDate}}
                            </td>
                            <td>
                                {{$p->Customer}}
                            </td>
                            <td>
                                {{$p->Total}}
                            </td>
                            <td>
                                {{$p->Status}}
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
                                        <?php echo $order_detail->ProductPrice ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $order_detail->Quantity ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo $order_detail->OrderDetailTotal ?>
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
  <div class="modal-dialog" role="document" style="width: 65%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thông tin</h4>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <table>
                        <tr>
                            <td>Mã hóa đơn: </td>
                            <td><span class="margin-left-10" id="order-id"></span></td>
                        </tr>
                        <tr>
                            <td>Thời gian: </td>
                            <td><span class="margin-left-10" id="order-date"></span></td>
                        </tr>
                        <tr>
                            <td>Khách hàng: </td>
                            <td><span class="margin-left-10" id="order-customer"></span></td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <td>Trạng thái: </td>
                            <td><span class="margin-left-10" id="order-status"></span></td>
                        </tr>
                        <tr>
                            <td>Chi nhánh: </td>
                            <td><span class="margin-left-10" id="order-store"></span></td>
                        </tr>
                        <tr>

                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <textarea class="form-control" placeholder="Ghi chú"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="list-order-detail">

                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

@stop