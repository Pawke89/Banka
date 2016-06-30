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
    Izmeni podatke korisniku sa ID = : <input type="number" id="edit" name="edit"  /><br /><br>
    <input type="submit" value="Potvrdi" name="edit1" >
  </form>
</body>
</html>

<?php   
$id_to_edit = $_POST['edit'];
if(isset($_POST['edit'])){

  $sql = ("SELECT * FROM vlasnik WHERE id = :id_to_edit");
  $query = $conn->prepare($sql);
  $query->execute( array( ":id_to_edit"=>$id_to_edit ) );
  
  $result = $query->fetchall();

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

// OVDE SE ZAVRSAVA PRVI DEO KAD BIRAS KOJI CES ID DA EDITUJES!!!
}


// OVDE POCINJE DEO EDITOVANJA
?>
<br><br><hr>
<html>
<head>Izmeni klijenta sa ID <?php echo $id_to_edit ?></head>
<br><br>
<body>
  <form method="post" action="izmeni_klijenta.php">
    ID: <input type="text" id="kurac" name="kurac" value="<?php echo $id_to_edit ?>" /><br/><br>
    JMBG: <input type="text" id="jmbg" name="jmbg" /><br /><br>
    Ime: <input type="text" id="ime" name="ime"/><br/><br>
    Prezime: <input type="text" id="prezime" name="prezime"/><br /><br>
    Adresa: <input type="text" id="adresa" name="adresa"/><br /><br>
    <input type="submit" name="izmeni" value="Izmeni">
  </form>
</body>

<?php

$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];

$id_to_edit = $_POST['kurac'];

?>
<?php

$jmbg = $_POST['jmbg'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];
$id_racuna = $_POST['id_racuna'];
$vlasnik_jmbg = $_POST['vlasnik_jmbg'];
$stanje = $_POST['stanje'];

$id_to_edit1 = $_POST['kurac'];



if(empty($jmbg)){}else{
  if(isset($_POST['jmbg'])){


    $q = ("UPDATE vlasnik SET jmbg = :jmbg WHERE id = :id_to_edit1");
    $query = $conn->prepare($q);
    
    $result = $query->execute(array(
      ":id_to_edit1" => $_POST['kurac'],
      ":jmbg" => $jmbg, 
      ));
  }
}
if(empty($ime)){}else{
  if(isset($_POST['ime'])){


    $q = ("UPDATE vlasnik SET ime = :ime WHERE id = :id_to_edit1");
    $query = $conn->prepare($q);
    $result = $query->execute(array(
      ":id_to_edit1" => $_POST['kurac'],
      ":ime" => $ime, 
      ));
  }
}
if(empty($prezime)){}else{
  if(isset($_POST['prezime'])){


    $q = "UPDATE vlasnik SET prezime = :prezime WHERE id = :id_to_edit1 ;";
    $query = $conn->prepare($q);
    $result = $query->execute(array(

      ":id_to_edit1" => $_POST['kurac'],
      ":prezime" => $prezime, 
      ));
  }
}

if(empty($adresa)){}else{
  if(isset($_POST['adresa'])){


    $q = "UPDATE vlasnik SET adresa = :adresa WHERE id = :id_to_edit1 ;";
    $query = $conn->prepare($q);
    $result = $query->execute(array(

      ":id_to_edit1" => $_POST['kurac'],  
      ":adresa" => $adresa, 
      ));
  }
}


if(isset($_POST['izmeni']))
{
  echo "<meta http-equiv=refresh content=\"0; URL=izmeni_klijenta.php\">";
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