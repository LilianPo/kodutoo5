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
</head>
<body>

<?php include("header.php"); ?>
<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page =="tooted") {
        include("tooted.php");
    } else if ($page=="contakt") {
        include("contakt.php");
    }
}else{
    # code...

?>
<div class="container-fluid my-class" style="background-color:#FFE0DF;">
<div class="container">
    <div class="row flex-lg-row-reverse align-items-center py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="pilt.png" class="d-block mx-lg-auto img-fluid" alt="Jalgpall" width="600" height="400"
          loading="eager">
      </div>
      <div class="col-10 col-sm-8 col-lg-6">
        <p class="font-weight-bold display-5 lh-1 mb-3">SUPER ALE <br>-20% kõik tooted! </p>
        <p class="lead">
          Soodustus kehtib vaid sel nädalavahetusel!
        </p>
            <button type="button" class="btn btn-danger btn-rounded">Vaata pakkumisi</button>
      </div>
    </div>
  </div>
  </div>
  <div class="container">
  <div class="d-flex justify-content-center">
  <h2>Parimad pakkumised</h2>
  </div>
  </div>
<?php
}
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