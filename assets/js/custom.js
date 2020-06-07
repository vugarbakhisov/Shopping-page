$(document).ready(function () {
$(".addToCartBtn").click(function () {
    var url ="http://localhost/Shopping/library/cart_db.php";
    var data = {
        p: "addToCart",
        product_id : $(this).attr("product_id")
    }
$.post(url,data,function (response) {
$(".cart-count").text(response);
});
});
    $(".removeFromCart").click(function () {
        var url ="http://localhost/Shopping/library/cart_db.php";
        var data = {
            p: "removeFromCart",
            product_id : $(this).attr("product-id")
        }
        $.post(url,data,function (response) {
           window.location.reload();
        });
    });

});