<?php
require 'include/all_include.php';

echo '<pre>';

$obj = new products;
$obj = $obj->get_product_qty("EP-51-40812");

var_dump($obj);



 ?>
