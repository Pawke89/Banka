<?php

include "konekcija.php";


$query = $conn->prepare("SELECT * FROM banka1");
$query->execute();
$result = $query->fetchall();
		//echo "<pre>" ,print_r($result), "<pre>";

echo 
"<table border='2'>
<tr>
<th>ID</th>
<th>Jmbg</th>
<th>Ime</th>
<th>Prezime</th>
<th>Adresa</th>
<th>ID RACUNA</th>
<th>Vlasnik JMBG</th>
<th>Stanje u RSD</th>
</tr>"
;

foreach($result as $row)
{
	echo "<tr>";
	echo "<td>" . $row['id'] . "</td>";
	echo "<td>" . $row['jmbg'] . "</td>";
	echo "<td>" . $row['ime'] . "</td>";
	echo "<td>" . $row['prezime'] . "</td>";  
	echo "<td>" . $row['adresa'] . "</td>";
	echo "<td>" . $row['id1'] . "</td>";
	echo "<td>" . $row['vlasnik_jmbg'] . "</td>";
	echo "<td>" . $row['stanje'] . "</td>";

}

echo "</tr>";
echo "</table>";

?>


<html></html>
<br><br><hr>
<body>
	<form method="post" action="">
		Izmeni podatke korisniku sa ID = : <input type="number" id="edit" name="edit"  /><br /><br>
		<input type="submit" value="Edit" >
	</form>
</body>

<?php 	
$id_to_edit = $_POST['edit'];
if(isset($_POST['edit'])){

	$sql = ("SELECT * FROM banka1 WHERE id = :id_to_edit");
	$query = $conn->prepare($sql);
	$query->execute( array( ":id_to_edit" => $id_to_edit ) );
	
	$result = $query->fetchall();
	echo 
	"<table border='2'>
	<tr>
	<th>ID</th>
	<th>Jmbg</th>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Adresa</th>
	<th>ID RACUNA</th>
	<th>Vlasnik JMBG</th>
	<th>Stanje u RSD</th>
	</tr>"
	;

	foreach($result as $row)
	{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['jmbg'] . "</td>";
		echo "<td>" . $row['ime'] . "</td>";
		echo "<td>" . $row['prezime'] . "</td>";  
		echo "<td>" . $row['adresa'] . "</td>";
		echo "<td>" . $row['id1'] . "</td>";
		echo "<td>" . $row['vlasnik_jmbg'] . "</td>";
		echo "<td>" . $row['stanje'] . "</td>";

	}
}	

// OVDE SE ZAVRSAVA PRVI DEO KAD BIRAS KOJI CES ID DA EDITUJES!!!



// OVDE POCINJE DEO EDITOVANJA
?>


<html></html>
<head>Dodati novog korisnika</head>
<br><br>
<body>
	<form method="post" action="">
		ID: <input type="text" id="kurac" name="kurac" value="<?php echo $id_to_edit ?>" /><br/><br>
		JMBG: <input type="text" id="jmbg" name="jmbg" /><br /><br>
		Ime: <input type="text" id="ime" name="ime"/><br/><br>
		Prezime: <input type="text" id="prezime" name="prezime"/><br /><br>
		Adresa: <input type="text" id="adresa" name="adresa"/><br /><br>
		ID Racuna: <input type="text" id="id_racuna" name="id_racuna"/><br /><br>
		Vlasnikov JMBG: <input type="text" id="vlasnik_jmbg" name="vlasnik_jmbg"/><br /><br>
		Stanje: <input type="number" id="stanje" name="stanje"/><br /><br>
		<input type="submit" name="izmeni" value="Izmeni">
	</form>
</body>

<?php

$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];
$id_racuna = $_POST['id_racuna'];
$vlasnik_jmbg = $_POST['vlasnik_jmbg'];
$stanje = $_POST['stanje'];

$id_to_edit = $_POST['kurac'];

?>
<?php

$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];
$id_racuna = $_POST['id_racuna'];
$vlasnik_jmbg = $_POST['vlasnik_jmbg'];
$stanje = $_POST['stanje'];

$id_to_edit1 = $_POST['kurac'];

if(isset($_POST['izmeni']))
{
	header("location:izmena.php"); 



}

if(empty($jmbg)){}else{
	if(isset($_POST['jmbg'])){


		$q = ("UPDATE banka1 SET jmbg = :jmbg WHERE id = :id_to_edit1");
		$query = $conn->prepare($q);
		
		$result = $query->execute(array(
			":id_to_edit1" => $_POST['kurac'],
			":jmbg" => $jmbg,	
			));
	}
}
if(empty($ime)){}else{
	if(isset($_POST['ime'])){


		$q = ("UPDATE banka1 SET ime = :ime WHERE id = :id_to_edit1");
		$query = $conn->prepare($q);
		$result = $query->execute(array(
			":id_to_edit1" => $_POST['kurac'],
			":ime" => $ime,	
			));
	}
}
if(empty($prezime)){}else{
	if(isset($_POST['prezime'])){


		$q = "UPDATE banka1 SET prezime = :prezime WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],
			":prezime" => $prezime,	
			));
	}
}

if(empty($adresa)){}else{
	if(isset($_POST['adresa'])){


		$q = "UPDATE banka1 SET adresa = :adresa WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],	
			":adresa" => $adresa,	
			));
	}
}

if(empty($id_racuna)){}else{
	if(isset($_POST['id_racuna'])){


		$q = "UPDATE banka1 SET id1 = :id_racuna WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],	
			":id_racuna" => $id_racuna,	
			));
	}
}

if(empty($vlasnik_jmbg)){}else{
	if(isset($_POST['vlasnik_jmbg'])){


		$q = "UPDATE banka1 SET vlasnik_jmbg = :vlasnik_jmbg WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],
			":vlasnik_jmbg" => $vlasnik_jmbg,	
			));
	}
}
if(empty($stanje)){}else{
	if(isset($_POST['stanje'])){


		$q = "UPDATE banka1 SET stanje = :stanje WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],	
			":stanje" => $stanje,	
			));
	}
}

?>


<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetno stanje"> </form>


	</html>

