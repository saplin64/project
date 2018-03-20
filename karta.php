<html>
 <h3>Добавить карту</h3>
Номер Карты  <input type="text" 
name="nomerkart" id="name"/></br>
     Пароль  <input type="text" 
name="pass" id="email"/></br>
 Month  <input type="text" 
name="motch" id="email"/></br>
 Year  <input type="text" 
name="year" id="email"/></br>
Баланс (руб:)  <input type="text" 
name="balanc" id="email"/></br>
<input type="Submit" 
name="submit1" value="Меню" />
    <input type="Submit" 
name="submit" value="Добавить" />
</html>

<?php
if(!empty($_POST)) {
try {
$karta = $_POST['nomerkart'];
$pass = $_POST['pass'];
$motch = $_POST['motch'];
$year = $_POST['year'];
$balanc = $_POST['balanc'];
// Insert data
$sql_insert =
"INSERT INTO registration_tbl (№Kart, Password, Balance, Year, Month)
VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $karta);
$stmt->bindValue(2, $pass);
$stmt->bindValue(3, $balanc);
$stmt->bindValue(4, $year);
$stmt->bindValue(5, $motch);
$stmt->execute();
}
catch(Exception $e) {
die(var_dump($e));
}
echo "<h3>Your're registered!</h3>";
}

$sql_select = "SELECT * FROM Kart";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>People who are registered:</h2>";
echo "<table>";
echo "<tr><th>№Kart</th>";
echo "<th>Password</th>";
echo "<th>Month</th>";
echo "<th>Year</th>";
echo "<th>Balance</th></tr>";
foreach($registrants as $registrant) {
echo "<tr><td>".$registrant['№Kart']."</td>";
echo "<td>".$registrant['Password']."</td>";
echo "<td>".$registrant['Month']."</td>";
echo "<td>".$registrant['Year']."</td>";
echo "<td>".$registrant['Balance']."</td></tr>";
}
echo "</table>";
} else {
echo "<h3>No one is currently registered.</h3>";
}
?>

