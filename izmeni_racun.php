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
<br><br><hr>
<body>
  <form method="post" action="">
    Izmeni podatke na racunu sa ID = : <input type="number" id="edit" name="edit"  /><br /><br>
    <input type="submit" value="Potvrdi" name="edit1" >
  </form>
</body>
</html>

<?php   
$id_to_edit = $_POST['edit'];
if(isset($_POST['edit'])){

  $sql = ("SELECT * FROM racun WHERE id = :id_to_edit");
  $query = $conn->prepare($sql);
  $query->execute( array( ":id_to_edit"=>$id_to_edit ) );
  
  $result = $query->fetchall();
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

// OVDE SE ZAVRSAVA PRVI DEO KAD BIRAS KOJI CES ID DA EDITUJES!!!
}


// OVDE POCINJE DEO EDITOVANJA
?>
<br><br><hr>
<html>
<head>Izmeni racun sa ID <?php echo $id_to_edit ?></head>
<br><br>
<body>
  <form method="post" action="izmeni_racun.php">
    ID: <input type="text" id="kurac" name="kurac" value="<?php echo $id_to_edit ?>" /><br/><br>
    Broj Racuna: <input type="" id="br_racuna" name="br_racuna" /><br /><br>
    Prezime: <input type="text" id="prezime" name="prezime"/><br/><br>
    JMBG: <input type="number" id="jmbg" name="jmbg"/><br /><br>
    Stanje: <input type="number" id="stanje" name="stanje"/><br /><br>
    <input type="submit" name="izmeni" value="Izmeni">
  </form>
</body>

<?php

$br_racuna = $_POST['br_racuna'];
$prezime = $_POST['prezime'];
$jmbg = $_POST['jmbg'];
$stanje = $_POST['stanje'];

$id_to_edit = $_POST['kurac'];

?>
<?php

$br_racuna = $_POST['br_racuna'];
$prezime = $_POST['prezime'];
$jmbg = $_POST['jmbg'];
$stanje = $_POST['stanje'];

$id_to_edit1 = $_POST['kurac'];



if(empty($br_racuna)){}else{
  if(isset($_POST['br_racuna'])){


    $q = ("UPDATE racun SET br_racuna = :br_racuna WHERE id = :id_to_edit1");
    $query = $conn->prepare($q);
    
    $result = $query->execute(array(
      ":id_to_edit1" => $_POST['kurac'],
      ":br_racuna" => $br_racuna, 
      ));
  }
}
if(empty($prezime)){}else{
  if(isset($_POST['prezime'])){


    $q = ("UPDATE racun SET prezime = :prezime WHERE id = :id_to_edit1");
    $query = $conn->prepare($q);
    $result = $query->execute(array(
      ":id_to_edit1" => $_POST['kurac'],
      ":prezime" => $prezime, 
      ));
  }
}
if(empty($jmbg)){}else{
  if(isset($_POST['jmbg'])){


    $q = "UPDATE racun SET vlasnik_jmbg = :jmbg WHERE id = :id_to_edit1 ;";
    $query = $conn->prepare($q);
    $result = $query->execute(array(

      ":id_to_edit1" => $_POST['kurac'],
      ":jmbg" => $jmbg, 
      ));
  }
}

if(empty($stanje)){}else{
  if(isset($_POST['stanje'])){


    $q = "UPDATE racun SET stanje = :stanje WHERE id = :id_to_edit1 ;";
    $query = $conn->prepare($q);
    $result = $query->execute(array(

      ":id_to_edit1" => $_POST['kurac'],  
      ":stanje" => $stanje, 
      ));
  }
}


if(isset($_POST['izmeni']))
{
  echo "<meta http-equiv=refresh content=\"0; URL=izmeni_racun.php\">";
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