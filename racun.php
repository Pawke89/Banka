<?php

include "konekcija.php";

		$query = $conn->prepare("SELECT * FROM racun");
		$query->execute();
		$result = $query->fetchall();
		//echo "<pre>" ,print_r($result), "<pre>";

		    echo 
    "<table border='2'>
    <tr>
    <th>ID</th>
    <th>Broj Racuna</th>
    <th>Prezime</th>
    <th>Jmbg</th>
    <th>Stanje</th>
    </tr>"
    ;

    foreach($result as $row)
    {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['br_racuna'] . "</td>";
  echo "<td>" . $row['prezime'] . "</td>";
  echo "<td>" . $row['vlasnik_jmbg'] . "</td>";  
  echo "<td>" . $row['stanje'] . "</td>";
   
}

  echo "</tr>";
  echo "</table>";



?>

<html>
 <form  method='post' action="izmeni_racun.php">
  	<br>
	<hr>
  <input type="submit" value="Promene na racunu" style="width: 300px; padding: 5px; box-shaddow: 6px 6px 5px; #999999; 
  -webkit-box-shadow: 6px 6px 5px #999999; -moz-box-shadow: 6px 6px 5px #999999;
   font-weight: bold; background: #999555; color: #ffffff; cursor: pointer; border-radius: 10px; border: 1px solid #000000; font-size: 100%;"> </form>


  </html>	
<html>
 <form  method='post' action="obrisati_racun.php">
  	<br>
	<hr>
  <input type="submit" value="Brisanje Racuna" style="width: 300px; padding: 5px; box-shaddow: 6px 6px 5px; #999999; 
  -webkit-box-shadow: 6px 6px 5px #999999; -moz-box-shadow: 6px 6px 5px #999999;
   font-weight: bold; background: #999555; color: #ffffff; cursor: pointer; border-radius: 10px; border: 1px solid #000000; font-size: 100%;"> </form>


  </html>	

<html>
 <form  method='post' action="index.php">
  	<br>
	<hr>
  <input type="submit" value="Pocetna Strana" style="width: 300px; padding: 5px; box-shaddow: 6px 6px 5px; #999999; 
  -webkit-box-shadow: 6px 6px 5px #999999; -moz-box-shadow: 6px 6px 5px #999999;
   font-weight: bold; background: #999555; color: #ffffff; cursor: pointer; border-radius: 10px; border: 1px solid #000000; font-size: 100%;"> </form>


  </html>	

