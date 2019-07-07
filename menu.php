<?php 

require_once("auth.php"); 
require_once("config.php");



if(isset($_GET['score'])){
	
	if($_SESSION['radio-1-set'] == 'one'){ $level = 1;}
			else if($_SESSION['radio-1-set'] == 'two'){ $level = 2;}
			else if($_SESSION['radio-1-set'] == 'three'){ $level = 3;}
	
	$score = $_GET['score'];
	$_SESSION['score']['score'] = $score;
	
	$username = $_SESSION['user']['username'];
	$playtime = date('YmdHis');
	
	// menyiapkan query
    $sql = "INSERT INTO score (username, playtime, level, score) 
            VALUES (:username, :playtime, :level, :score)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":playtime" => $playtime,
        ":level" => $level,
		":score" => $score
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    setcookie('score',$score,time()+ (3600));
	setcookie('score',$playtime,time()+ (3600));
	
	
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Main Menu</title>
	<link rel="stylesheet" href="style/style-base.css"/>
	<link rel="stylesheet" href="style/style-menu.css"/>
</head>

<body>
		<div id='bg'></div>
<?php
	if(isset($_GET['please'])){
		echo "<div id='please'>Please click quit to log out first</div>";
	
	}
?>
		
		<div id='sound-icon'></div>
		<div id='music-icon'></div>
		<div id='menu-container'>
			<div id='brick1'></div>
			<div id='brick2'></div>
			<div id='brick3'></div>
			<div id='brick4'></div>
			<div id='menu-label'>Main Menu</div>
			<a href='preset.php'><div id='play-button'></div></a>
			<a href='halof.php'><div id='halof-button'></div></a>
			<div id='setting-button'></div>
			<a href='logout.php'><div id='quit-button'></div></a>
		</div>
		<div id='info-container'>
			<div id='user-label'>username : <?php echo  $_SESSION["user"]["username"] ?></div>
			<div id='score-label'>latest score : <?php echo  $_SESSION["score"]["score"] ?></div>
			<div id='profile-icon'>&#128100</div>
		</div>
		
		<div id='profile-container'>
			<div id='profile-name-label'></div>
			<div id='profile-username-label'></div>
			<div id='profile-email-label'></div>
			<div id='profile-score-label'></div>
			<div id='profile-photo'></div>
		</div>
		
</body>

</html>
