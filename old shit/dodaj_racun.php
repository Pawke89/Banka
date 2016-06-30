<?php


include "konekcija.php";


echo "Dodaj novi racun";

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
		Dodaj novi racun klijentu sa JMBGom  = : <input type="number" id="edit" name="edit"  /><br /><br>
		<input type="submit" value="Nastavi dalje" >
	</form>
	<form method="post" action="">
		Prezime  = : <input type="text" id="edit1" name="edit1"  /><br /><br>
		<input type="submit" value="Nastavi dalje" >
	</form>
</body>

</html>

<?php


$id_to_edit = $_POST['edit'];
$id_to_prezime = $_POST['edit1'];

?>

<html>
<head>DODAVANJE RACUNA</head>
<br><br>
<body>
	<form method="post" action="">
		Klijent JMBG: <input type="text" id="jmbg" name="jmbg" value="<?php echo $id_to_edit; ?>" /><br /><br> 
		Racun: <input type="text" id="racun" name="racun"/><br/><br>
		Stanje: <input type="text" id="stanje" name="stanje"/><br /><br>
		Prezime: <input type="text" id="ukupno_stanje" name="<?php echo $id_to_prezime; ?>"/><br /><br>
		
		<input type="submit" name="izmeni" value="Dodaj">
	</form>
</body>



<?php

$klijent_jmbg = $_POST['jmbg'];
$racun = $_POST['racun'];
$stanje = $_POST['stanje'];
$prezime = $_POST['prezime'];

if(empty($klijent_jmbg) OR empty($racun) OR empty($stanje) OR empty($ukupno_stanje)){
	echo "*VAZNO* -- Sva polja moraju biti popunjena";
}else {
if(isset($_POST['jmbg'])){

	$r = "INSERT INTO racuni (vlasnik_jmbg, racun, stanje, prezime) VALUES (:jmbg, :racun, :stanje, :prezime);";
	$query = $conn->prepare($r);
	$result = $query->execute(array(
		":jmbg"=>$_POST['jmbg'],
		":racun"=>$racun,
		":stanje"=>$stanje,	
		":prezime"=>$_POST['prezime'],
		

		));
}

if(isset($_POST['id']))
{
header("location:dodaj_racun.php"); 



}

}


?>

<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna strana"> </form>


	</html>