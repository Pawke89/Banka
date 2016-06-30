<?php


include "konekcija.php";


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


<form  method='post' action="rad_racun.php">
	<br>
	<hr>
	<input type="submit" value="Rad sa racunima"> </form>

<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna Strana"> </form>
<form  method='post' action="obrisati_racun.php">
	<br>
	<hr>
	<input type="submit" value="Brisanje Racuna"> </form>
<form  method='post' action="dodaj_racun.php">
	<br>
	<hr>
	<input type="submit" value="Dodati Racuna"> </form>


	</html>


