@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sản phẩm <small id="modify-type">Tạo mới</small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.product.add','role'=>'form', 'id'=>'product-form', 'name'=>'product-form')) }}
        <input type="hidden" value="{{ $product['id'] }}" id="id" name="id">
         <!-- Name -->
          <div class="form-group">
            {{ Form::label('name', 'Tên') }}
            {{ Form::input('text','name',$product['name'],array('class'=>'form-control','id'=>'name','placeholder'=>'Tên')) }}
          </div>

          <!-- Cateogy -->
          <div class="form-group">
            {{ Form::label('category', 'Loại') }}
            <div class="dropdown">
              <select name="branch" id="branch" class="form-control">
                  <option value="0"> --- Chọn loại --- </option>
                  @foreach($listBranch as $b)
                    <option value="{{ $b['id']  }}">{{ $b['name'] }}</option>
                  @endforeach
              </select>
            </div>

            <div class="dropdown">
              <select name="cat1" id="cat1" class="form-control">

              </select>
            </div>

            <div class="dropdown">
              <select name="cat2" id="cat2" class="form-control">

              </select>
            </div>

            <div class="dropdown">
              <select name="cat3" id="cat3" class="form-control">

              </select>
            </div>

            <input type="hidden" name="category_id" id="category_id" value="{{ $product['category_id']  }}" />

          </div>

          <!-- Brand -->
          <div class="form-group">
              {{ Form::label('brand', 'Thương hiệu') }}
              <div class="dropdown">
                <select name="brand" id="brand" class="form-control">
                    <option value="0"> --- Chọn thương hiệu --- </option>
                    @foreach($listBrand as $b)
                      <option value="{{ $b['id']  }}">{{ $b['name'] }}</option>
                    @endforeach
                </select>
              </div>
          </div>

          <!-- Gender -->
          <div class="form-group">
              {{ Form::label('gender', 'Nam / Nữ') }}
              <div class="radio">
                <label>
                  <input type="radio" name="gender" id="gender" value="Nam" checked>
                    Nam
                </label>
                <label>
                   <input type="radio" name="gender" id="gender" value="Nữ" checked>
                     Nữ
                </label>
              </div>
          </div>

          <!-- Price Original -->
          <div class="form-group">
                {{ Form::label('price_original', 'Giá') }}
                {{ Form::input('text','price_original',$product['price_original'],array('class'=>'form-control','id'=>'price_original','placeholder'=>'Giá')) }}
          </div>

          <!-- Price Original -->
          <div class="form-group">
                 {{ Form::label('price_new', 'Giá mới') }}
                 {{ Form::input('text','price_new',$product['price_new'],array('class'=>'form-control','id'=>'price_new','placeholder'=>'Giá mới')) }}
          </div>

          <!-- Price Original -->
          <div class="form-group">
                 {{ Form::label('size', 'Size') }}
                 {{ Form::input('text','size',$product['size'],array('class'=>'form-control','id'=>'size','placeholder'=>'Size (cách nhau bằng dấu "  , " )')) }}
          </div>

          <button type="button" id="product-add" class="btn btn-default">Thêm sản phẩm</button>

        {{ Form::close() }}


        <br/>

        <!-- Upload Image -->
        <div id="upload-image-panel" style="display:none">
            <div class="form-group">
                  {{ Form::label('image', 'Hình ảnh') }}
                  {{ Form::open(array('url' => 'upload', 'files' => true, 'id' => 'upload-form')) }}
                     <input type="hidden" value="{{ $product['id'] }}" id="product_id" name="id">
                    {{ Form::file('image', array('class'=>'form-control', 'id'=>'image')) }}
                  {{ Form::close() }}
            </div>

            <button type="button" id="upload-image" class="btn btn-default">Upload</button>

            <div class="form-group">
                <div class="table-responsive">
                    <table id="table-image" class="table table-bordered table-striped">

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-product-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal">Thêm</b> sản phẩm thành công</h4>
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