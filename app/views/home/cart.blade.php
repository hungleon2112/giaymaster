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






<div class="row blog-content-small cart-content-page">
  <div class="col-md-12">
    <table>
      <thead>
        <tr>
          <th colspan="2" class="prodheader">Product</th>
          <th class="priceheader">Current Price</th>
          <th class="quantity">Qty</th>
          <th class="remove-item">Remove</th>
          <th class="a-center total-each"><strong>Total</strong></th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td><img src="images/pd_me_6.jpg" alt=""></td>
          <td> dunk high premium sb "concept car"
               US Size: 9.5 </td>
          <td>$109</td>
          <td>3</td>
          <td>
            <span class="glyphicon glyphicon-remove"></span>
          </td>
          <td>
            <strong> $109</strong>
          </td>
        </tr>

      </tbody>
    </table>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-6">
              <div class="coupon-code">
                <p>Got a coupon code?</p>
                <input type="text">
                <button class="btn btn-default">Submit</button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="customer-service">
                <span>Customer service</span>
                <p>
                  If you are experiencing any problems, see our FAQ page for help.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 total-price">
          <table>
            <tr>
              <td>Subtotal</td>
              <td>$1,674.00</td>
            </tr>
            <tr>
              <td>Tax</td>
              <td>$0.00</td>
            </tr>
            <tr>
              <td>Subtotal (excl. tax)</td>
              <td>$1,674.00</td>
            </tr>
            <tr>
              <td><strong>Subtotal (incl. tax)</strong> </td>
              <td><strong>$1,674.00</strong></td>
            </tr>
          </table>
          <button class="btn"><span class="glyphicon glyphicon-shopping-cart"></span>Continue to checkout</button>
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