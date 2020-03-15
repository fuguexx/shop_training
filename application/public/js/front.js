$(function() {
    $("#submit_select").change(function() {
        $("#submit_form").submit();
    });
});

$(function() {
    $(".toggle_wish").click(function() {
        let starElement = $(this).children('i');
        let parameters = this.dataset;

        if((starElement.hasClass('fas fa-star') === false) && parameters.wished == "false") {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "products",
                type: "post",
                data: {
                    'userId': parameters.userId,
                    'productId': parameters.productId
                }
            }).done(function() {
                starElement.removeClass('far fa-star').addClass('fas fa-star');
                parameters.wished = "true";
            }).fail(function() {
                alert('エラーです。');
            });
        }
    });
});

$(function() {
    $(".toggle_wish").click(function() {
        let starElement = $(this).children('i');
        let parameters = this.dataset;

        if ((starElement.hasClass('fas fa-star') === true) && parameters.wished == "true") {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "products",
                type: "DELETE",
                data: {
                    'userId': parameters.userId,
                    'productId': parameters.productId,
                }
            }).done(function() {
                starElement.removeClass('fas fa-star').addClass('far fa-star');
                parameters.wished = "false";
            }).fail(function() {
                alert('エラーです。');
            });
        }
    });
});
