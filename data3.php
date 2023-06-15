<?php
//setting header to json
header('Content-Type: application/json');

include('koneksi.php');
$query = sprintf("SELECT DISTINCT(t.namahari) as nama, SUM(fp.amount) as total FROM fakta_pendapatan fp JOIN time t ON fp.time_id=t.time_id GROUP by t.namahari ORDER BY CASE WHEN t.namahari = 'Sunday' THEN 1 WHEN t.namahari = 'Monday' THEN 2 WHEN t.namahari = 'Tuesday' THEN 3 WHEN t.namahari = 'Wednesda' THEN 4 WHEN t.namahari = 'Thursday' THEN 5 WHEN t.namahari = 'Friday' THEN 6 WHEN t.namahari = 'Saturday' THEN 7 END ASC");
$result3 = $koneksi->query($query);

$data3 = array();
foreach ($result3 as $row3){
	$data3[] = $row3;
}

$result3 -> close();

print json_encode($data3);
?>