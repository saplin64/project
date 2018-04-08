<html>
      <h3>Оплата</h3>
      Номер Карты  <input type="text" 
name="card" id="name"/></br>
     Пароль  <input type="text" 
name="pas" id="email"/></br>
MONTH/YEAR  <input type="text" 
name="name" id="name"/></br>
Сумма  <input type="text" 
name="sum" id="sum"/></br>
<input type="Submit" 
name="submit" value="Меню" />
    <input type="Submit" 
name="submit2" value="ok" />

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
 	$balance2;
	 $balance;
	
	
	
	$sql_select2 = "Select Balance From Card Where Ncard ='$card'";
 	$k1 = $conn->query($sql_select2);
		$data = $k1->fetchAll();
    foreach($data as $registrant) {
	     $balance = $registrant['Balance'];	
    }

      
     
      
    $sql_select = "SELECT * FROM Card WHERE Ncard ='$card'";
 $stmt = $conn->query($sql_select);
 $reg = $stmt->fetchAll(); 
 
 	if(count($reg) == 0) {
     echo "<h3 style = 'color: red;'>Такой карты не существует</h3>";
     }
 	else
	{
            if($sum<0)
		{
			echo "<h3 style = 'color: red;'>Сумма должна быть больше 0</h3>";
		}
		else{
			if($sum>$balance)
			{
				echo "<h3 style = 'color: red;'>Нет денег на карте</h3>";
			}
			else
			{
                        
                        
                        echo "<h3 style = 'color: green;'>Операция совершина</h3>";
                        
                        
      }
      
   }
}
?>





<html>
