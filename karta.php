<html>
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Информация о организации</title>
  </head>
 <body>
  <div class="container">
  <h3>Информация о организации</h3>
 <hr>
<div>Организация: Суши-бар ФЕНИКС</div>
<div>Счет организации:  <?php
 $S;
 
 $sql_select4 = "Select Schet From Org Where Name ='Phenix'";
 	$k4 = $conn->query($sql_select4);
		$data = $k4->fetchAll();
    foreach($data as $registrant) {
	     $S = $registrant['Schet'];	
    }
 echo $S;

?>
  </div>
</html>

<?php
try {
   $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    }
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>

