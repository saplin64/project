<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="CREATE TABLE Kart (
NKart INT NOT NULL,
PRIMARY KEY (NKart),
Password INT NOT NULL,
Balance INT NOT NULL,
Year INT NOT NULL,
Month INT NOT NULL
)";
    $conn->quary($sql);
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

  
  
  
  ?>
