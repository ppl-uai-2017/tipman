<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

$idchildcare =  $_SESSION['idchildcare'];
$username = $_SESSION['username'];
$name = $_GET['namem'];
$phone = $_GET['phonem'];
$email = $_GET['emailm'];
$date = $_GET['datem'];
$starttime = $_GET['starttimem'];
$finishtime = $_GET['finishtimem'];
$childincare = $_GET['childincarem'];

echo $idchildcare,$username,$name,$phone,$email,$date,$starttime,$finishtime,$childincare;

$insert_order = $db_handle->runQuery("INSERT INTO pemesanan (idchildcare, username, name, phone, email, date, starttime, finishtime, childincare, statuspemesanan) VALUES('$idchildcare','$username', '$name','$phone','$email','$date','$starttime','$finishtime','$childincare', 'menunggu')");

$cekidpemesanan = $db_handle->runQuery("SELECT * FROM pemesanan WHERE idpemesanan = @@Identity ");
$a = $cekidpemesanan[0]['idpemesanan'];
$sql_getpemesanan = $db_handle->runQuery("SELECT * FROM pemesanan as p, childcare as c WHERE p.idpemesanan = '$a' AND c.id=p.idchildcare");
$total = $sql_getpemesanan[0]['priceperday'];
$insert_invoice = $db_handle->runQuery("INSERT INTO invoice (idpemesanan, total, statuspembayaran) VALUES('$a', $total, '1')");
?>
<script>
		var a = <?php echo $a?>;
		window.location = "invoice.php?id="+a;
	</script>