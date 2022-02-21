<?php
$orderid = 2000208677 ;
$store_code = 1;
if ($store_code != 2 ) {
$result = substr($orderid, 0, 3); 
echo $result; 
}
?>