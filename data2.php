<?php
//setting header to json
header('Content-Type: application/json');

include('koneksi.php');
$query = sprintf("SELECT count(fp.customer_id) as total, c.nama FROM fakta_pendapatan fp JOIN customer c ON fp.customer_id=c.customer_id GROUP by fp.customer_id order by count(fp.customer_id) desc LIMIT 10");
$result2 = $koneksi->query($query);

$data2 = array();
foreach ($result2 as $row2){
	$data2[] = $row2;
}

$result2 -> close();

print json_encode($data2);
?>