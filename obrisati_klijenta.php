<?php
include "konekcija.php";



		$query = $conn->prepare("SELECT * FROM vlasnik");
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
  
    </tr>"
    ;

    foreach($result as $row)
    {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['jmbg'] . "</td>";
  echo "<td>" . $row['ime'] . "</td>";
  echo "<td>" . $row['prezime'] . "</td>";  
  echo "<td>" . $row['adresa'] . "</td>";
  
  
}

  echo "</tr>";
  echo "</table>";



?>
<html>
<br><br><hr>
<body>
  <form method="post" action="">
    Obrisi koriniska sa ID = : <input type="number" id="id" name="id"  /><br /><br>
    <input type="submit" value="Obrisati" >
  </form>
</body>
</html>
<?php
$id_to_delete = $_POST['id'];
if(isset($_POST['id'])){

$sql = "DELETE FROM vlasnik WHERE id = :id_to_delete";
$query = $conn->prepare($sql);
$query->execute( array( ":id_to_delete" => $id_to_delete ) );







if(isset($_POST['id']))
{
header("location:obrisati_klijenta.php"); 



}

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