<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>display data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <button class="btn btn-primary" name="add_product"><a href="user.php" class="text-light">Add product</a></button>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product type</th>
                    <th scope="col">Company</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit price</th>
                    <th scope="col">Total price</th>
                    <th scope="col">update / delete</th>
                </tr>
            </thead>
            
            
            <?php
$query = "select * from products "; 
require_once 'classes/dbh.class.php'; 
$dbh = new Dbh(); 
$dbh = $dbh->connect(); 
$stmt = $dbh ->prepare($query); 
$stmt->execute(); 
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

$dbh =null;
$stmt =null;

foreach($result as $element){
    echo "
    <tbody>
                <tr>
                    <td>".$element['product_id']."</td>
                    <td>".$element['product_type']."</td>
                    <td>".$element['company']."</td>
                    <td>".$element['quantity']."</td>
                    <td>".$element['price_for_unit']."</td>
                    <td>".$element['price_for_unit']*$element['quantity']."</td>
                    <td>
                    <button class='btn btn-primary' name='add_product'><a href='update.php?updateid=".$element['product_id']."' class='text-light'>Update</a></button>
                    <button class='btn btn-danger' name='add_product'><a href='delete.php?deleteid=".$element['product_id']."' class='text-light'>Delete</a></button>
                    </td>
                </tr>
            </tbody>
    ";
}
?>

</table>
</div>
</body>
