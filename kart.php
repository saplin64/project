<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="CREATE TABLE Kart (
NKart int NOT NULL,
PRIMARY KEY (NKart),
Password int NOT NULL,
Balance int NOT NULL,
Year int NOT NULL,
Month int NOT NULL
)";
    $conn->quary(sql);
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

  
  
  
  ?>
