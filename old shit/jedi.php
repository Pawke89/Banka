<?php


include "konekicja.php";

$id_to_edit = $_POST['edit'];
if(isset($_POST['edit'])){

$sql = ("SELECT * FROM banka1 WHERE id = :id_to_edit");
$query = $conn->prepare($sql);
$query->execute( array( ":id_to_edit" => $id_to_edit ) );
	
		$result = $query->fetchall();
		print_r($result);

		}

?>