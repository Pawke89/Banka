

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
  //echo "<td><a href=Student.php?studentA_num=" . $row['anum'] . ">" .$row['anum'] . " </a></td>";
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

<html>


<form  method='post' action="izmena.php">
	<br>
	<hr>
	<input type="submit" value="Izmeni podatke"> </form>

<form  method='post' action="dodati.php">
	
	<input type="submit" value="Dodati novog korisnika"> </form>

<form  method='post' action="obrisati.php">
  
  <input type="submit" value="Obrisi korisnika"> </form>

	</html>
  <form  method='post' action="index.php">
  
  <input type="submit" value="Pocetna strana"> </form>

  </html>


