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

<html></html>
<br><br><hr>
<body>
	<form method="post" action="">
		Obrisi koriniska sa ID = : <input type="number" id="id" name="id"  /><br /><br>
		<input type="submit" value="Obrisati" >
	</form>
</body>
<?php
$id_to_delete = $_POST['id'];
if(isset($_POST['id'])){

$sql = "DELETE FROM banka1 WHERE id = :id_to_delete";
$query = $conn->prepare($sql);
$query->execute( array( ":id_to_delete" => $id_to_delete ) );







if(isset($_POST['id']))
{
header("location:obrisati.php"); 



}

}

   
?>
<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna strana"> </form>


	</html>