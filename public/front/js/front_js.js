/**
 * Created by Hp 840 G1 on 9/24/2015.
 */
$( document ).ready(function() {

    $("#size").val('');

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
            alert("Mật khẩu không trùng khớp");
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
                window.location = '/';
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
        if($("#size").val() == '')
        {
            $("#size").val($( "a[class*='size-active']").attr('size-value'));
        }
        $.ajax({
            url: '/cart/add',
            type: 'GET',
            data: {product_id : $("#product_id").val(), size : $("#size").val(), name : $("#name").val(),
                   quantity : $("#quantity").val(), price : $("#price").val(), code : $("#code").val(), image : $("#image").val()
                  },
            success: function (response) {
                $("#top-cart").html('');
                console.log(response.cart);

                $("#cart-quantity").text('('+response.cart.length+')');
                $("#cart-inform-modal").modal("show");

                var total_top_cart = 0;
                for(var i = 0 ; i < response.cart.length; i ++)
                {
                    var str = '<li>'+
                        '<div class="img-content">'+
                            '<a href="/product/detail/'+response.cart[i].product_id+'">'+
                                '<img src="'+response.cart[i].image+'" alt="">'+
                                '</a>'+
                            '</div>'+
                            '<div class="img-detail">'+
                            '<a href="/product/detail/'+response.cart[i].product_id+'">'+
                                '<h2>'+response.cart[i].name+'</h2>'+
                            '</a>'+
                            '<span>Size: '+response.cart[i].size+'</span><br/>'+
                             '<span>Số lượng: '+response.cart[i].quantity+'</span><br/>'+
                             '<span class="price-cart-top">'+addCommas(response.cart[i].quantity * response.cart[i].price)+' VNĐ</span>'+
                          '</div>'+
                         '</li>';

                    $("#top-cart").append(str);
                    total_top_cart += response.cart[i].quantity * response.cart[i].price;
                }

                $(".total-top-cart").text('TỔNG CỘNG '+addCommas(total_top_cart)+' VNĐ');
                setTimeout(function(){
                    $("#cart-inform-modal").modal("hide");
                }, 3000);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $(document).on('click','#delete-item-cart-btn',function(){
        $.ajax({
            url: '/cart/deleteItem/' + $(this).attr('cart-item-id') + '',
            type: 'GET',
            success: function (response) {
                //console.log(response.cart.length);
                if(response.cart.length == 0)
                    window.location = '/';
                else
                    location.reload(true);
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $("input:radio[name=type_id]").click(function() {
        $("#type").val($(this).val());
    });

    $("#approve-cart-btn").click(function(){
        if($("#coupon_code").val() == '')
            $("#coupon_code").val('0');
        $.ajax({
            url: '/cart/approve/'+$("#type").val()+'/'+$("#total").val()+'/'+$("#coupon_code").val()+'/'+$("#total_final").val()+'',
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

    $("#coupon-btn").click(function(){
        $.ajax({
            url: '/coupon/'+$("#coupon-code").val()+'',
            type: 'GET',
            success: function (response) {
                if(response == 0)
                {
                    alert('Mã giảm giá này không tồn tại hoặc đã hết hạn.');
                }
                else
                {
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                }
            },
            error: function () {
                console.log('error');
            }
        });
    });

    $('input[type=radio][name="type_id"]').change(function() {
        if($(this).val() == 2 || $(this).val() == 1)
        {
            $("#type_id_2").css('visibility','visible');
        }
        else
        {
            $("#type_id_2").css('visibility','hidden');
        }
    });

    $("#show-user-profile").click(function(){
        $.ajax({
            url: '/user/get',
            type: 'GET',
            success: function (response) {
                console.log(response);
                $("#name_update").val(response.name);
                $("#password_update").val(response.password);
                $("#re-password_update").val(response.password);
                $("#phone_update").val(response.phone);
                $("#email_update").val(response.email);
                $("#address_update").val(response.address);
            },
            error: function () {
                console.log('error');
            }
        });
       $("#update-user-modal").modal("show");
    });

    $("#update-user-btn").click(function(){
        if($("#password_update").val() != $("#re-password_update").val()){
            alert("Mật khẩu không trùng khớp");
            return false;
        }
        $('#update-form').submit();
    });

    jQuery('.cart-content').click(function() {
        if(jQuery('.shopping-cart-top').length){
            jQuery('.shopping-cart-top').fadeToggle();
        }
    });

    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });

    $(document).on('keyup','#quantity-change',function(){
    });

    $('#quantity-change').keyup(function() {

    });

    $("#update-cart-btn").click(function(){

        $("#loading-modal-cart").modal("show");

        var product_id = "";
        var order_detail_id = "";
        var quantity = "";

        $( "tr.order_detail_list" ).each(function( index ) {
            product_id += $(this).attr("product_id") + ' ';
            order_detail_id += $( this ).attr('order_detail_id') + ' ';
            quantity += $( this).find('#quantity-change').val() + ' ';
        });
        $.ajax({
            url: '/cart/updateQuantity/'+product_id+'/'+order_detail_id+'/'+quantity+'',
            type: 'GET',
            success: function (response) {
                setTimeout(function(){
                    $("#loading-modal-cart").modal("hide");
                    location.reload(true);
                }, 1000);
            },
            error: function () {
                console.log('error');
            }
        });

    });


    $("#order-filter-date-button").click(function(){
        $.ajax({
            url: '/order/show/setDateFromTo/'+$("#agent-official-from-date").val()+'/'+$("#agent-official-to-date").val()+'',
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

    $("#filter-month-date-client-button").click(function(){
        $.ajax({
            url: '/order/show/setMonthYear/'+$("#filter-month-client").val()+'/'+$("#filter-year-client").val()+'',
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

    //Date Picker
    $('.date-picker').datepicker();

    $('.date-picker').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });

    $('.date-picker-modal').datepicker();

    $('.date-picker-modal').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });

});

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();



function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
    var n = this,
        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
        decSeparator = decSeparator == undefined ? "." : decSeparator,
        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
        sign = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
};