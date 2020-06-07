<?php
session_start();
if (isset($_SESSION["shoppingCart"])){
    $shoppingCart = $_SESSION["shoppingCart"];
    $total_count = $shoppingCart["summary"]["total_count"];
    $total_price = $shoppingCart["summary"]["total_price"];
    $shopping_products = $shoppingCart["products"];
}else{
    $total_count = 0;
    $total_price = 0.0;
}
?>





<!------------------------------   header start -------------------->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">BlackStore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="index.php">Məhsullar</a>
            </li>


        </ul>
        <div class="my-2 my-lg-0">
            <a
                class="nav-link" href="shopping-cart.php"><i class="fas fa-shopping-cart cart-icon"></i>
                <span class="badge cart-count" style="color: white;"><?= $total_count ?></span>
            </a>
        </div>
    </div>
</nav>

<!---                          header son                  -->
