<?php
include_once'connectdb.php';
$data = array();

$sql=$pdo->prepare("SELECT booking_tbl.departure_date, customers_tbl.cname
FROM booking_tbl
INNER JOIN customers_tbl ON booking_tbl.customer_id=customers_tbl.cid");

$sql->execute();
$result = $sql->fetchAll();
foreach($result as $row)
{
 $data[] = array(
  // 'id'   => $count,
  'title'   => $row["cname"],
  'start'   => $row["departure_date"],
  // 'end'   => $row["end_event"]
 );
}
echo json_encode($data);
?>

