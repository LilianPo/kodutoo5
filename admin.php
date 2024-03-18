<?php include("header.php"); ?>
<?php
if (isset($_GET['ok'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote lisamine õnnestus!
  </div>';
}
?>
<div class= "jumbotron-fluid">
    <div class="container">
<h1>Admin leht</h1>
<form action="" method="post" enctypr="multipart/form-data">
<div class="form-group col-md-6">
    <label for="nimetus">Toote nimetus:</label>
    <input type="text" class="form-control" name="nimetus" required><br>
    </div>

    <div class="form-group col-md-6">
    <label for="hind">Toote hind:</label>
    <input type="number" class="form-control" min="0.00" max="100.00" step="0.01" name="hind" required><br>
    </div>

    <label for="lisapilt"></label>
    <input type="file" name="lisapilt">
    <input type="hidden" name="page" value="services">

    <input class="btn btn-success" type="submit" value="Lisa uus toode">
</form>
<form action="" method="post" enctypr="multipart/form-data">
    <div class="form-group col-md-6">
    </div>
</form>
</div>
</div>
<?php
if (isset($_POST['nimetus'])) {

    $ajutine_fail = $_FILES['lisapilt']['tmp_name'];
    move_uploaded_file($ajutine_fail, 'pildid/'.$_FILES['lisapilt']['name']);

    $read=array();

    $id = array_push($read,count(file('products.csv'))+1);

    $nimetus = array_push($read, $_POST['nimetus']);
    $hind = array_push($read, $_POST['hind']);
    $pildinimi = array_push($read, $_FILES['lisapilt']['name']);

    $path = 'products.csv';
    $fp = fopen($path, 'a'); 
    fputcsv($fp, $read);
    fclose($fp);
    header('Location:avaleht.php?page=services&ok');
}
?>
<?php

?>