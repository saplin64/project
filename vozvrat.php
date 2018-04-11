<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Возврат</title>
  </head>
  <body>
    <div class="container-2">
        <legend>Возврат</legend><hr>
        <div class="input-box">
          <label for="name"><p style="width: 150px;">Введите сумму(руб)</p></label>
          <input type="text" name="sum" id="name">
          <label for="name12"><p style="width: 150px;">Введите номер карты</p></label>
          <input type="text" name="card" id="name12">
        </div>
        <div class="submit-box">
          <input type="submit" name="submit1" value="Меню">
          <input type="submit" name="submit2" value="ОК">
        </div>
    </div>
  </body>
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
  
  
  
  
  
	 		if(isset($_POST["submit2"])){
        
        $sum = $_POST['sum'];
 	$card = $_POST['card'];
        $sum2;
        $balance;
        
        $sql_select2 = "Select Sum From Operat Where Ncard ='$card'";
 	$k1 = $conn->query($sql_select2);
		$data = $k1->fetchAll();
    foreach($data as $registrant) {
	     $sum2 = $registrant['Sum'];	
    }
        
        $sql_select2 = "Select Balance From Card Where Ncard ='$card'";
 	$k1 = $conn->query($sql_select2);
		$data = $k1->fetchAll();
    foreach($data as $registrant) {
	     $balance = $registrant['Balance'];	
    }
	
	    if($sum!=$sum2)
      {
        echo"<h3>Операции на данную сумму не найдено</h3>"
      }
        else{
          
          $balance1 = $balance + $sum;
		$sql1 = "Update Card Set Balance = '$balance1' Where Ncard = '$card'";
 		$stmt = $conn->prepare($sql1);
     		$stmt->execute();
				
				
				$sql2 = 
"INSERT INTO Operat (Ncard,Sum,date) 
                   VALUES (?,?,?)";
    $stmt = $conn->prepare($sql2);
    $stmt->bindValue(1,$card);
    $stmt->bindValue(2, "+".$sum);
	 $stmt->bindValue(3, $date);
    $stmt->execute();
				
          echo"<h3 style = 'color:green'>Сумма успешно возвращена</h3>"
          
        }
     
}
	
	
  if(isset($_POST["submit1"])){
     header('location: index.php');
  }
  
  
  
  
  
  ?>
