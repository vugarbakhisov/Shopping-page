<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/all.min.css">



</head>
<body>
<?php require_once "library/db.php"; ?>
<?php include "library/navbar.php";?>
<?php
$products = $db->query("SELECT * FROM products",PDO::FETCH_OBJ)->fetchAll();

?>

<!------------------------------------------   Main Content ---------------------------->

 <div class="container">
     <h2 class="text-center">Məhsul Siyahsı</h2>
     <hr>
     <div class="row">
         <?php foreach ($products as $product) {

          ?>
         <div class="col-sm-6 col-md-3">
             <div class="thumbnail">
                 <img src="images/<?=$product->img_url?>"  alt="macbook"width="150" height="150">
                 <div class="caption">
                     <h3 class="active"><?= $product->product_name ?></h3>
                     <p class="margin"><?=$product->detail?></p>
                     <p class="text-right price-container"><strong><?=$product->price?></strong><span style="margin-left:10px;">AZN</span></p>
                     <p>
                         <button product_id="<?=$product->id?>" class="btn btn-primary btn-block addToCartBtn"
                             <i class="fas fa-shopping-cart"></i>Səbətə Yüklə
                         </button>
                     </p>
                 </div>
             </div>
         </div>
         <?php } ?>






     </div>
 </div>


<!------------------------------------------  End Main Content ---------------------------->



<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/all.min.js"></script>

</body>
</html>