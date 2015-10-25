
        <ul class="bx-slider">
        <?php
        for($i = 0 ; $i < count($banner_list) ; $i ++)
        {
        ?>
          <li>
            <div class="banner_/front/images_content">
              <img src=<?php echo $_ENV['Domain_Name'].$banner_list[$i]->url ?> alt="">
            </div>
            <div class="description_banner">
              <?php echo $banner_list[$i]->description ?>
              {{--<button class="btn btn-buy">Mua Hàng</button>--}}
            </div>
          </li>
        <?php
        }
        ?>

        </ul>
