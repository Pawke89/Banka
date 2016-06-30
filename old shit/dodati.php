<?php

include "konekcija.php";



$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];
$id_racuna = $_POST['id_racuna'];
$vlasnik_jmbg = $_POST['vlasnik_jmbg'];
$stanje = $_POST['stanje'];

	?>


<?php



if(empty($jmbg) OR empty($ime) OR empty($prezime) OR empty($adresa) OR empty($id_racuna) OR empty($vlasnik_jmbg) OR empty($stanje)){
	echo "*VAZNO* -- Sva polja moraju biti popunjena<br><hr>";
}else {
if(isset($_POST['jmbg'])){

	$r = "INSERT INTO banka1 (jmbg, ime, prezime, adresa, id1, vlasnik_jmbg, stanje) VALUES (:jmbg, :ime, :prezime, :adresa, :id_racuna, :vlasnik_jmbg, :stanje);";
	$query = $conn->prepare($r);
	$result = $query->execute(array(
		":jmbg"=>$jmbg,
		":ime"=>$ime,
		":prezime"=>$prezime,	
		":adresa"=>$adresa,
		":id_racuna"=>$id_racuna,
		":vlasnik_jmbg"=>$vlasnik_jmbg,
		":stanje"=>$stanje

		));
}
}

if(isset($_POST['jmbg'])){

	$tr = "INSERT INTO racuni (vlasnik_jmbg, racun, stanje, prezime) VALUES (:vlasnik_jmbg, :racun, :stanje, :prezime);";
	$query = $conn->prepare($tr);
	$result = $query->execute(array(
		":vlasnik_jmbg"=>$vlasnik_jmbg,
		":racun"=>$racun,
		":stanje"=>$stanje,
		":prezime"=>$prezime
		

		));
}

/*
if(isset($_POST['stanje'])){

	$trr = "INSERT INTO racuni (stanje) VALUES (:stanje);";
	$query = $conn->prepare($trr);
	$result = $query->execute(array(
		":stanje"=>$stanje,
		));
}
*/
?>

<html></html>
<head>Dodati novog korisnika</head>
<br><br>
<body>
	<form method="post" action="">
		JMBG: <input type="number" id="jmbg" name="jmbg" />*<br /><br>
		Ime: <input type="text" id="ime" name="ime"/>*<br/><br>
		Prezime: <input type="text" id="prezime" name="prezime"/>*<br /><br>
		Adresa: <input type="text" id="adresa" name="adresa"/>*<br /><br>
		ID Racuna: <input type="number" id="id_racuna" name="id_racuna"/>*<br /><br>
		Vlasnikov JMBG: <input type="number" id="vlasnik_jmbg" name="vlasnik_jmbg"/>*<br /><br>
		Stanje: <input type="number" id="stanje" name="stanje"/>*<br /><br>
		<input type="submit" value="Dodaj">
	</form>
</body>


<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna strana"> </form>


	</html>