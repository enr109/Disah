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
	$sql="SELECT * FROM tblcliente where clinombre like '%$keyword%' or cliap like '%$keyword%'";
	$query = $conn->query($sql);
	$tblclientes = array();

	while($row = $query->fetch_array()){
		array_push($tblclientes, $row);
	}

	$out['clientes'] = $tblclientes;
}

$conn->close();

header("Content-type: application/json");
echo json_encode($out);
die();

?>
