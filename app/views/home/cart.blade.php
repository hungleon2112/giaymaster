@extends('_layouts.home_2')

@section('content')

<h3 class="title">Giỏ hàng</h3>
<div class="row blog-content-small blog-detail">
  <div class="col-md-12">
<?php
if(isset($cart))
{
    ?>
<div class="table-responsive">
    <table  class="table table-hover cart-table">
        <thead>
            <tr>
                <th>Mã hàng</th>
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
            for($i = 0 ; $i < count($cart) ; $i++)
            {
                if(isset($cart[$i]))
                {
            ?>
                <tr>
                    <td>
                        <?php echo $cart[$i]['code'] ?>
                    </td>
                    <td>
                        <?php echo $cart[$i]['name'] ?>
                    </td>
                    <td><?php echo $cart[$i]['size'] ?></td>
                    <td><?php echo number_format($cart[$i]['price']) ?></td>
                    <td><?php echo $cart[$i]['quantity'] ?></td>
                    <td><?php echo number_format($cart[$i]['total']) ?></td>
                    <td>
                        <input value="Xóa" type="button" class="btn primary" id="delete-item-cart-btn" cart-item-id="<?php echo $cart[$i]['id'] ?>">
                    </td>
                </tr>
            <?php
                }
            }
            ?>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td></td>
                <td></td>
                <td><b>Tổng tiền: </b></td>
                <td>{{number_format($total)}} </td>
                <td>
                    <input value="Đặt hàng" type="button" class="btn primary" id="approve-cart-btn">
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <?php
}
else
{
?>
    <p class="empty-cart">{{$_ENV['Cart_Empty_Message']}}</p>
<?php
}
?>
</div>
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