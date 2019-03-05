<?php
$mysqli = new mysqli("localhost", "root", "nidia", "personas");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * from persona ";
$result = $mysqli->query($query);

while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
echo $row['id_persona'].$row['nombre'];
}

/* free result set */
$result->close();  

/* close connection */
$mysqli->close();
?>


