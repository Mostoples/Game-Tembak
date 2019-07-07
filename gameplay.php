
<?php

require_once("config.php");

session_start();



if(isset($_POST['radio-1-set'])){
	$_SESSION['radio-1-set'] = $_POST['radio-1-set'];
	$_SESSION['radio-3-set'] = $_POST['radio-3-set'];
	
} 


			$time = 0;
			if($_SESSION['radio-1-set'] == 'one'){ $level = 1;}
			else if($_SESSION['radio-1-set'] == 'two'){ $level = 2;}
			else if($_SESSION['radio-1-set'] == 'three'){ $level = 3;}

			


function setscore($scorea){
	$score = $scorea;
	
}




if(isset($_GET['score'])){
	
	$score = $_GET['score'];
	$_SESSION['score'] = $score;
	
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
<html>
<head>

	<title>Game On</title>
	
	<link rel="stylesheet" href="style/style-base.css">
	<link rel="stylesheet" href="style/style-gameplay.css">
	<style>
	.boom{
		position : absolute;
		left : 0;
		top : 0;
		width : 8vw;
		height : 10vw;
		background : url(source/weapon/boom.gif);
		background-size : cover;
		visibility : hidden;

	}

	#bggameplay{
		position : absolute;
		left : 0;
		top : 0;
		width : 110%;
		height : 110%;
		<?php
			if ($_SESSION['radio-3-set'] == 'beach'){
				echo "
					background : url(source/bg/alley.jpg);
					
				";
			} else if($_SESSION['radio-3-set'] == 'market'){
				echo "
					background : url(source/bg/2.gif);
					
				";
			} else if($_SESSION['radio-3-set'] == 'street'){
				echo "
					background : url(source/bg/bg3.png);
					
				";
				
			} 
			
			
		?>
		background-size : cover;
		background-repeat : no-repeat;
		animation-name : wiggle;
		animation-duration : 5s;
		animation-iteration-count : infinite;
		animation-timing-function : ease-in-out;
	}

	@keyframes wiggle{
		0%{left : 0; top : 0;}
		25%{left : -2%; top : -2%}
		50%{left : 0%; top : -2%}
		75%{left : 0%; top : 0%}
		100%{left : 0%; top : 0%}
	}
	</style>
</head>

<body unselectable="on" onclick='createaudi()' onload='<?php echo "setime($level)";?>' style='overflow : hidden'>
	
	<div id='bggameplay'></div>
	<div id='over-screen'>
		<div id='gameover-label2'>Game Over</div>
		<a id='link-restart' href=''><div id='playagain-button'></div></a>
		<div id='yourscore-label'>Score : 0</div>
		<div id='username-label'><?php echo $_SESSION['user']['username']?></div>
		<a id='link-preset' href=''><div id='back-preset-button'></div></a>
		<a id='link-menu' href=''><div id='quit-button'></div></a>
	</div>
	<div id='audioarea'>
		<?php 
		for($i=1; $i < 20; $i++){
		echo '<audio control autoplay class="sfxweapon" muted id="sfxw'; echo $i; echo '"><source src="source/sfx/colt.mp3"></source></audio>';
		}
		?>
	</div>
	<div id='audiboom'>
		<?php 
		for($i=1; $i < 10; $i++){
		echo '<audio control autoplay class="sfxweapon" muted id="boomsfx'; echo $i; echo '"><source src="source/sfx/boom.mp3"></source></audio>';
		}
		?>
	</div>

	<div id='playerarea'>
		<div id='gunfire' class='gunplay' style='background : url(source/weapon/fire.gif); background-size : cover'></div>
	</div>
	
	<div id='musicarea'>
		<div id='voicearea'>
			<audio controls id='go-voice' >
				<source src='source/sfx/go.mp3'></source>
			</audio>
			<audio controls id='ready-voice'>
				<source src='source/sfx/ready.mp3'></source>
			</audio>
		</div>
		<audio controls id='gameover'>
			<source src='source/sfx/gameover.mp3'></source>
		</audio>
		<audio controls id='siren' loop>
			<source src='source/sfx/megasiren.mp3'></source>
		</audio>
		<audio controls id='contsfx' autoplay loop volume="0.1">
		<?php	
	
			echo "<source src="; 
				if ($_SESSION['radio-3-set'] == 'beach'){
					echo "'source/sfx/beach.mp3'"; 
				} else if ($_SESSION['radio-3-set'] == 'market'){
					echo "'source/sfx/market.mp3'"; 
				} else if ($_SESSION['radio-3-set'] == 'street'){
					echo "'source/sfx/street.mp3'"; 
				}
				echo"type='audio/mpeg' id='sourcesfx'>"; 
		?>
		</audio>
		<audio controls id='m1' loop>
			<source src='source/sfx/m1.mp3'></source>
		</audio>
		<audio controls id='m2' loop>
			<source src='source/sfx/m2.mp3'></source>
		</audio>
		<audio controls id='m3' loop>
			<source src='source/sfx/m3.mp3'></source>
		</audio>
		<audio controls id='m4' loop>
			<source src='source/sfx/m4.mp3'></source>
		</audio>
	</div>

	<div id='ready-label'>Ready</div>
	<div id='gameover-label'>Game Over</div>
	<div id='go-label'>Shoot!</div>
	
	<?php
	echo "<div id='level-label-gameplay'>Level : "; echo $_SESSION['radio-1-set']; echo "</div>";
	echo "<div id='score-label-gameplay'> 0 : Score";  echo"</div>";
	
	
	echo "<div id='username-label-gameplay'>Username : "; echo $_SESSION["user"]["username"]; echo"</div>";
	
	echo "<div unselectable='on'  onselectstart='return false;' onmousedown='return false;' id='time-label-gameplay'> : Time</div>";
	?>
	
	<div id='game-screen'>
		<div style='background:url(source/trash/btl.png); width : 1vw; height : 1vw; '  id='trash1'></div>
	</div>

	<div id='boomarea'>
		<?php 
		for($i=1; $i < 11; $i++){
		echo '<div id="boom'; echo $i; echo '" class="boom"></div>';
		}
		?>
	</div>

	<div id='cleanarea'>
		<?php 
		for($i=1; $i < 11; $i++){
		echo '<div id="clean'; echo $i; echo '" class="clean"></div>';
		}
		?>>
	</div>
	
	<script src="js/javascript.js">
		
		
	</script>
</body>
</html>