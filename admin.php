<!doctype html>
<html lang="et">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BootstrapLP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script data-name="TokenSigning" data-by="Web-eID extension"
    src="chrome-extension://ncibgoaomkmdpilpocfeponihegamlic/token-signing-page-script.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<?php include("header.php"); ?>
<?php
if (isset($_GET['ok'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote lisamine õnnestus!
  </div>';
}
if (isset($_GET['okDel'])) {
    echo '<div class="alert alert-success" role="alert">
    Toote eemaldamine õnnestus!
  </div>';
}
?>
<div class= "jumbotron-fluid">
    <div class="container mt-3 ">
<h1>Admin leht</h1>
<h2>Toodete lisamine</h2>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group col-md-6">
    <label for="nimetus">Toote nimetus:</label>
    <input type="text" class="form-control" name="nimetus" required><br>
    </div>

    <div class="form-group col-md-6">
    <label for="hind">Toote hind:</label>
    <input type="number" class="form-control" min="0.00" max="100.00" step="0.01" name="hind" required><br>
    </div>

    <input type="file" name="lisapilt">

    <input class="btn btn-success" type="submit" value="Lisa uus toode">
</form>
<?php
if (isset($_POST['nimetus'])) {

    $ajutine_fail = $_FILES['lisapilt']['tmp_name'];
    $uploadresult = move_uploaded_file($ajutine_fail, 'pildid/'.$_FILES['lisapilt']['name']);
    

    $read=array();

    $id = array_push($read,count(file('products.csv'))+1);

    $nimetus = array_push($read, $_POST['nimetus']);
    $hind = array_push($read, $_POST['hind']);
    $pildinimi = array_push($read, $_FILES['lisapilt']['name']);

    $path = 'products.csv';
    $fp = fopen($path, 'a'); 
    fputcsv($fp, $read);
    fclose($fp);
    header('Location:admin.php?page=services&ok');
    
}
?>
<?php
$products = "products.csv";
$minu_csv = fopen($products, "r");
?>

</div>
</div>
<div class="container mt-5 ">
<div class="jumbotron-fluid">
    <h2>Toodete nimekiri</h2>
<table class="table">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Toode</th>
        <th scope="col">Hind</th>
        <th scope="col">Kustuta</th>
    </tr>
</thead>
<tbody>
    <?php
    while (!feof($minu_csv)) {
    $rida = fgetcsv($minu_csv, filesize($products), ",");
    if (is_array($rida)) {
        echo '<tr>';
        echo '<th scope="row">' . $rida[0] . '</th>';
        echo '<td>' . $rida[1] . '</td>';
        echo '<td>' . $rida[2] . '€</td>';
        echo '<td>
        <a href="delete_row.php?id='.$rida[0].'"><img src="Prügikast.png" alt="Kustuta" width="30" height="30">
        </a>';
        echo '</tr>';
    }
}
?>
        </tbody>
        </table>
    </div>
</div>
<?php
    fclose($minu_csv);
?>
<?php include("footer.php"); ?>
<script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>