<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Сверка итогов</title>
  </head>
  <body>
    <div class="container-2">
        <legend>Сверка итогов</legend><hr>
        <div class="input-box">
            <label for="name" style="font-size: 1.4em;">Номер карты</label><br>
          <input type="text" name="card" id="card">
          <label for="name" style="font-size: 1.4em;">Период</label><br>
          <input type="text" name="name" id="name">
        </div>
          <input type="submit" name="submit1" value="Меню">
          <input type="submit" name="submit2" value="ОК">
    </div>
  </body>
  
  
  <?php
  

  
  
  
  
  
  
	 		if(isset($_POST["submit2"])){
        
      $card = $_POST['card'];
				
				$sql_select5 = "SELECT * FROM Operat Where Ncard = '$card'";
$stmt = $conn->query($sql_select5);
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) {
    echo "<h2>Выписка операций</h2>";
    echo "<table>";
    echo "<tr><th style ='color: white;'><h3>Ncard</h3></th>";
    echo "<th style = ' padding: 20px; color: white;'><h3>Sum</h3></th>";
    echo "<th style = ' padding: 20px; color: white; '><h3>Date</h3></th></tr>";
    foreach($registrants as $registrant) {
        echo "<tr><td><h5>".$registrant['Ncard']."</h5></td>";
        echo "<td><h5 style = 'text-align: center;'>".$registrant['Sum']."</h3></td>";
        echo "<td><h5 style = 'text-align: center;'>".$registrant['date']."</h3></td></tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No one is currently registered.</h3>";
}								
}
  if(isset($_POST["submit1"])){
     header('location: index.php');

  }
  
  
  
  
  
  ?>
</html>
