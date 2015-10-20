@extends('_layouts.home_2')

@section('content')

<div class="row blog-content-small cart-content-page">
  <div class="col-md-12">

  <?php
  if(isset($cart))
  {
  ?>

    <table>
      <thead>
        <tr>
          <th colspan="2" class="prodheader">SẢN PHẨM</th>
          <th class="priceheader">GIÁ</th>
          <th class="quantity">SỐ LƯỢNG</th>
          <th class="remove-item">XÓA</th>
          <th class="a-center total-each"><strong>TỔNG CỘNG</strong></th>
        </tr>
      </thead>
      <tbody>
        <?php
        //UtilityHelper::test($cart);
        for($i = 0 ; $i < count($cart) ; $i++)
        {
            if(isset($cart[$i]))
            {
        ?>
        <tr class="order_detail_list" order_detail_id="<?php echo $cart[$i]['id'] ?>" product_id="<?php echo $cart[$i]['product_id'] ?>">
          <td style="text-align: left">
          <a href="/product/detail/<?php echo $cart[$i]['product_id'] ?>">
            <img src="<?php echo $cart[$i]['image'] ?>" alt="">
          </a>
          </td>
          <td style="text-align: left; padding-left: 20px;">
          <a href="/product/detail/<?php echo $cart[$i]['product_id'] ?>">
            <?php echo $cart[$i]['name'] ?>
          </a>
           <br>
               Size: <?php echo $cart[$i]['size'] ?> </td>
          <td><?php echo number_format($cart[$i]['price']) ?> VNĐ</td>
          <td><input class="form-control number-only" id="quantity-change" order_detail_id="<?php echo $cart[$i]['id'] ?>" product_id="<?php echo $cart[$i]['product_id'] ?>" value="<?php echo $cart[$i]['quantity'] ?>" ></td>
          <td>
            <span id="delete-item-cart-btn" cart-item-id="<?php echo $cart[$i]['id'] ?>" class="glyphicon glyphicon-remove"> </span>
          </td>
          <td>
            <strong><?php echo number_format($cart[$i]['total']) ?> VNĐ</strong>
          </td>
        </tr>
        <?php
            }
        }
        ?>
      </tbody>
    </table>


    <div class="row">
        <div class="col-md-8 col-sm-8">
          <div class="row">
            <div class="col-md-6 col-sm-6">

            </div>
            <div class="col-md-6 col-sm-6">

            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 update-cart-btn">
          <button class="btn" id="update-cart-btn"><span class="glyphicon glyphicon-ok"></span>CẬP NHẬT GIỎ HÀNG</button>
        </div>
    </div>




      <div class="row">
        <div class="col-md-8 col-sm-8">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="coupon-code">
                <p>Nhập mã giảm giá (nếu có)</p>
                <input type="text" id="coupon-code">
                <button class="btn btn-default" id="coupon-btn">Nhập</button>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="customer-service">
                <span>Customer service</span>
                <p>
                  If you are experiencing any problems, see our FAQ page for help.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 total-price">
          <table>
            <tr>
              <td>Tổng tiền hàng</td>
              <td>{{number_format($total)}} VNĐ
              <input type="hidden" id="type" value="1">
              <input type="hidden" id="total" value="{{($total)}}">
              <input type="hidden" id="coupon_code" value="{{($coupon_code)}}">
              <input type="hidden" id="total_final" value="{{($total_final)}}">
              </td>
            </tr>
            <tr>
              <td>Giảm giá</td>
              <td>
              <?php
              if(isset($coupon_percentage))
              {
                echo number_format($coupon_percentage) . '%';
              }
              else
              {
                echo '0%';
              }
              ?>
              </td>
            </tr>

            <tr>
              <td><strong>Tổng tiền hàng (Đã giảm giá và chưa tính phí vận chuyển)</strong> </td>
              <td><strong>{{number_format($total_final)}} VNĐ</strong></td>
            </tr>

            <tr>
              <td style="vertical-align: top">Hình thức thanh toán và vận chuyển</td>
              <td>
                  <input type="radio" id="type_id" name="type_id" value="1" checked> Chuyển khoản và nhận hàng <br/>
                  <input type="radio" id="type_id" name="type_id" value="2"> Nhận hàng và trả tiền cho bên chuyển hàng<br/><br/>
                  <span id="type_id_2" style="visibility:visible">
                    (Phí vận chuyển sẽ được chúng tôi liên hệ với bạn để thông báo.)
                  </span>

              </td>
            </tr>

          </table>
          <button class="btn" id="approve-cart-btn"><span class="glyphicon glyphicon-shopping-cart"></span>THANH TOÁN</button>
        </div>
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


<!-- Modal -->
<div class="modal fade" id="loading-modal-cart">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img width="300px; height:300px;" src="http://www.mastertokoonline.com/wp-content/plugins/wp-lazy-load/images/loading.gif">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop