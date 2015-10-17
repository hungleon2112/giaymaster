@extends('_layouts.home_2')

@section('content')


<ul class="nav nav-tabs">
    <li
    <?php
    if(Session::get('tab2') != 'true')
    {
    ?>
        class="active"
    <?php
    }
    ?>


    ><a data-toggle="tab" href="#order-list"><h3 class="title">THEO DÕI ĐƠN HÀNG ĐÃ ĐẶT</h3></a></li>
    <?php
    if(Session::get('user_info')->role_id == 5)
    {
    ?>
        <li

        <?php
            if(Session::get('tab2') == 'true')
            {
            ?>
                class="active"
            <?php
            }
        ?>

        ><a data-toggle="tab" href="#discount"><h3 class="title">XEM MỨC CHIẾT KHẤU</h3></a></li>
    <?php
    }
    ?>
</ul>

<div class="tab-content">
    <div id="order-list" class="tab-pane fade
    <?php
        if(Session::get('tab2') != 'true')
        {
            echo "in active";
        }
    ?>
    ">
        <br>
        <div class="row" style="font-size: 16px;">
            <div class="col-xs-12">
            <form class="form-inline">
                  <div class="form-group">
                    <label for="Show">Chọn ngày </label>
                    <input style="border-radius: 4px; font-size: 16px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy"  id="agent-official-from-date" name="agent-official-from-date">
                    -
                    <input style="border-radius: 4px; font-size: 16px" type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy"  id="agent-official-to-date" name="agent-official-to-date">
                  </div>
                  <button style="height: 34px" type="button" class="btn btn-default" id="order-filter-date-button">Chấp nhận</button>
            </form>
            </div>
        </div>
        <br>

        <div class="row" style="font-size: 20px; font-weight: bold">
            <div class="col-md-2 col-sm-2">
                Thời gian đặt
            </div>
            <div class="col-md-2 col-sm-2">
                Trạng thái
            </div>
            <div class="col-md-4 col-sm-4">
                Tổng tiền hàng (Sau giảm giá)
            </div>
            <div class="col-md-2 col-sm-2">
                Tiền ship
            </div>
            <div class="col-md-2 col-sm-2">
                Tổng cộng
            </div>
        </div>
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

                                <div class="col-md-2 col-sm-2" style="padding-left: 0px;">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle "
                                        data-toggle="collapse"
                                        data-parent="#accordion"
                                        href="#{{$list_order[$i]->OrderId}}">{{$list_order[$i]->OrderDate}}</a>
                                    </h4>
                                </div>
                                <div class="col-md-2 col-sm-2" style="padding-left: 0px;">
                                    <h4 class="panel-title">{{$list_order[$i]->Status}}</h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h4 class="panel-title">{{number_format($list_order[$i]->OrderTotalFinal)}} VNĐ</h4>
                                </div>
                                <div class="col-md-2 col-sm-2" style="text-align: center;">
                                    <h4 class="panel-title">{{number_format($list_order[$i]->ShipFee)}} VNĐ</h4>
                                </div>
                                <div class="col-md-2 col-sm-2" style="text-align: center; padding-right: 0px;">
                                    <h4 class="panel-title">{{number_format($list_order[$i]->OrderTotal)}} VNĐ</h4>
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
    </div>
    <div id="discount" class="tab-pane fade
    <?php
        if(Session::get('tab2') == 'true')
        {
            echo "in active";
        }
    ?>
    ">
        <br>
        <div class="row">
            <div class="col-xs-12">
            <form class="form-inline">
                  <div class="form-group">
                    <label for="Show">Chọn tháng</label>
                    <select class="form-control" style="width:80px !important;" id="filter-month-client">
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
                    <select class="form-control" style="width:90px !important;" id="filter-year-client">
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
                  <button style="height: 34px;" type="button" class="btn btn-default" id="filter-month-date-client-button">Chấp nhận</button>
            </form>
            </div>
        </div>
        <br>
        <div class="order-info">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>
                        Tháng / Năm
                    </label>
                    <span style="    font-weight: bold;
                                     font-size: 24px;">
                        <?php echo (Session::get('client_month_order') == '' ? date("n") : Session::get('client_month_order')) ?> / <?php echo (Session::get('client_year_order') == '' ? date("Y") : Session::get('client_year_order')) ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="row order-discount">

            <div class="col-md-6 col-sm-6">

                <div class="form-group">
                    <label>
                        Doanh thu nhánh hàng Quần áo
                    </label>
                    <span>
                        {{number_format($list_user->TotalAoQuan)}} VNĐ
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Doanh thu nhánh hàng Giày dép
                    </label>
                    <span>
                        {{number_format($list_user->TotalGiayDep)}} VNĐ
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Doanh thu nhánh hàng Phụ kiện
                    </label>
                    <span>
                        {{number_format($list_user->TotalPhuKien)}} VNĐ
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Tổng doanh thu
                    </label>
                    <span>
                        {{number_format($list_user->Total)}} VNĐ
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>
                        Mức chiết khấu
                    </label>
                    <span>
                        {{number_format($list_user->DiscountAoQuan)}}% ({{number_format($list_user->TotalAoQuanDiscount)}} VNĐ)
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Mức chiết khấu
                    </label>
                    <span>
                        {{number_format($list_user->DiscountGiayDep)}}% ({{number_format($list_user->TotalGiayDepDiscount)}} VNĐ)
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Mức chiết khấu
                    </label>
                    <span>
                        {{number_format($list_user->DiscountPhuKien)}}% ({{number_format($list_user->TotalPhuKienDiscount)}} VNĐ)
                    </span>
                </div>
                <div class="form-group">
                    <label>
                        Tổng mức chiết khấu
                    </label>
                    <span>
                        ({{number_format($list_user->TotalDiscount)}} VNĐ)
                    </span>
                </div>
            </div>

        </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="cart-approved-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal">Đặt hàng thành công.</b></h4>
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