<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "CREATE TABLE Org (
  	id INT NOT NULL IDENTITY(1,1)
	PRIMARY KEY (id),
	Name varchar(30) NOT NULL,
	Schet INT NOT NULL,
)";
    $conn->query($sql);    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
  
  
  
  ?>
