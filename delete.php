<?php
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid']; 
    
    $query = "delete from products where product_id = ?"; 
    require_once "classes/dbh.class.php"; 
    $dbh = new Dbh(); 
    $dbh = $dbh->connect(); 
    $stmt = $dbh->prepare($query); 
    $stmt->execute([$id]);

    $dbh = null; 
    header("Location: display.php"); 

}