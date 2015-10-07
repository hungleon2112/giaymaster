 <div class="shopping-cart-top">
   <div class="row">
     <div class="col-md-9 cart-main-content">

       <ul id="top-cart">
       <?php
       $total = 0;
       if(isset($cart))
       {
       ?>
       <?php
           for($i = 0 ; $i < count($cart) ; $i++)
           {
               if(isset($cart[$i]))
               {
           ?>
             <li>
               <div class="img-content">
               <a href="/product/detail/<?php echo $cart[$i]['product_id'] ?>">
                 <img src="<?php echo $cart[$i]['image'] ?>" alt="">
               </a>
               </div>
               <div class="img-detail">
                 <a href="/product/detail/<?php echo $cart[$i]['product_id'] ?>">
                   <h2><?php echo $cart[$i]['name'] ?></h2>
                 </a>
                 <span>Size: <?php echo $cart[$i]['size'] ?></span><br/>
                 <span>Số lượng: <?php echo $cart[$i]['quantity'] ?></span><br/>
                 <span class="price-cart-top"><?php echo
                 number_format($cart[$i]['price'] * $cart[$i]['quantity'] * 1.0) ?> VNĐ</span>
               </div>
             </li>
           <?php
                    $total += $cart[$i]['price'] * $cart[$i]['quantity'];
               }
           }
           ?>
       <?php
       }
       ?>
       </ul>
     </div>
     <div class="col-md-3 cart-detail">
       <p class="total-top-cart">Tổng cộng <?php echo number_format($total); ?> VNĐ</p>
       <input type="hidden" name="total-top-cart" id="total-top-cart" value="<?php echo ($total); ?>">
       <!--<p>Final price is guaranteed only at checkout</p>-->
       <a id="show-cart" href="/cart/show"><button class="btn"><span class="glyphicon glyphicon-shopping-cart"></span> THANH TOÁN</button></a>
     </div>
   </div>
   <div class="clearfix"></div>
 </div>