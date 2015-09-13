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
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });


    $('.date-picker').datepicker();

    //Insert New Optional product
    $('#optional-checkbox').change(function() {
        var $this = $(this);
        if ($this.is(':checked')) {

            var parentForm = $this.parent().parent();
            var $from_date = parentForm.find("from_date");
            if($("#" + parentForm.find("from_date").selector).val() == '' || $("#" + parentForm.find("to_date").selector).val() == '')
            {
                alert('Vui lòng chọn ngày bắt đầu và ngày kết thúc.');
                $this.prop('checked',false);
                return false;
            }
            var form = document.forms.namedItem($this.attr('form-name')); // high importance!, here you need change "yourformname" with the name of your form
            var formdata = new FormData(form); // high importance!
            $.ajax({
                async: true,
                url: '/admin/product/optionalInsert',
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


        } else {
            // the checkbox was unchecked
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