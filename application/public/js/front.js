$(function() {
    $("#submit_select").change(function() {
        $("#submit_form").submit();
    });
});

$(function() {
    $("#wish_submit i").click(function() {
        var wishParamaters = document.getElementById('wish_submit').dataset;

        if(($(this).hasClass('fas fa-star') === false) && wishParamaters.wished == "false") {
            console.log(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "products",
                type: "post",
                data: {
                    'userId': wishParamaters.userId,
                    'productId': wishParamaters.productId
                }
            }).done(function() {
                $("#wish_submit i").removeClass('far fa-star').addClass('fas fa-star');
                wishParamaters.wished = "true";
            }).fail(function() {
                alert('エラーです。');
            });
        } else if (($(this).hasClass('fas fa-star') === true) && wishParamaters.wished == "false") {
            $(this).removeClass('fas fa-star').addClass('far fa-star');
            wishParamaters.wished = "false";
        }
    });
});
