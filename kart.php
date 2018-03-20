<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="CREATE TABLE `Kart` (
    PRIMARY KEY (`№Kart`)
`№Kart` int(16) NOT NULL,
`Password` int(4) NOT NULL,
`MONTH/YEAR` DATE NOT NULL,
`Balance` int(5) NOT NULL,
)";
    
    $conn->quary(sql);
    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

  
  
  
  ?>
