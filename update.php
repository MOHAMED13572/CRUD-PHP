<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">


        <form method="post">


            <div class="product_type">
                <label>Product type </label>
                <input type="text" class="form-control" placeholder="Ex. phone laptop tablet ..." name="product_type">
            </div>

            <div class="company">
                <label>Product company</label>
                <input type="text" class="form-control" placeholder="Ex. samsung apple ..." name="company">
            </div>

            <div class="quantity">
                <label>Quantity</label>
                <input type="number" class="form-control" placeholder="Ex. 1 10 200 ..." name="quantity">
            </div>

            <div class="price_for_unit">
                <label>Price</label>
                <input type="number" class="form-control" placeholder="Ex. 100 200 1000 ..." name="price_for_unit">
            </div>


            <br>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>


    </div>

</body>

<?php
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    if (isset($_POST['update'])) {

        $product_type = $_POST['product_type'];
        $company = $_POST['company'];
        $quantity = $_POST['quantity'];
        $price_for_unit = $_POST['price_for_unit'];

        // validate entered data
        require_once 'classes/validate.class.php';
        $validate = new Validate($product_type, $company, $quantity, $price_for_unit);
        if ($validate->validate_data() == "validated") {


            $query = "UPDATE products SET
    product_type = ?,
    company = ?,
    quantity = ?,
    price_for_unit = ?
    WHERE product_id=?";


            require_once 'classes/dbh.class.php';
            $dbh = new Dbh();
            $dbh = $dbh->connect();
            $stmt = $dbh->prepare($query);
            $stmt->execute([$product_type, $company, $quantity, $price_for_unit, $id]);

            $dbh = null;
            header("Location:display.php");
        } else echo $validate->validate_data();
    }
}
