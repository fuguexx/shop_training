$(function(){
    $("#submit_select").change(function(){
        $("#submit_form").submit();
    });
});

$(function(){
    $(".toggle_wish i").click(function(){
        if($(this).hasClass('fas fa-star') === false){
            $(this).removeClass('far fa-star').addClass('fas fa-star');
            $("#wish_submit").submit(function(){
                var productId = $(".toggle_wish").getAttribute('data-product-id');
                var wishedFlag = $(".toggle_wish").getAttribute('data-wished');
            });
            console.log(wishedFlag);
        } else {
            $(this).removeClass('fas fa-star').addClass('far fa-star');
        }
    });
});
