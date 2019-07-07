<?php

require_once("config.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Register</title>
	<link rel="stylesheet" href="style/style-base.css"/>
    <link rel="stylesheet" href="style/style-halof.css" />
	
</head>
<body>
<div id='bg'></div>
<div id='halof-title'>Hall of Fame</div>
<div id='container'>
<?php  
$link = mysqli_connect("localhost", "root", "", "trash-shooter"); 
  
if ($link == false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
} 
  
$sql = "SELECT * FROM score"; 
if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>Username</th>"; 
        echo "<th>Playtime</th>"; 
        echo "<th>Level</th>"; 
		echo "<th>Score</th>"; 
        echo "</tr>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['username']."</td>"; 
            echo "<td>".$row['playtime']."</td>"; 
            echo "<td>".$row['level']."</td>"; 
			echo "<td>".$row['score']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
       
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($link); 
} 
mysqli_close($link); 
?> 
</div>
</body>
</html>