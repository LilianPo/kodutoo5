<?php include("header.php"); ?>
<?php
if (isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page =="services") {
        include("services.php");
    } else if ($page=="contact") {
        include("contact.php");
    }
}else{
    # code...

?>
<h1>Avalehe asjad</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi fugit dolorem nemo deleniti aspernatur in, cum, inventore tenetur veritatis placeat dignissimos quaerat corporis quibusdam asperiores recusandae alias totam, eligendi illo?</p>

<?php
}
?>
<?php include("footer.php"); ?>