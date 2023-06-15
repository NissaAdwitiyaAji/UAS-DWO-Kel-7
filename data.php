<?php
//setting header to json
header('Content-Type: application/json');

include('koneksi.php');
$query = "SELECT SUM(fp.Quantity) AS total, p.Name
FROM faktaproductionbaru fp
JOIN product p ON fp.ProductID = p.ProductID
GROUP BY fp.ProductID
ORDER BY total desc
limit 10";

$result = $koneksi->query($query);

$data = array();
foreach ($result as $row){
  $data[] = array("judul" => $row["Name"], "total" => $row["total"]);
}

$result->close();

echo json_encode($data);
?>