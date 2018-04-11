<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Оплата</title>
  </head>
  <body>
    <div class="container-2">
      <form action = "oplata.php" method = "post">
        <legend>Оплата</legend><hr>
        <div class="input-box">
          <label for="card">Номер Карты</label>
          <input type="text" name="card" id="name"><br>
          <label for="pas">Пароль</label>
          <input type="text" name="pas" id="email"><br>
          <label for="name">MONTH</label>
          <input type="text" name="month" id="name"><br>
	<label for="name">YEAR</label>
          <input type="text" name="year" id="name"><br>
          <label for="sum">Сумма</label>
          <input type="text" name="sum" id="sum"><br>
        </div>
        <div class="submit-box">
          <input type="submit" name="submit1" value="Меню">
          <input type="submit" name="submit2" value="ОК" >
        </div>
      </form>
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




if(isset($_POST["submit2"])) {
      
 	$sum = $_POST['sum'];
 	$card = $_POST['card'];
	$date = date("Y-m-d H:i:s");
	 $balance;
	$y = $_POST['year'];
	$m = $_POST['month'];
	$pas= $_POST['pas'];
	$Pas;
	$Year;
	$Month;
	
	
	
	$sql_select2 = "Select Balance From Card Where Ncard ='$card'";
 	$k1 = $conn->query($sql_select2);
		$data = $k1->fetchAll();
    foreach($data as $registrant) {
	     $balance = $registrant['Balance'];	
    }
	

	$sql_select3 = "Select Year From Card Where Ncard ='$card'";
 	$k2 = $conn->query($sql_select3);
		$data = $k2->fetchAll();
    foreach($data as $registrant) {
	     $Year = $registrant['Year'];	
    }
	
	
	
	$sql_select4 = "Select Balance From Card Where Ncard ='$card'";
 	$k4 = $conn->query($sql_select4);
		$data = $k4->fetchAll();
    foreach($data as $registrant) {
	     $Month = $registrant['Month'];	
    }
	$sql_select5 = "Select Password From Card Where Ncard ='$card'";
 	$k5 = $conn->query($sql_select5);
		$data = $k5->fetchAll();
    foreach($data as $registrant) {
	    $Pas = $registrant['Password'];	
    }
      
	
	
     
      
    $sql_select = "SELECT * FROM Card WHERE Ncard ='$card'";
 $stmt = $conn->query($sql_select);
 $reg = $stmt->fetchAll(); 
 
 	if(count($reg) == 0) {
     echo "<h3 style = 'color: red;'>Такой карты не существует</h3>";
     }

	else{
	
	if($sum<1){
		
	 echo "<h3 style = 'color: red;'>Сумма должно быть больше 0</h3>";
	}
	else
	{
		if($sum>$balance)
		{
			 echo "<h3 style = 'color: red;'>Сумма превышает баланс на аккаунте</h3>";
		}
		else
		{
			
			if($y!=$Year || $m!=$Month || $pas!=$Pas)
			{
				 echo "<h3 style = 'color: red;'>Введены не корректные данные</h3>";
			}
			else
			{
				 echo "<h3 style = 'color: green;'>Операция выполнена</h3>";
				
			}
			
			
		}
		

	
		

	}
		
}
}


if(isset($_POST["submit1"])) {

}
?>

