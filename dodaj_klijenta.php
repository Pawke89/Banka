<?php

include "konekcija.php";

?>

<html>
<head>Dodati novog klijenta</head>
<br><br>
<body>
	<form method="post" action="">
		JMBG: <input type="number" id="jmbg" name="jmbg" />*<br /><br>
		Ime: <input type="text" id="ime" name="ime"/>*<br/><br>
		Prezime: <input type="text" id="prezime" name="prezime"/>*<br /><br>
		Adresa: <input type="text" id="adresa" name="adresa"/>*<br /><br>
		<input type="submit" value="Dodaj">
	</form>
</body>



<?php

$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];


if(!empty($jmbg) AND !empty($ime) AND !empty($prezime) AND !empty($adresa)){

if(isset($_POST['jmbg'])){
	$rt = "INSERT INTO vlasnik (jmbg, ime, prezime, adresa) VALUES (:jmbg, :ime, :prezime, :adresa);";
	$query = $conn->prepare($rt);
	$result = $query->execute(array(
		":jmbg"=>$jmbg,
		":ime"=>$ime,
		":prezime"=>$prezime,	
		":adresa"=>$adresa,
		));
}



}else {
	echo "Sva polja moraju biti popunjena! Hvala.";
}


?>
<html>
 <form  method='post' action="index.php">
  	<br>
	<hr>
  <input type="submit" value="Pocetna Strana" style="width: 300px; padding: 5px; box-shaddow: 6px 6px 5px; #999999; 
  -webkit-box-shadow: 6px 6px 5px #999999; -moz-box-shadow: 6px 6px 5px #999999;
   font-weight: bold; background: #999555; color: #ffffff; cursor: pointer; border-radius: 10px; border: 1px solid #000000; font-size: 100%;"> </form>


  </html>	
