/**
 * Created by Hp 840 G1 on 9/10/2015.
 */
$( document ).ready(function() {

    //Show Cat Lev 1
    $("#branch").change(function() {
        CleanAllCatLev();
        $.ajax({
            url: '/admin/product/add/getAllCatLev1FromBranchID',
            type: 'GET',
            data: { branch_id: $("#branch").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response.length > 0)
                {
                    $("#cat1").css('display', 'block')
                    $("#cat1").html('');
                    $("#cat1").append('<option value="0"> --- Chọn loại '+$("#branch option:selected").text()+' --- </option>');
                    for(var i = 0 ; i < response.length ; i ++)
                    {
                        $("#cat1").append('<option value="'+response[i].id+'"> '+response[i].name+' </option>');
                    }
                }
                else
                {
                    $("#cat1").css('display', 'none')
                }
            },
            error: function () {
                console.log('error');
            }
        });
    });


    //Show Cat Lev 2
    $("#cat1").change(function() {

        $("#cat3").html('');
        $("#cat3").css('display','none');

        $.ajax({
            url: '/admin/product/add/getAllCatFromParentID',
            type: 'GET',
            data: { parent_id: $("#cat1").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response.length > 0)
                {
                    $("#cat2").css('display', 'block')
                    $("#cat2").html('');
                    $("#cat2").append('<option value="0"> --- Chọn loại '+$("#cat1 option:selected").text()+' --- </option>');
                    for(var i = 0 ; i < response.length ; i ++)
                    {
                        $("#cat2").append('<option value="'+response[i].id+'"> '+response[i].name+' </option>');
                    }
                }
                else
                {
                    $("#cat2").css('display', 'none')
                }
            },
            error: function () {
                console.log('error');
            }
        });

        ($(this).val() != "0" ? $("#category_id").val($(this).val()) :$("#category_id").val('') );

    });

    //Show Cat Lev 3
    $("#cat2").change(function() {
        $.ajax({
            url: '/admin/product/add/getAllCatFromParentID',
            type: 'GET',
            data: { parent_id: $("#cat2").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response.length > 0)
                {
                    $("#cat3").css('display', 'block')
                    $("#cat3").html('');
                    $("#cat3").append('<option value="0"> --- Chọn loại '+$("#cat2 option:selected").text()+' --- </option>');
                    for(var i = 0 ; i < response.length ; i ++)
                    {
                        $("#cat3").append('<option value="'+response[i].id+'"> '+response[i].name+' </option>');
                    }
                }
                else
                {
                    $("#cat3").css('display', 'none')
                }
            },
            error: function () {
                console.log('error');
            }
        });

        ($(this).val() != "0" ? $("#category_id").val($(this).val()) :$("#category_id").val('') );

    });


    //Cat Lev 3
    $("#cat3").change(function() {

        ($(this).val() != "0" ? $("#category_id").val($(this).val()) :$("#category_id").val('') );

    });

    //Insert Brand
    $("#brand-add").click(function() {
        var form = document.forms.namedItem("brand-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/brand/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-brand-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });


    //Insert Product
    $("#product-add").click(function() {

        var form = document.forms.namedItem("product-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/product/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $("#product_id").val(response['id']);
                $("#upload-image-panel").css('display','block');
                $("#product-add").text('Cập nhật sản phẩm');
                $("#modify-type").text('Cập nhật');

                $('#modify-product-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    //Delete Image
    $(document).on('click', '#delete-image', function() {
        image_id = $(this).attr('image-id');
        $('#loading-modal').modal('show');
        $.ajax({
            url: '/admin/product/deleteImage',
            type: 'GET',
            data: { image_id: image_id} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                $.ajax({
                    url: '/admin/product/getAllImage',
                    type: 'GET',
                    data: { product_id: $("#product_id").val()} ,
                    contentType: 'application/json; charset=utf-8',
                    success: function (response) {
                        $("#table-image").html('');
                        if(response.length > 0)
                        {
                            for(var i = 0 ; i < response.length ; i ++)
                            {
                                $("#table-image").append('' +
                                '<tr> ' +
                                '<td> <img class="product-image" src="'+response[i].url+'" /> </td> ' +
                                '<td> <button class="form-control" type="button" id="delete-image" image-id = "'+response[i].id+'">Delete</button> </td> ' +
                                '</tr>');
                            }
                            $('#loading-modal').modal('hide');
                        }
                        else
                        {
                            $('#loading-modal').modal('hide');
                        }
                    },
                    error: function () {
                        console.log('error');
                        $('#loading-modal').modal('hide');
                    }
                });
            },
            error: function () {
                console.log('error');
                $('#loading-modal').modal('hide');
            }
        });
    });

    //Upload Image
    $( "#upload-image" ).click(function() {
        $('#loading-modal').modal('show');
        var iframe = $('<iframe name="postiframe" id="postiframe" style="display: none"></iframe>');

        $("body").append(iframe);

        var form = $('#upload-form');
        form.attr("action", "/admin/product/uploadImage");
        form.attr("method", "post");

        form.attr("encoding", "multipart/form-data");
        form.attr("enctype", "multipart/form-data");

        form.attr("target", "postiframe");
        form.submit();

        $("#postiframe").load(function () {
            $.ajax({
                url: '/admin/product/getAllImage',
                type: 'GET',
                data: { product_id: $("#product_id").val()} ,
                contentType: 'application/json; charset=utf-8',
                success: function (response) {
                    if(response.length > 0)
                    {
                        $("#table-image").html('');
                        for(var i = 0 ; i < response.length ; i ++)
                        {
                            $("#table-image").append('' +
                            '<tr> ' +
                            '<td> <img class="product-image" src="'+response[i].url+'" /> </td> ' +
                            '<td> <button class="btn btn-default" type="button" id="delete-image" image-id = "'+response[i].id+'">Delete</button> </td> ' +
                            '</tr>'
                            );
                        }
                        $('#loading-modal').modal('hide');
                    }
                    else
                    {
                        $('#loading-modal').modal('hide');
                    }
                },
                error: function () {
                    console.log('error');
                    $('#loading-modal').modal('hide');
                }
            });
        });
        return false;
    });

    //Showing Item Per Page
    $("#showing-button").click(function() {
        var showing = $("#showing").val();

        $.ajax({
            url: '/admin/product/showing',
            type: 'GET',
            data: { showing: $("#showing").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                //location.reload();
                window.location = '/admin/product/list';
            },
            error: function () {
                console.log('error');
            }
        });
    });


    $('.date-picker').datepicker();

    $('.date-picker').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });

    $('.date-picker-modal').datepicker();

    $('.date-picker-modal').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });

    //Insert New Optional product
    $(document).on('change', '#optional-checkbox', function() {
        var $this = $(this);
        if ($this.is(':checked')) {

            var parentForm = $("#"+$this.attr('form-name'));
            if((parentForm.find("#from_date")).val() == '' || (parentForm.find("#to_date")).val() == '')
            {
                alert('Vui lòng chọn ngày bắt đầu và ngày kết thúc.');
                $this.prop('checked',false);
                return false;
            }
            var form = document.forms.namedItem($this.attr('form-name')); // high importance!, here you need change "yourformname" with the name of your form
            var formdata = new FormData(form); // high importance!

            $('#loading-modal').modal('show');
            $.ajax({
                async: true,
                url: '/admin/product/optionalInsert',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    (parentForm.find("#optional_product_id")).val(response.id);
                },
                error: function () {
                    console.log('error');
                }
            });

            $('#loading-modal').modal('hide');
        } else {

            $('#loading-modal').modal('show');
            var parentForm = $("#"+$this.attr('form-name'));
            (parentForm.find("#from_date")).val('');
            (parentForm.find("#to_date")).val('');

            var form = document.forms.namedItem($this.attr('form-name')); // high importance!, here you need change "yourformname" with the name of your form
            var formdata = new FormData(form); // high importance!
            $.ajax({
                async: true,
                url: '/admin/product/optionalDelete',
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                },
                error: function () {
                    console.log('error');
                }
            });
            $('#loading-modal').modal('hide');
        }
    });


    //Open Update Panel
    $("#edit-button").click(function(){
        var listProductID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var product_id = $(theTrTag.find("#product_id_hidden"));
                if(listProductID == '')
                {
                    //First Element
                    listProductID += product_id.val();
                }
                else
                {
                    listProductID += ',' + product_id.val();
                }
            }
        });

        if(listProductID == '')
        {
            alert('Chưa có sản phẩm nào được chọn. ');
            return false;
        }
        else
        {
            $("#update-list-product-id").val(listProductID);
            $('#update-panel').modal('show');
        }

    });

    //Open Delete Brand Panel
    $("#delete-button-brand").click(function(){
        var listBrandID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var brand_id = $(theTrTag.find("#brand_id_hidden"));
                if(listBrandID == '')
                {
                    //First Element
                    listBrandID += brand_id.val();
                }
                else
                {
                    listBrandID += ',' + brand_id.val();
                }
            }
        });

        if(listBrandID == '')
        {
            alert('Chưa có thương hiệu nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-brand-id").val(listBrandID);
            $('#delete-brand-panel').modal('show');
        }

    });

    //Open Delete Panel
    $("#delete-button").click(function(){
        var listProductID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var product_id = $(theTrTag.find("#product_id_hidden"));
                if(listProductID == '')
                {
                    //First Element
                    listProductID += product_id.val();
                }
                else
                {
                    listProductID += ',' + product_id.val();
                }
            }
        });

        if(listProductID == '')
        {
            alert('Chưa có sản phẩm nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-product-id").val(listProductID);
            $('#delete-panel').modal('show');
        }

    });

    // Delete List Brand
    $("#btn-brand-delete").click(function(){
        $.ajax({
            url: '/admin/brand  /deleteListBrand',
            type: 'POST',
            data: {delete_list_brand_id : $("#delete-list-brand-id").val()},
            success: function (response) {
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-brand-panel').modal('hide'); 
        location.reload();
    });
    //Delete List Products
    $("#btn-delete").click(function(){
        $.ajax({
            url: '/admin/product/deleteListProduct',
            type: 'POST',
            data: {delete_list_product_id : $("#delete-list-product-id").val()},
            success: function (response) {
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel').modal('hide');
        location.reload();
    });

    //Update List Products
    $("#btn-update").click(function(){
        $.ajax({
            url: '/admin/product/updateListProduct',
            type: 'POST',
            data: {
                update_list_product_id : $("#update-list-product-id").val(),
                price_original : $("#price_original").val(),
                price_new : $("#price_new").val(),
                optional_checkbox_news : $("#optional-checkbox-news").prop('checked'),
                from_date_news : $("#from_date_news").val(),
                to_date_news : $("#to_date_news").val(),
                optional_checkbox_sale : $("#optional-checkbox-sale").prop('checked'),
                from_date_sale : $("#from_date_sale").val(),
                to_date_sale : $("#to_date_sale").val()
            },
            success: function (response) {
                $('#update-panel').modal('hide');
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
        $('#update-panel').modal('hide');
    });


    //Update Panel Checkbox Event
    $(document).on('change', '#optional-checkbox-news', function() {
        var $this = $(this);
        if ($this.is(':checked')) {
            $("#from_date_news").removeAttr('disabled');
            $("#to_date_news").removeAttr('disabled');
        }
        else
        {
            $("#from_date_news").prop('disabled',true);
            $("#to_date_news").prop('disabled',true);
        }
    });

    $(document).on('change', '#optional-checkbox-sale', function() {
        var $this = $(this);
        if ($this.is(':checked')) {
            $("#from_date_sale").removeAttr('disabled');
            $("#to_date_sale").removeAttr('disabled');
        }
        else
        {
            $("#from_date_sale").prop('disabled',true);
            $("#to_date_sale").prop('disabled',true);
        }
    });

});

function CleanAllCatLev()
{
    $("#cat2").html('');
    $("#cat2").css('display','none');
    $("#cat3").html('');
    $("#cat3").css('display','none');
}