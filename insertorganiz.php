<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql_in = 
"INSERT INTO Org (Name, Schet) 
                   VALUES (?,?)";
    $stmt = $conn->prepare($sql_in);
    $stmt->bindValue(1, "Phenix1");
    $stmt->bindValue(2, 1000);
    $stmt->execute();
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
  
  
  
  ?>
