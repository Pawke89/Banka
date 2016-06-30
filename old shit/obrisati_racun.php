<?php

include "konekcija.php";



    $query = $conn->prepare("SELECT * FROM racuni");
    $query->execute();
    $result = $query->fetchall();
    //echo "<pre>" ,print_r($result), "<pre>";

        echo 
    "<table border='3'>
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

$sql = "DELETE FROM racuni WHERE id = :id_to_delete";
$query = $conn->prepare($sql);
$query->execute( array( ":id_to_delete" => $id_to_delete ) );







if(isset($_POST['id']))
{
header("location:obrisati_racun.php"); 



}

}

   
?>
<html>


<form  method='post' action="index.php">
	<br>
	<hr>
	<input type="submit" value="Pocetna strana"> </form>


	</html>