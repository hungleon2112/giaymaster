@extends('_layouts.home_2')

@section('content')

<h3 class="title">Danh sách đơn hàng</h3>
<div class="row blog-content-small blog-detail">
    <div class="col-md-12">
        <?php
        if(count($list_order) > 0)
        {
            for($i = 0 ; $i < count($list_order) ; $i ++)
            {
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-5">
                        <h4 class="panel-title">
                            <a class="accordion-toggle "
                            data-toggle="collapse"
                            data-parent="#accordion"
                            href="#{{$list_order[$i]->OrderId}}">{{$list_order[$i]->OrderDate}} - {{$list_order[$i]->Status}}</a>
                        </h4>
                        </div>
                        <div class="col-md-6 col-md-offset-1" style="text-align: right">
                        <h4>
                            Tổng tiền (sau khuyến mãi): {{number_format($list_order[$i]->OrderTotalFinal)}} VNĐ
                        </h4>
                        </div>
                    </div>
                    <div id="{{$list_order[$i]->OrderId}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-hover cart-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Tên</th>
                                            <th>Size</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Số tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-item-list">
                                        <?php
                                        //UtilityHelper::test($cart);
                                        for($j = 0 ; $j < count($list_order[$i]->Order_Detail) ; $j++)
                                        {
                                            $order_detail = $list_order[$i]->Order_Detail[$j];
                                            if(isset($order_detail))
                                            {
                                        ?>
                                            <tr>
                                                <td>
                                                    <a href="product/detail/<?php echo $order_detail->ProductID ?>">
                                                        <img src="<?php echo $order_detail->Image ?>">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="product/detail/<?php echo $order_detail->ProductID ?>">
                                                        <?php echo $order_detail->ProductName ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $order_detail->OrderDetailSize ?></td>
                                                <td><?php echo number_format($order_detail->ProductPrice) ?> VNĐ</td>
                                                <td><?php echo $order_detail->Quantity ?></td>
                                                <td><?php echo number_format($order_detail->OrderDetailTotal)  ?> VNĐ</td>
                                                <td>

                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        ?>
    </div>
</div>
<div class="">
<?php echo $list_order->links(); ?>
</div>
<!-- Modal -->
<div class="modal fade" id="cart-approved-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal">Đặt hàng thành công.</h4>
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
@stop