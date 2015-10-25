@extends('..._layouts.admin')

@section('content')

 <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Banner <small id="modify-type"><?php echo (!isset($banner) ? 'Tạo mới' : 'Cập nhật')  ?></small>
            </h1>
        </div>
    </div>
<!-- /.row -->


<div class="row">
    <div class="col-xs-6">
        {{ Form::open(array('method' => 'POST','route' => 'admin.banner.postAdd','role'=>'form', 'id'=>'banner-form', 'name'=>'banner-form')) }}
          <input type="hidden" value="{{ isset($banner)?$banner->id:'' }}" id="id" name="id">


        <div class="form-group">
          {{ Form::label('name', 'Mô tả') }}
          <div id="banner_description_editor"></div>
          {{ Form::textarea('banner_description_full',isset($banner)?$banner->description:'',array('class'=>'form-control','id'=>'banner_description_full','placeholder'=>'Mô tả', 'style'=>'display:none')) }}
        </div>

          <button type="button" id="banner-add" class="btn btn-default"><?php echo (!isset($banner) ? 'Thêm banner' : 'Cập nhật banner')  ?></button>

         {{ Form::close() }}

         <!-- Upload Image -->
         <div id="upload-image-panel"
         <?php
         if(isset($banner))
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
                      <input type="hidden" value="{{ isset($banner)?$banner->id:'' }}" id="banner_id" name="id">
                     {{ Form::file('images[]', array('class'=>'form-control', 'id'=>'image', 'multiple'=> false)) }}
                   {{ Form::close() }}
             </div>

             <button type="button" id="upload-image-banner" class="btn btn-default">Upload</button>

             <div class="form-group">
                 <div class="table-responsive">
                     <table id="table-image" class="table table-bordered table-striped">
                     <?php
                     if(isset($banner))
                     {
                         echo '<tr><td><img src='.$_ENV['Domain_Name'].$banner->url.' /> </td>'.
                              '</tr>';
                     }
                     ?>
                     </table>
                 </div>
             </div>
         </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify-banner-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b id="modify-type-modal"><?php echo (!isset($banner) ? 'Thêm' : 'Cập nhật')  ?></b> banner thành công</h4>
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