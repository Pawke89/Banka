<?php

include "konekcija.php";

?>

<html>
<head>Dodati novog klijenta</head>
<br><br>
<body>
	<form method="post" action="">
		Broj Racuna: <input type="number" id="br_racuna" name="br_racuna" />*<br /><br>
		Prezime: <input type="text" id="prezime" name="prezime"/>*<br/><br>
		JMBG Klijenta: <input type="text" id="jmbg" name="jmbg"/>*<br /><br>
		Stanje: <input type="number" id="stanje" name="stanje"/>*<br /><br>
		<input type="submit" name="dodaj" value="Dodaj">
	</form>
</body>



<?php

$br_racuna = $_POST['br_racuna'];
$prezime = $_POST['prezime'];
$jmbg = $_POST['jmbg'];
$stanje = $_POST['stanje'];


if(!empty($br_racuna) AND !empty($prezime) AND !empty($jmbg) AND !empty($stanje)){

if(isset($_POST['dodaj'])){
	$rt = "INSERT INTO racun (br_racuna, prezime, vlasnik_jmbg, stanje) VALUES (:br_racuna, :prezime, :jmbg, :stanje);";
	$query = $conn->prepare($rt);
	$result = $query->execute(array(
		":br_racuna"=>$br_racuna,
		":prezime"=>$prezime,
		":jmbg"=>$jmbg,	
		":stanje"=>$stanje,
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
