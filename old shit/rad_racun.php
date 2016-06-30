<?php


include "konekcija.php";

echo "ovde radis sa racunima";

		$query = $conn->prepare("SELECT * FROM racuni");
		$query->execute();
		$result = $query->fetchall();
		//echo "<pre>" ,print_r($result), "<pre>";

		    echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>Klijent - JMBG</th>
    <th>Racun</th>
    <th>StanjeTR</th>
    <th>Prezime<th>

   
    </tr>"
    ;

    foreach($result as $row)
    {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['vlasnik_jmbg'] . "</td>";
  echo "<td>" . $row['racun'] . "</td>";
  echo "<td>" . $row['stanje'] . "</td>";
  echo "<td>" . $row['prezime'] . "</td>";


}

  echo "</tr>";
  echo "</table>";

?>
<html>
<br><br><hr>
<body>
	<form method="post" action="">
		Izmeni podatke korisniku sa ID = : <input type="number" id="edit" name="edit"  /><br /><br>
		<input type="submit" value="Edit" >
	</form>
</body>

</html>

<?php


$id_to_edit = $_POST['edit'];

?>

<html>
<head>IZMENA RACUNA</head>
<br><br>
<body>
	<form method="post" action="">
		ID: <input type="text" id="kurac" name="kurac" value="<?php echo $id_to_edit ?>" /><br/><br>
		<!-- Klijent JMBG: <input type="text" id="jmbg" name="jmbg" /><br /><br> -->
		Racun: <input type="text" id="racun" name="racun"/><br/><br>
		Stanje: <input type="text" id="stanje" name="stanje"/><br /><br>
		<!--Ukupno Stanje: <input type="text" id="ukupno_stanje" name="ukupno_stanje"/><br /><br>-->
		
		<input type="submit" name="izmeni" value="Izmeni">
	</form>
</body>



<?php

$klijent_jmbg = $_POST['jmbg'];
$racun = $_POST['racun'];
$stanje = $_POST['stanje'];
//$ukupno_stanje = $_POST['ukupno_stanje'];


$id_to_edit = $_POST['kurac'];



?>
<?php

$klijent_jmbg = $_POST['jmbg'];
$racun = $_POST['racun'];
$stanje = $_POST['stanje'];
//$ukupno_stanje = $_POST['ukupno_stanje'];


$id_to_edit = $_POST['kurac'];

if(isset($_POST['izmeni']))
{
	header("location:rad_racun.php"); 



}
/*
if(empty($jmbg)){}else{
	if(isset($_POST['jmbg'])){


		$q = ("UPDATE racuni SET vlasnik_jmbg = :jmbg WHERE id = :id_to_edit1");
		$query = $conn->prepare($q);
		
		$result = $query->execute(array(
			":id_to_edit1" => $_POST['kurac'],
			":jmbg" => $jmbg,	
			));

	
	}
}
*/
if(empty($racun)){}else{
	if(isset($_POST['racun'])){


		$q = ("UPDATE racuni SET racun = :racun WHERE id = :id_to_edit1");
		$query = $conn->prepare($q);
		$result = $query->execute(array(
			":id_to_edit1" => $_POST['kurac'],
			":racun" => $racun,	
			));
	}
}
if(empty($stanje)){}else{
	if(isset($_POST['stanje'])){


		$q = "UPDATE racuni SET stanje = :stanje WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],
			":stanje" => $stanje,	
			));
	}
}
/*
if(empty($ukupno_stanje)){}else{
	if(isset($_POST['ukupno_stanje'])){


		$q = "UPDATE racuni SET ukupno_stanje = :ukupno_stanje WHERE id = :id_to_edit1 ;";
		$query = $conn->prepare($q);
		$result = $query->execute(array(

			":id_to_edit1" => $_POST['kurac'],	
			":ukupno_stanje" => $ukupno_stanje,	
			));
	}
}
*/

?>


<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna strana"> </form>


	</html>

