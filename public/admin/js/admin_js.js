/**
 * Created by Hp 840 G1 on 9/10/2015.
 */
$( document ).ready(function() {

    $("#description_editor").Editor();
    var description_editor_stxt = $("#description_full").text();
    if(description_editor_stxt != '')
        $('#description_editor').Editor("setText", [description_editor_stxt ]);

    $("#banner_description_editor").Editor();
    var banner_description_editor_stxt = $("#banner_description_full").text();
    if(banner_description_editor_stxt != '')
        $('#banner_description_editor').Editor("setText", [banner_description_editor_stxt ]);

    $("#website_description_editor").Editor();
    var website_description_editor_stxt = $("#website_description_full").text();
    if(website_description_editor_stxt != '')
        $('#website_description_editor').Editor("setText", [website_description_editor_stxt ]);

    //Show Cat Lev 1
    $(document).on('change', '#branch-dd', function() {
        CleanAllCatLev();
        $.ajax({
            url: '/admin/product/add/getAllCatLev1FromBranchID',
            type: 'GET',
            data: { branch_id: $("#branch-dd").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response.length > 0)
                {
                    $("#cat1").css('display', 'block')
                    $("#cat1").html('');
                    $("#cat1").append('<option value="0"> --- Chọn loại '+$("#branch-dd option:selected").text()+' --- </option>');
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


    //Insert Role
    $("#role-add").click(function() {
        var form = document.forms.namedItem("role-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/role/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-role-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    //Insert Description
    $("#description-add").click(function() {

        $("#website_description_full").text($('#website_description_editor').Editor("getText"));

        var form = document.forms.namedItem("description-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/description/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-description-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    //Insert Role
    //$("#showing-order-button").click(function() {
    $("#user-add").click(function() {
        var form = document.forms.namedItem("user-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/user/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-user-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });


    //Insert Branch
    $("#branch-add").click(function() {
        var form = document.forms.namedItem("branch-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/branch/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-branch-modal').modal('show');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
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

    //Insert Discount
    $("#discount-add").click(function() {
        var form = document.forms.namedItem("discount-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/discount/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $('#modify-discount-modal').modal('show');
                $("#discount-add").text('Cập nhật discount');
                $("#modify-type").text('Cập nhật');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    //Insert Banner
    $("#banner-add").click(function() {
        $("#banner_description_full").text($('#banner_description_editor').Editor("getText"));

        var form = document.forms.namedItem("banner-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/banner/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $("#banner_id").val(response['id']);
                $('#modify-banner-modal').modal('show');
                $("#upload-image-panel").css('display','block');
                $("#banner-add").text('Cập nhật banner');
                $("#modify-type").text('Cập nhật');
                setTimeout(function(){
                    $("#modify-type-modal").text('Cập nhật');
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });


    //Delete Image Banner
    $(document).on('click', '#delete-image-banner', function() {
        $('#loading-modal').modal('show');
        $.ajax({
            url: '/admin/banner/deleteImage',
            type: 'GET',
            data: { banner_id: $("#id").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {

            },
            error: function () {
                console.log('error');
                $('#loading-modal').modal('hide');
            }
        });
    });

    //Upload Image Banner
    $( "#upload-image-banner" ).click(function() {
        $('#loading-modal').modal('show');
        var iframe = $('<iframe name="postiframe" id="postiframe" style="display: none"></iframe>');

        $("body").append(iframe);

        var form = $('#upload-form');
        form.attr("action", "/admin/banner/uploadImage");
        form.attr("method", "post");

        form.attr("encoding", "multipart/form-data");
        form.attr("enctype", "multipart/form-data");

        form.attr("target", "postiframe");
        form.submit();

        $("#postiframe").load(function () {
            $.ajax({
                url: '/admin/banner/getAllImage',
                type: 'GET',
                data: { banner_id: $("#banner_id").val()} ,
                contentType: 'application/json; charset=utf-8',
                success: function (response) {

                    $('#loading-modal').modal('hide');

                    setTimeout(function(){
                        window.location =  '/admin/banner/list';
                    }, 500);
                },
                error: function () {
                    console.log('error');
                    $('#loading-modal').modal('hide');
                }
            });
        });
        return false;
    });


    //Insert Coupon
    $("#coupon-add").click(function() {
        var form = document.forms.namedItem("coupon-form"); // high importance!, here you need change "yourformname" with the name of your form
        var formdata = new FormData(form); // high importance!
        $.ajax({
            async: true,
            url: '/admin/coupon/postAdd',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                $("#id").val(response['id']);
                $("#coupon-add").text('Cập nhật coupon');
                $("#modify-type").text('Cập nhật');
                $('#modify-coupon-modal').modal('show');
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

        $("#description_full").text($('#description_editor').Editor("getText"));

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


    $(document).on('click','#set-main-image',function(){
        $('#loading-modal').modal('show');
        var image_id = $(this).attr('image-id');
        var product_id = $(this).attr('product-id');

        $.ajax({
            url: '/admin/product/setMainImage',
            type: 'GET',
            data: { image_id: image_id, product_id: product_id} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
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

    //Showing Item Per Page (User)
    $("#showing-user-button").click(function() {
        var showing = $("#showing").val();

        $.ajax({
            url: '/admin/user/showing',
            type: 'GET',
            data: { showing: $("#showing").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                //location.reload();
                window.location = '/admin/user/list';
            },
            error: function () {
                console.log('error');
            }
        });
    });

    //Showing Item Per Page (Order)
    $("#showing-order-button").click(function() {
        var showing = $("#showing").val();

        $.ajax({
            url: '/admin/order/showing',
            type: 'GET',
            data: { showing: $("#showing").val()} ,
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                //location.reload();
                window.location = '/admin/order/list';
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

    //Open Update  Role Panel
    $("#edit-button-role").click(function(){
        var listRoleID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var role_id = $(theTrTag.find("#role_id_hidden"));
                if(listRoleID == '')
                {
                    //First Element
                    listRoleID += role_id.val();
                }
                else
                {
                    listRoleID += ',' + role_id.val();
                }
            }
        });

        if(listRoleID == '')
        {
            alert('Chưa có role nào được chọn. ');
            return false;
        }
        else
        {
            $("#update-list-role-id").val(listRoleID);
            $('#update-panel-role').modal('show');
        }

    });


    //Open Update  Coupon Panel
    $("#edit-button-coupon").click(function(){
        var listCouponID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var coupon_id = $(theTrTag.find("#coupon_id_hidden"));
                if(listCouponID == '')
                {
                    //First Element
                    listCouponID += coupon_id.val();
                }
                else
                {
                    listCouponID += ',' + coupon_id.val();
                }
            }
        });

        if(listCouponID == '')
        {
            alert('Chưa có coupon nào được chọn. ');
            return false;
        }
        else
        {
            $("#update-list-coupon-id").val(listCouponID);
            $('#update-panel-coupon').modal('show');
        }

    });


    //Open Update  Brand Panel
    $("#edit-button-brand").click(function(){
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
            $("#update-list-brand-id").val(listBrandID);
            $('#update-panel-brand').modal('show');
        }

    });
    //Open Update  Branch Panel
    $("#edit-button-branch").click(function(){
        var listBranchID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var branch_id = $(theTrTag.find("#branch_id_hidden"));
                if(listBranchID == '')
                {
                    //First Element
                    listBranchID += branch_id.val();
                }
                else
                {
                    listBranchID += ',' + branch_id.val();
                }
            }
        });

        if(listBranchID == '')
        {
            alert('Chưa có nhánh hàng nào được chọn. ');
            return false;
        }
        else
        {
            $("#update-list-branch-id").val(listBranchID);
            $('#update-panel-branch').modal('show');
        }

    });

    //Open Update Product Panel
    $("#edit-button").click(function(){
        var listProductID = "";
        $("#dynamic-product-price-new").html('');
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var product_id = $(theTrTag.find("#product_id_hidden"));
                var product_code = $(product_id).attr("product-code");
                if(listProductID == '')
                {
                    //First Element
                    listProductID += product_id.val();
                }
                else
                {
                    listProductID += ',' + product_id.val();
                }

                //Add Text field for new price
                var new_price = '<div class="form-group">'+
                '<label for="exampleInputPassword1">'+product_code+' - Giá mới</label>' +
                '<input type="text" class="form-control currency-only" product-id='+product_id.val()+' id="price_new"  placeholder="Giá mới">'+
                '</div>';

                $("#dynamic-product-price-new").append(new_price);
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

    //Open Delete Branch Panel
    $("#delete-button-branch").click(function(){
        var listBranchID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var branch_id = $(theTrTag.find("#branch_id_hidden"));
                if(listBranchID == '')
                {
                    //First Element
                    listBranchID += branch_id.val();
                }
                else
                {
                    listBranchID += ',' + branch_id.val();
                }
            }
        });

        if(listBranchID == '')
        {
            alert('Chưa có nhánh hàng nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-branch-id").val(listBranchID);
            $('#delete-panel-branch').modal('show');
        }

    });

    //Open Delete User Panel
    $("#delete-button-user").click(function(){
        var listUserID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var user_id = $(theTrTag.find("#user_id_hidden"));
                if(listUserID == '')
                {
                    //First Element
                    listUserID += user_id.val();
                }
                else
                {
                    listUserID += ',' + user_id.val();
                }
            }
        });

        if(listUserID == '')
        {
            alert('Chưa có user nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-user-id").val(listUserID);
            $('#delete-panel-user').modal('show');
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
            $('#delete-panel-brand').modal('show');
        }

    });


    //Open Delete Discount Panel
    $("#delete-button-discount").click(function(){
        var listDiscountID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var discount_id = $(theTrTag.find("#discount_id_hidden"));
                if(listDiscountID == '')
                {
                    //First Element
                    listDiscountID += discount_id.val();
                }
                else
                {
                    listDiscountID += ',' + discount_id.val();
                }
            }
        });

        if(listDiscountID == '')
        {
            alert('Chưa có discount nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-discount-id").val(listDiscountID);
            $('#delete-panel-discount').modal('show');
        }

    });

    //Open Delete Coupon Panel
    $("#delete-button-coupon").click(function(){
        var listCouponID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var coupon_id = $(theTrTag.find("#coupon_id_hidden"));
                if(listCouponID == '')
                {
                    //First Element
                    listCouponID += coupon_id.val();
                }
                else
                {
                    listCouponID += ',' + coupon_id.val();
                }
            }
        });

        if(listCouponID == '')
        {
            alert('Chưa có coupon nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-coupon-id").val(listCouponID);
            $('#delete-panel-coupon').modal('show');
        }

    });

    //Open Delete Role Panel
    $("#delete-button-role").click(function(){
        var listRoleID = "";
        $("input[name='btSelectItem']").each(function()
        {
            if($(this).is(':checked'))
            {
                var theTrTag = $(this).parent().parent();
                var role_id = $(theTrTag.find("#role_id_hidden"));
                if(listRoleID == '')
                {
                    //First Element
                    listRoleID += role_id.val();
                }
                else
                {
                    listRoleID += ',' + role_id.val();
                }
            }
        });

        if(listRoleID == '')
        {
            alert('Chưa có role nào được chọn. ');
            return false;
        }
        else
        {
            $("#delete-list-role-id").val(listRoleID);
            $('#delete-panel-role').modal('show');
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

    // Delete List Branch
    $("#btn-delete-user").click(function(){
        $.ajax({
            url: '/admin/user/deleteListUser',
            type: 'POST',
            data: {delete_list_user_id : $("#delete-list-user-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 2000);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-user').modal('hide');
    });

    // Delete List Branch
    $("#btn-delete-branch").click(function(){
        $.ajax({
            url: '/admin/branch/deleteListBranch',
            type: 'POST',
            data: {delete_list_branch_id : $("#delete-list-branch-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-branch').modal('hide');
    });

    // Delete List Role
    $("#btn-delete-role").click(function(){
        $.ajax({
            url: '/admin/role/deleteListRole',
            type: 'POST',
            data: {delete_list_role_id : $("#delete-list-role-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-role').modal('hide');
    });


    // Delete List Coupon
    $("#btn-delete-coupon").click(function(){
        $.ajax({
            url: '/admin/coupon/deleteListCoupon',
            type: 'POST',
            data: {delete_list_coupon_id : $("#delete-list-coupon-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-coupon').modal('hide');
    });

    // Delete List Discount
    $("#btn-delete-discount").click(function(){
        $.ajax({
            url: '/admin/discount/deleteListDiscount',
            type: 'POST',
            data: {delete_list_discount_id : $("#delete-list-discount-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-discount').modal('hide');
    });

    // Delete List Brand
    $("#btn-delete-brand").click(function(){
        $.ajax({
            url: '/admin/brand/deleteListBrand',
            type: 'POST',
            data: {delete_list_brand_id : $("#delete-list-brand-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel-brand').modal('hide');
    });
    //Delete List Products
    $("#btn-delete").click(function(){
        $.ajax({
            url: '/admin/product/deleteListProduct',
            type: 'POST',
            data: {delete_list_product_id : $("#delete-list-product-id").val()},
            success: function (response) {
                setTimeout(function(){
                    location.reload();
                }, 500);
            },
            error: function () {
                console.log('error');
            }
        });
        $('#delete-panel').modal('hide');
    });

    //Update List Products
    $("#btn-update").click(function(){

        //Get data from New Price List
        var new_price_data_list = new Array();
        $("input[id='price_new']").each(function()
        {
            var product_id = ($(this).attr("product-id"));
            var new_price = ($(this).val());

            var new_price_data = {
                product_id : product_id,
                new_price : new_price
            }

            new_price_data_list.push(new_price_data);
        });

        console.log(new_price_data_list);

        $.ajax({
            url: '/admin/product/updateListProduct',
            type: 'POST',
            data: {
                update_list_product_id : $("#update-list-product-id").val(),
                price_original : $("#price_original").val(),
                //price_new : $("#price_new").val(),
                price_new : JSON.stringify(new_price_data_list),
                optional_checkbox_news : $("#optional-checkbox-news").prop('checked'),
                from_date_news : $("#from_date_news").val(),
                to_date_news : $("#to_date_news").val(),
                optional_checkbox_sale : $("#optional-checkbox-sale").prop('checked'),
                from_date_sale : $("#from_date_sale").val(),
                to_date_sale : $("#to_date_sale").val()
            },
            success: function (response) {
                $('#update-panel').modal('hide');
                //location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
        $('#update-panel').modal('hide');
    });

    //Update List Roles
    $("#btn-update-role").click(function(){
        $.ajax({
            url: '/admin/role/updateListRole',
            type: 'POST',
            data: {
                update_list_role_id : $("#update-list-role-id").val(),
                name : $("#name").val()
            },
            success: function (response) {
                $('#update-panel-role').modal('hide');
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
        $('#update-panel-role').modal('hide');
    });


    //Update List Brands
    $("#btn-update-brand").click(function(){
        $.ajax({
            url: '/admin/brand/updateListBrand',
            type: 'POST',
            data: {
                update_list_brand_id : $("#update-list-brand-id").val(),
                name : $("#name").val()
            },
            success: function (response) {
                $('#update-panel-brand').modal('hide');
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
        $('#update-panel-brand').modal('hide');
    });
    //Update List Branchs
    $("#btn-update-branch").click(function(){
        $.ajax({
            url: '/admin/branch/updateListBranch',
            type: 'POST',
            data: {
                update_list_branch_id : $("#update-list-branch-id").val(),
                name : $("#name").val()

            },
            success: function (response) {
                $('#update-panel-branch').modal('hide');
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
        $('#update-panel-branch').modal('hide');
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


    //Nested Table Order & Order Detail
    $(document).on('click', '#show-order-detail-on-table', function() {
        var trID = $(this).attr('trID');
        $("#list-order-detail").html($('#'+trID+'').html());
        $("#order-id").text('HD' + $("#order_id_hidden_"+trID+"").val());
        $("#order-id-update").val($("#order_id_hidden_"+trID+"").val());
        $("#order-date").text($("#order_date_hidden_"+trID+"").val());
        $("#order-customer").text($("#order_customer_hidden_"+trID+"").val());

        $("#order-phone").text($("#order_phone_hidden_"+trID+"").val());
        $("#order-address").text($("#order_address_hidden_"+trID+"").val());

        $("#order-status").text($("#order_status_hidden_"+trID+"").val());
        $("#order-status-id").val($("#order_status_id_hidden_"+trID+"").val());
        $("#order-tran-type").text($("#order_tran_type_hidden_"+trID+"").val());

        $("#order-note").text($("#order_note_hidden_"+trID+"").val());
        $("#order-store").val($("#order_storage_hidden_"+trID+"").val());
        $("#order-ship-fee").val($("#order_ship_fee_hidden_"+trID+"").val());


        //Render Status
        $.ajax({
            url: '/admin/order/getAllStatus/'+$("#order_tran_type_id_hidden_"+trID+"").val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                //location.reload();
                console.log(response);
                $("#status-section").html('');
                for(var i = 0 ; i < response.length ; i ++)
                {
                    var activeClass = '';
                    if($("#order_status_hidden_"+trID+"").val() == response[i].name){
                        activeClass = 'size-active';
                    }
                    else{
                        activeClass = '';
                    }
                    var status = '<li><a id="size-selector" style="color:white;background-color:'+response[i].color+'" href="javascript:;" class="size-href '+activeClass+'" status-id="'+response[i].id+'">'+response[i].name+'</a></li>';
                    $("#status-section").append(status);
                }
            },
            error: function () {
                console.log('error');
            }
        });



        $("#order-detail-panel").modal("show");
    });

    $("#update-order-btn").click(function(){
        $.ajax({
            url: '/admin/order/updateNoteStorage',
            type: 'POST',
            data: {
                order_id : $("#order-id-update").val(),
                note : $("#order-note").val(),
                storage : $("#order-store").val(),
                ship_fee : $("#order-ship-fee").val(),
                status_id : $("#order-status-id").val()
            },
            success: function (response) {
                location.reload(true);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $(document).on('click', '.size-href', function() {
        $( ".size-href" ).each(function( index ) {
            $( this ).removeClass("size-active");
        });
        $( this ).addClass("size-active");

        //Update status
        var status_id = $( this).attr('status-id');
        var order_id = $("#order-id-update").val();

        $("#order-status-id").val(status_id);

        //$.ajax({
        //    url: '/admin/order/updateStatus/'+order_id+'/'+status_id+'',
        //    type: 'GET',
        //    contentType: 'application/json; charset=utf-8',
        //    success: function (response) {
        //        location.reload(true);
        //    },
        //    error: function () {
        //        console.log('error');
        //    }
        //});
    });

    $("#agent-official-filter-date-button").click(function(){
        $.ajax({
            url: '/admin/agentOfficial/order/list/setDateFromTo/'+$("#agent-official-from-date").val()+'/'+$("#agent-official-to-date").val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $("#agent-beginner-filter-date-button").click(function(){
        $.ajax({
            url: '/admin/agentBeginner/order/list/setDateFromTo/'+$("#agent-beginner-from-date").val()+'/'+$("#agent-beginner-to-date").val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

	$("#filter-month-date-agent-button").click(function(){
        $.ajax({
            url: '/admin/agentOfficial/setMonthYear/'+$("#filter-month-agent").val()+'/'+$("#filter-year-agent").val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

});

function CleanAllCatLev()
{
    $("#cat2").html('');
    $("#cat2").css('display','none');
    $("#cat3").html('');
    $("#cat3").css('display','none');
}