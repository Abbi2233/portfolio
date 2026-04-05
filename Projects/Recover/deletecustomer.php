<?php
	
  include_once'connectdb.php';
    
    $id = $_POST['cid']; 
    $delete=$pdo->prepare("delete from customers_tbl where cid=".$id);
    $delete->execute();
    
?>