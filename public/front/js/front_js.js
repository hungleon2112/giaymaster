/**
 * Created by Hp 840 G1 on 9/24/2015.
 */
$( document ).ready(function() {

    $("#authenticate-button").click(function(){
        $('#authenticate-modal').modal('show');
    });

    $(".size-href").click(function(){
        $( ".size-href" ).each(function( index ) {
            $( this ).removeClass("size-active");
        });
        $( this ).addClass("size-active");
        $("#size").val($(this).attr('size-value'));
    });

    $('#register-form').validator().on('submit', function (e) {
        var path = window.location.href;
        if (e.isDefaultPrevented()) {
            console.log('Fail');
        } else {

        }
    });

    $("#register-btn").click(function(){
        if($("#password").val() != $("#re-password").val()){
            alert("Mật khẩu không trùng khớp" + $("#password").val() + '----' + $("#re-password").val());
            return false;
        }
        $('#register-form').submit();
    });

    $("#login-btn").click(function(){
        $.ajax({
            url: '/user/login',
            type: 'POST',
            data: {username : $("#usernameLogin").val(), password : $("#passwordLogin").val()},
            success: function (response) {
                if(response == 'Tài khoản đăng nhập không đúng.'){
                    alert(response);
                    return false;
                }else{
                    location.reload();
                }
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $("#logout-btn").click(function(){
        $.ajax({
            url: '/user/logout',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log(response);
            }
        });
    });

    $( "#username" ).focusout(function() {
        $.ajax({
            url: '/user/checkUsername/'+$(this).val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response != 0){
                    alert('Tên đăng nhập này đã được sử dụng. Vui lòng chọn tên đăng nhập khác');
                    $(this).focus();
                    $("#register-btn").addClass('disabled');
                    return false;
                }
                else
                {
                    $("#register-btn").removeClass('disabled');
                }
            },
            error: function () {
                console.log(response);
            }
        });
    });

    $( "#email" ).focusout(function() {
        $.ajax({
            url: '/user/checkEmail/'+$(this).val()+'',
            type: 'GET',
            contentType: 'application/json; charset=utf-8',
            success: function (response) {
                if(response != 0){
                    alert('Email này đã được sử dụng. Vui lòng chọn Email khác');
                    $(this).focus();
                    $("#register-btn").addClass('disabled');
                    return false;
                }
                else
                {
                    $("#register-btn").removeClass('disabled');
                }
            },
            error: function () {
                console.log(response);
            }
        });
    });

    $("#add-to-cart-btn").click(function(){
        $.ajax({
            url: '/cart/add',
            type: 'GET',
            data: {product_id : $("#product_id").val(), size : $("#size").val(), name : $("#name").val(),
                   quantity : $("#quantity").val(), price : $("#price").val(), code : $("#code").val()
                  },
            success: function (response) {
                console.log(response.cart.length);
                $("#cart-quantity").text('('+response.cart.length+')');
                $("#cart-inform-modal").modal("show");
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $("#delete-item-cart-btn").click(function(){
        $.ajax({
            url: '/cart/deleteItem/' + $(this).attr('cart-item-id') + '',
            type: 'GET',
            success: function (response) {
                location.reload();
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $("#approve-cart-btn").click(function(){
        $.ajax({
            url: '/cart/approve',
            type: 'GET',
            success: function (response) {
                if(response == 'Authentication error'){
                    $('#authenticate-modal').modal('show');
                }
                if(response == 'Success'){
                    $("#cart-approved-modal").modal("show");
                    setTimeout(function(){
                        window.location = '/';
                    }, 2000);
                }
            },
            error: function () {
                console.log('error');
            }
        });
    });
});