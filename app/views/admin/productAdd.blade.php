@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sản phẩm <small id="modify-type"><?php echo (!isset($product) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.product.add','role'=>'form', 'id'=>'product-form', 'name'=>'product-form')) }}
        <input type="hidden" value="{{ isset($product)?$product->id:'' }}" id="id" name="id">

        <!-- Code -->
          <div class="form-group">
            {{ Form::label('name', 'Mã sản phẩm') }}
            {{ Form::input('text','code',isset($product)?$product->code:'',array('class'=>'form-control','id'=>'code','placeholder'=>'Mã sản phẩm')) }}
          </div>

         <!-- Name -->
          <div class="form-group">
            {{ Form::label('name', 'Tên') }}
            {{ Form::input('text','name',isset($product)?$product->name:'',array('class'=>'form-control','id'=>'name','placeholder'=>'Tên')) }}
          </div>

          <!-- Cateogy -->
          <div class="form-group">
            {{ Form::label('category', 'Loại') }}
            <?php
            if(isset($product))
                {
                    echo '<div class="dropdown">';
                    echo Form::input('text','name','Đang chọn: '.isset($product)?$product->category:'',array('style'=>'width:50%;','class'=>'form-control','id'=>'name','placeholder'=>'Tên','disabled'));
                    echo '</div>';
                }
            ?>
            <div class="dropdown">
              <select name="branch" id="branch-dd" class="form-control">
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

            <input type="hidden" name="category_id" id="category_id" value="{{ isset($product)?$product->category_id:''  }}" />

          </div>

          <!-- Brand -->
          <div class="form-group">
              {{ Form::label('brand', 'Thương hiệu') }}
              <?php
                      if(isset($product))
                          {
                              echo '<div class="dropdown">';
                              echo Form::input('text','name','Đang chọn: '.isset($product)?$product->brand:'',array('style'=>'width:50%;','class'=>'form-control','id'=>'name','placeholder'=>'Tên','disabled'));
                              echo '</div>';
                          }
                      ?>
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
                  <input type="radio" name="gender" id="gender" value="Nam"
                  <?php
                  if(isset($product))
                  {
                    if($product->gender == 'Nam')
                    {
                       echo 'checked';
                    }
                  }
                  else
                  {
                    echo 'checked';
                  }
                  ?>
                  >
                    Nam
                </label>
                <label>
                   <input type="radio" name="gender" id="gender" value="Nữ"
                   <?php
                     if(isset($product))
                     {
                       if($product->gender == 'Nữ')
                       {
                          echo 'checked';
                       }
                     }
                   ?>
                   >
                     Nữ
                </label>
                <label>
                   <input type="radio" name="gender" id="gender" value="Nam,Nữ"
                   <?php
                     if(isset($product))
                     {
                       if($product->gender == 'Nam,Nữ')
                       {
                          echo 'checked';
                       }
                     }
                   ?>
                   >
                     Nam, Nữ
                </label>
              </div>
          </div>
          <!-- Short Description -->
          <div class="form-group">
                {{ Form::label('description_short', 'Tóm tắt') }}
                {{ Form::input('text','description_short','',array('class'=>'form-control','id'=>'description_short','placeholder'=>'Tóm tắt')) }}
          </div>

          <!-- Full Description -->
           <div class="form-group">
                {{ Form::label('description_full', 'Mô tả') }}
                <div id="description_editor"></div>
                {{ Form::textarea('description_full',isset($product)?$product->description_full:'',array('class'=>'form-control','id'=>'description_full','placeholder'=>'Mô tả', 'style'=>'display:none')) }}
           </div>

          <!-- Price Original -->
          <div class="form-group">
                {{ Form::label('price_original', 'Giá') }}
                {{ Form::input('text','price_original',isset($product)?$product->price_original:'',array('class'=>'form-control currency-only','id'=>'price_original','placeholder'=>'Giá')) }}
          </div>

          <!-- Price Original -->
          {{--<div class="form-group">--}}
                 {{--{{ Form::label('price_new', 'Giá mới') }}--}}
                 {{--{{ Form::input('text','price_new',isset($product)?$product->price_new:'',array('class'=>'form-control','id'=>'price_new','placeholder'=>'Giá mới')) }}--}}
          {{--</div>--}}

          <!-- Price Original -->
          <div class="form-group">
                 {{ Form::label('size', 'Size') }}
                 {{ Form::input('text','size',isset($product)?$product->size:'',array('class'=>'form-control','id'=>'size','placeholder'=>'Size (cách nhau bằng dấu "  , " )')) }}
          </div>

          <!-- Recommend -->
            <div class="form-group">
                   {{ Form::label('recommend', 'Recommended Product ') }}
                   {{ Form::input('text','recommend',isset($product)?$product->recommend:'',array('class'=>'form-control','id'=>'size','placeholder'=>'Mã hàng (cách nhau bằng dấu "  , " )')) }}
            </div>

          <button type="button" id="product-add" class="btn btn-default"><?php echo (!isset($product) ? 'Thêm sản phẩm' : 'Cập nhật sản phẩm')  ?></button>

        {{ Form::close() }}


        <br/>

        <!-- Upload Image -->
        <div id="upload-image-panel"
        <?php
        if(isset($listImage))
        {
            echo 'style="display:block"';
        }
        else{
            echo 'style="display:none"';
        }
        ?>

        >
            <div class="form-group">
                  {{ Form::label('image', 'Hình ảnh') }}
                  {{ Form::open(array('url' => 'upload', 'files' => true, 'id' => 'upload-form')) }}
                     <input type="hidden" value="{{ isset($product)?$product->id:'' }}" id="product_id" name="id">
                    {{ Form::file('images[]', array('class'=>'form-control', 'id'=>'image', 'multiple'=> true)) }}
                  {{ Form::close() }}
            </div>

            <button type="button" id="upload-image" class="btn btn-default">Upload</button>

            <div class="form-group">
                <div class="table-responsive">
                    <table id="table-image" class="table table-bordered table-striped">
                    <?php
                    if(isset($listImage))
                    {
                        foreach($listImage as $i)
                        {
                            $active = '';
                            if($i->url == $_ENV['Domain_Name'].$product->main_image_url)
                            {
                                $active = "main-image";
                            }
                            echo '<tr><td><img class="product-image" src='.$i->url.' /> </td>'.
                                 '<td> <button class="btn btn-default '.$active.'" type="button" id="set-main-image" product-id='.$product->id.' image-id = '.$i->id.'>Chọn làm hình đại diện</button> </td> ' .
                                 '<td> <button class="btn btn-default" type="button" id="delete-image" image-id = '.$i->id.'>Delete</button> </td> ' .
                                 '</tr>';
                        }
                    }
                    ?>
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
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($product) ? 'Thêm' : 'Cập nhật')  ?></b> sản phẩm thành công</h4>
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