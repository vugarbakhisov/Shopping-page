<?php
include "db.php";
session_start();

function addToCart($product_item){
    if (isset($_SESSION["shoppingCart"])){
      $shopping_cart = $_SESSION["shoppingCart"];
      $products = $shopping_cart["products"];
    }
    else{
        $products = array();
   }
    /// Sayın Yoxlamaq Sifarişin

    if (array_key_exists($product_item->id,$products)){
        $products[$product_item->id]->count++;
    }else{
        $products[$product_item->id] = $product_item;
    }

    ///////////// Səbətdəki məhsularrın hesablanması
    $total_price =0.0;
    $total_count = 0;
    foreach ($products as $product){
        $product->total_price = $product->count * $product->price;
        $total_price = $total_price + $product->total_price;
        $total_count += $product->count;

    }
     $total_count . "=>" . $total_price;

$summary["total_price"] = $total_price;
$summary["total_count"] = $total_count;
  $_SESSION["shoppingCart"]["products"] = $products;
  $_SESSION["shoppingCart"]["summary"] = $summary;
  return $total_count;


}

function removeFromCart($product_id){
  if (isset($_SESSION["shoppingCart"])){
      $shoppingCart = $_SESSION["shoppingCart"];
      $products = $shoppingCart["products"];
      if (array_key_exists($product_id,$products)){
          unset($products["$product_id"]);
      }
      $total_price =0.0;
      $total_count = 0;
      foreach ($products as $product){
          $product->total_price = $product->count * $product->price;
          $total_price = $total_price + $product->total_price;
          $total_count += $product->count;

      }
      $total_count . "=>" . $total_price;

      $summary["total_price"] = $total_price;
      $summary["total_count"] = $total_count;
      $_SESSION["shoppingCart"]["products"] = $products;
      $_SESSION["shoppingCart"]["summary"] = $summary;
      return true;
  }
}
function incCount($product_id){

    if (isset($_SESSION["shoppingCart"])){
        $shopping_cart = $_SESSION["shoppingCart"];
        $products = $shopping_cart["products"];

        if (array_key_exists($product_id,$products)){
            $products[$product_id]->count++;
        }

        ///////////// Səbətdəki məhsularrın hesablanması
        $total_price =0.0;
        $total_count = 0;
        foreach ($products as $product){
            $product->total_price = $product->count * $product->price;
            $total_price = $total_price + $product->total_price;
            $total_count += $product->count;

        }
        $total_count . "=>" . $total_price;

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;
        $_SESSION["shoppingCart"]["products"] = $products;
        $_SESSION["shoppingCart"]["summary"] = $summary;
        return true;
    }

    /// Sayın Yoxlamaq Sifarişin




}
function decCount($product_id){
    if (isset($_SESSION["shoppingCart"])){
        $shopping_cart = $_SESSION["shoppingCart"];
        $products = $shopping_cart["products"];

        if (array_key_exists($product_id,$products)){
            $products[$product_id]->count--;
            if (array_count_values($products[$product_id]->count) < 0){
                echo "cart";
            }
        }


        ///////////// Səbətdəki məhsularrın hesablanması
        $total_price =0.0;
        $total_count = 0;
        foreach ($products as $product){
            $product->total_price = $product->count * $product->price;
            $total_price = $total_price + $product->total_price;
            $total_count += $product->count;

        }
        $total_count . "=>" . $total_price;

        $summary["total_price"] = $total_price;
        $summary["total_count"] = $total_count;
        $_SESSION["shoppingCart"]["products"] = $products;
        $_SESSION["shoppingCart"]["summary"] = $summary;
        return true;
    }
}

if (isset($_POST['p'])){
    $proses = $_POST['p'];
    if ($proses == "addToCart"){
     $id = $_POST['product_id'];
     $product = $db->query("SELECT * FROM products WHERE id={$id}",PDO::FETCH_OBJ)->fetch();
     $product->count = 1;
   echo  addToCart($product);
    }elseif ($proses == "removeFromCart"){
        $id = $_POST["product_id"];
      echo  removeFromCart($id);
    }

}
if (isset($_GET['p'])){
    $proses = $_GET['p'];
    if ($proses == "incCount"){
        $id = $_GET['product_id'];

        if (incCount($id)){
          header("Location:../shopping-cart.php");
        }

    }elseif ($proses == "decCount"){
        $id = $_GET["product_id"];
        if (decCount($id)){
            header("Location:../shopping-cart.php");
        }
    }

}








?>