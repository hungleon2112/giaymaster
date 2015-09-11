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
    <div class="col-xs-6">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Thương hiệu</th>
                        <th>Loại</th>
                        <th>Size</th>
                        <th>Nam/Nữ</th>
                        <th>Giá</th>
                        <th>Giá mới</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listProduct as $p)
                        <tr>
                            <td>{{$p->name}}</td>
                            <td>{{$p->brand}}</td>
                            <td>{{$p->category}}</td>
                            <td>{{$p->size}}</td>
                            <td>{{$p->gender}}</td>
                            <td>{{$p->price_original}}</td>
                            <td>{{$p->price_new}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop