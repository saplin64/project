<?php
try {
   $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	for($i = 1;$i<=5;$i++)
	{
$sql_in = 
"INSERT INTO Card (Ncard, Balance,Password,Year,Month) 
                   VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql_in);
    $stmt->bindValue(1, "527333745678910".$i);
    $stmt->bindValue(2, 10000);
	  $stmt->bindValue(3, "111".$i);
     $stmt->bindValue(4, "202".$i);
	  $stmt->bindValue(5,$i);
    $stmt->execute();
	}
    }
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
?>
