<?php
try {
    $db = new PDO("mysql:hostname=localhost;dbname=shooping_cart;charset=utf8","root","");
}catch (PDOException $e){
    echo $e->getMessage();
}
?>