<?php
	
  include_once'connectdb.php';
    
    $id = $_POST['bid']; 
    $delete=$pdo->prepare("delete from booking_tbl where id=".$id);
    $delete->execute();
    
?>