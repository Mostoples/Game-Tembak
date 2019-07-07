<?php
	session_start();
	require_once("config.php");
	
	
	if(isset($_GET['score'])){
		
	if($_SESSION['radio-1-set'] == 'one'){ $level = 1;}
	else if($_SESSION['radio-1-set'] == 'two'){ $level = 2;}
	else if($_SESSION['radio-1-set'] == 'three'){ $level = 3;}
	
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
	<title></title>
	<link rel="stylesheet" href="style/style-conf.css">
	<link rel="stylesheet" href="style/style-base.css">
	<title>Select Level</title>
	
</head>

<body>

	<a href='menu.php'><div id='back-button'></div></a>
	
<form method='POST' action='gameplay.php'>
	<div id='box-preset-wrapper'>
		<div id='bgbox'></div>
		<div id='level-wrap'>
			<div id='level-image'></div>
			<font id='level-label'>Level</font>
			<div id="button-holder-level">
				<font id='level-one' class='level-num'>One</font>
				<font id='level-two' class='level-num'>Two</font>
				<font id='level-three' class='level-num'>Three</font>
				<div id='rad-level-1'><input type="radio" checked="" class="regular-radio" name="radio-1-set" id="radio-1-set" onclick='changeBG(1,1)' value='one'><label for="radio-1-set"></label></div>
				<div id='rad-level-2'><input type="radio" checked="" class="regular-radio" name="radio-1-set" id="radio-2-set" onclick='changeBG(1,2)' value='two'><label for="radio-2-set"></label></div>
				<div id='rad-level-3'><input type="radio" checked="" class="regular-radio" name="radio-1-set" id="radio-3-set" onclick='changeBG(1,3)' value='three'><label for="radio-3-set"></label></div>
			</div>
		</div>
		
		
		<div id='weapon-wrap'>
			<div id='weapon-image'></div>
			<font id='weapon-label'>Weapon</font>
			<div id="button-holder-weapon">
				<font id='weapon-one' class='weapon-opt'>Catapult</font>
				<font id='weapon-two' class='weapon-opt'>Gun</font>
				<font id='weapon-three' class='weapon-opt'>Arrow</font>
				<div id='rad-weapon-1'><input type="radio" checked="" class="regular-radio" name="radio-2-set" id="radio-4-set" onclick='changeBG(2,1)' value='catapult'><label for="radio-4-set"></label></div>
				<div id='rad-weapon-2'><input type="radio" checked="" class="regular-radio" name="radio-2-set" id="radio-5-set" onclick='changeBG(2,2)' value='gun'><label for="radio-5-set"></label></div>
				<div id='rad-weapon-3'><input type="radio" checked="" class="regular-radio" name="radio-2-set" id="radio-6-set" onclick='changeBG(2,3)' value='arrow'><label for="radio-6-set"></label></div>
			</div>
		</div>
		
		
		
		<div id='place-wrap'>
			<div id='place-image'></div>
			<font id='place-label'>Place</font>
			<div id="button-holder-place">
				<font id='place-one' class='place-opt'>Street</font>
				<font id='place-two' class='place-opt'>Alley</font>
				<font id='place-three' class='place-opt'>Street2</font>
				<div id='rad-place-1'><input type="radio" checked="" class="regular-radio" name="radio-3-set" id="radio-7-set" onclick='changeBG(3,1)' value='street'><label for="radio-7-set"></label></div>
				<div id='rad-place-2'><input type="radio" checked="" class="regular-radio" name="radio-3-set" id="radio-8-set" onclick='changeBG(3,2)' value='beach'><label for="radio-8-set"></label></div>
				<div id='rad-place-3'><input type="radio" checked="" class="regular-radio" name="radio-3-set" id="radio-9-set" onclick='changeBG(3,3)' value='market'><label for="radio-9-set"></label></div>
			</div>
		</div>
		
		<div id='image-wrap'>
			<div id='selected-place'></div>
		</div>
		
		
		<div id='play-button' onClick="javascript:document.forms[0].submit();"></div>
		
		
	</div>
	
	</form>
	<script src="js/javascript.js"></script>
</body>
</html>