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

<?php include "library/navbar.php";?>


<!--//session_start();-->
<!--//echo  "<pre>";-->
<!--//print_r($_SESSION["shoppingCart"]);-->
<!--//echo "</pre>";-->
<!--//die();-->



<!------------------------------ Main Content ------------------------>




<div class="container col-md-12">
 <?php if ($total_count > 0 ): ?>
    <h2 class="text-center">Səbətinizdə <strong class="color-danger"><?= $total_count ?></strong> adəd məhsul var</h2>
    <hr>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <th class="text-center">Məhsulun Şəkli</th>
                <th class="text-center">Məhsul Adı</th>
                <th class="text-center">Qiyməti</th>
                <th class="text-center">Sayı</th>
                <th class="text-center">Toplam</th>
                <th class="text-center">Səbətdən Sil</th>
                </thead>
                <tbody>
              <?php foreach ($shopping_products as $product): ?>
                <tr>
                    <td class="text-center">
                        <img src="images/<?=$product->img_url?>" alt="" width="80">

                    </td>
                    <td class="text-center"><?=$product->product_name?></td>
                    <td class="text-center"><strong><?=$product->total_price?>AZN</strong></td>
                    <td class="text-center">
                        <a href="library/cart_db.php?p=incCount&product_id=<?=$product->id?>" class="btn btn-success btn-sm plu">
                            <i class="fas fa fa-plus" style="margin-bottom: 10px;"></i>
                        </a>
                        <input type="text" value="<?=$product->count?>" class="item-count-input">
                        <a href="library/cart_db.php?p=decCount&product_id=<?=$product->id?>" class="btn btn-danger btn-sm plu">
                            <i class="fa fa-minus" style="margin-bottom: 10px;"></i>
                        </a>
                    </td>
                    <td class="text-center"><?=$product->total_price?> AZN</td>
                    <td class="text-center">
                        <button product-id ="<?=$product->id?>" class="btn btn-danger btn-sm removeFromCart">
                            <i class=" fa fa-times"></i>
                            Səbətdən Çıxar
                        </button>
                    </td>
                </tr>

            <?php endforeach; ?>

                </tbody>
                </tbody>
                <tfoot>
                <th colspan="2">
                    Ümumi Sifariş Sayı : <span class="color-danger"><?=$total_count;?></span>
                </th>
                <th colspan="4" class="text-right">
                    Qiymət : <span class="color-danger"><?=$total_price;?>AZN</span>
                </th>
                </tfoot>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php else: ?>
<div class="alert alert-info">
    <strong style="margin-left:350px;">Səbətiniz Boşdur.....Sifariş Üçün Məhsul Seçin...
    	<a href="index.php" class="btn btn-primary btn-sm">Məhsullar</a> </strong>
</div>
<?php endif;?>

</div>
<!------------------------------ End Content ------------------------>


<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/all.min.js"></script>
</body>
</html>