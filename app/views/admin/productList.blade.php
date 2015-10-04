@extends('..._layouts.admin')

@section('content')


<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Sản phẩm <small>Danh sách</small>
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
          <button type="button" class="btn btn-default" id="showing-button">Chấp nhận</button>
    </form>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <button type="button" class="btn btn-default" id="edit-button">Cập nhật</button>
        <button type="button" class="btn btn-default" id="delete-button">Xóa</button>
    </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="update-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cập nhật sản phẩm</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="update-list-product-id" name="update-list-product-id">
          <div class="form-group">
            <label for="exampleInputEmail1">Giá</label>
            <input type="text" class="form-control" id="price_original" placeholder="Giá">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Giá mới</label>
            <input type="text" class="form-control" id="price_new" placeholder="Giá mới">
          </div>
          <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="optional_id" id="optional-checkbox-news">Hàng mới
                </label>
                <div class="form-group">
                <input disabled class="form-control date-picker-modal" placeholder="Ngày bắt đầu" data-date-format="yyyy/mm/dd" id="from_date_news" name="from_date_news" />
                </div>
                <div class="form-group">
                <input disabled class="form-control date-picker-modal" placeholder="Ngày kết thúc" data-date-format="yyyy/mm/dd"  id="to_date_news" name="to_date_news" />
                </div>
          </div>
          <div class="checkbox">
              <label>
                  <input type="checkbox" value="2" name="optional_id" id="optional-checkbox-sale">Sale Off
              </label>
              <div class="form-group">
              <input disabled class="form-control date-picker-modal" placeholder="Ngày bắt đầu" data-date-format="yyyy/mm/dd" id="from_date_sale" name="from_date_sale" />
              </div>
              <div class="form-group">
              <input disabled class="form-control date-picker-modal" placeholder="Ngày kết thúc" data-date-format="yyyy/mm/dd"  id="to_date_sale" name="to_date_sale" />
              </div>
           </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-update">Lưu</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Update Panel -->
<div class="modal fade" id="delete-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa sản phẩm</h4>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" id="delete-list-product-id" name="delete-list-product-id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-delete">Xóa</button>
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
                        <th data-sortable="true">Mã</th>
                        <th data-field="name"  data-sortable="true">Tên</th>
                        <th data-sortable="true">Thương hiệu</th>
                        <th data-sortable="true">Loại</th>
                        <th>Size</th>
                        <th data-sortable="true">Nam/Nữ</th>
                        <th data-sortable="true">Giá</th>
                        <th>Giá mới</th>
                        <th>Hàng mới</th>
                        <th>Sale off</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listProduct as $p)
                        <tr>
                            <td></td>
                            <td>
                                <a href="/admin/product/edit?id={{$p->id}}">{{$p->code}}</a>
                            </td>
                            <td>
                                <input type="hidden" value="{{$p->id}}" id="product_id_hidden" name="product_id">
                                <a href="/admin/product/edit?id={{$p->id}}">{{$p->name}}</a>
                            </td>
                            <td>{{$p->brand}}</td>
                            <td>{{$p->branch}} - {{$p->category}}</td>
                            <td>{{$p->size}}</td>
                            <td>{{$p->gender}}</td>
                            <td>{{$p->price_original}}</td>
                            <td>{{$p->price_new}}</td>
                            <td>
                            <div class="form-group">
                                <form name="optional-form-1-{{$p->id}}" id="optional-form-1-{{$p->id}}">
                                    <input type="hidden" name="optional_product_id" id="optional_product_id">
                                    <input type="hidden" value="{{$p->id}}" id="product_id" name="product_id">
                                    <?php
                                        $checked = '';
                                        $from_date = '';
                                        $to_date = '';
                                        if(isset($p->optional_news[0])){
                                            $checked = "checked";
                                            $from_date = $p->optional_news[0]->from_date;
                                            $to_date = $p->optional_news[0]->to_date;
                                        }
                                    ?>
                                    <label>
                                        <input type="checkbox" form-name="optional-form-1-{{$p->id}}" value="1" name="optional_id" id="optional-checkbox"
                                        <?php echo  $checked ?>
                                        >
                                    </label>
                                    <div class="form-group">
                                    <input class="form-control date-picker" placeholder="Ngày bắt đầu" data-date-format="yyyy/mm/dd" id="from_date" name="from_date" value="<?php echo $from_date; ?>"/>
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control date-picker" placeholder="Ngày kết thúc" data-date-format="yyyy/mm/dd"  id="to_date" name="to_date" value="<?php echo $to_date; ?>"/>
                                    </div>
                                </form>
                            </div>
                            </td>
                            <td>
                            <div class="form-group">
                                <form name="optional-form-2-{{$p->id}}" id="optional-form-2-{{$p->id}}">
                                    <input type="hidden" name="optional_product_id" id="optional_product_id">
                                    <input type="hidden" value="{{$p->id}}" id="product_id" name="product_id">
                                    <?php
                                        $checked_2 = '';
                                        $from_date_2 = '';
                                        $to_date_2 = '';
                                        if(isset($p->optional_sale[0])){
                                            $checked_2 = "checked";
                                            $from_date_2 = $p->optional_sale[0]->from_date;
                                            $to_date_2 = $p->optional_sale[0]->to_date;
                                        }
                                    ?>
                                    <label><input type="checkbox" form-name="optional-form-2-{{$p->id}}" value="2" name="optional_id" id="optional-checkbox" <?php echo $checked_2; ?>></label>
                                    <div class="form-group">
                                    <input class="form-control date-picker" placeholder="Ngày bắt đầu" data-date-format="yyyy/mm/dd" id="from_date" name="from_date" value="<?php echo $from_date_2; ?>" />
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control date-picker" placeholder="Ngày kết thúc" data-date-format="yyyy/mm/dd"  id="to_date" name="to_date" value="<?php echo $to_date_2; ?>" />
                                    </div>
                                </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <?php echo $listProduct->links(); ?>
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