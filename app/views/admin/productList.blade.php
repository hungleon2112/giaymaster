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
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
          </div>
          <button type="button" class="btn btn-default" id="showing-button">Chấp nhận</button>

    </form>
</div>

<div class="row">
    <div class="col-xs-8">
        <div class="table-responsive">
            <table data-toggle="table" data-search="true"   class="table table-hover" data-sort-order="desc" data-sort-name="name" >
                <thead>
                    <tr>
                        <th data-field="name"  data-sortable="true">Tên</th>
                        <th data-sortable="true">Thương hiệu</th>
                        <th data-sortable="true">Loại</th>
                        <th>Size</th>
                        <th data-sortable="true">Nam/Nữ</th>
                        <th data-sortable="true">Giá</th>
                        <th>Giá mới</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listProduct as $p)
                        <tr>
                            <td><a href="/admin/product/edit?id={{$p->id}}">{{$p->name}}</a></td>
                            <td>{{$p->brand}}</td>
                            <td>{{$p->branch}} - {{$p->category}}</td>
                            <td>{{$p->size}}</td>
                            <td>{{$p->gender}}</td>
                            <td>{{$p->price_original}}</td>
                            <td>{{$p->price_new}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <?php echo $listProduct->links(); ?>
        </div>
    </div>
</div>

@stop