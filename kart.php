<?php
  try {
    $conn = new PDO("sqlsrv:server = tcp:saplin.database.windows.net,1433; Database = БазаSQL", "saplin64", "Amerika1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "CREATE TABLE Card (
  	id INT NOT NULL IDENTITY(1,1)
	PRIMARY KEY (Ncard),
	Ncard varchar(30) NOT NULL,
	Balance INT NOT NULL,
  Year INT NOT NULL,
 Month INT NOT NULL,
	Password varchar(30) NOT NULL
	
)";
    $conn->query($sql);    
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

  
  
  
  ?>
