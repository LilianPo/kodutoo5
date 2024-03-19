<?php
$failinimi = "products.csv";
$id = $_GET["id"];

delLineFromFile($failinimi, $id);

function delLineFromFile($failinimi, $id){
    if(!is_writable($failinimi))
    {
        print "Faili $failinimi ei saa muuta";
        exit;
    }
    else
    {
$loe = file($failinimi);
$lineToDelete= $id-1;
unset($loe["$lineToDelete"]);

if(!$fp = fopen($failinimi, 'w+'))
{
    print "Ei saa avada faili $failinimi";
    exit;
}
if($fp)
{
    foreach($loe as $rida){ fwrite($fp,$rida);}
    fclose($fp);
}
header('Location:admin.php?page=services&okDel');
}
}
?>