<?php
$conn = new mysqli("proyectosti.digital-server.net", "aswfcpbu_enrique", "_RqOS?Y8@1Og", "aswfcpbu_bdproyectopro");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$out = array('error' => false);

//$action="show";

if(isset($_GET['action'])){
	$action=$_GET['action'];
}

if($action=='search'){
	$keyword=$_POST['keyword'];
	$sql="SELECT * FROM tblproductos where vchnomproduct like '%$keyword%'";
	$query = $conn->query($sql);
	$tblproductos = array();

	while($row = $query->fetch_array()){
		array_push($tblproductos, $row);
	}

	$out['productos'] = $tblproductos;
}

$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();

?>
