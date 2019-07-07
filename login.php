<?php 

require_once("config.php");

session_start();

if(isset($_COOKIE['username'])){
	header("Location: menu.php?please=1");
}

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
	
	$sql2 = "SELECT * FROM score WHERE username=:username";
    $stmt2 = $db->prepare($sql2);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );
	
	$params2 = array(
        ":username" => $username
    );

    $stmt->execute($params);
	$stmt2->execute($params2);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
	$user2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            
            $_SESSION["user"] = $user;
			$_SESSION["score"] = $user2;
            // login sukses, alihkan ke halaman timeline
			setcookie('username',$_SESSION['user']['username'],time()+ (3600));
            header("Location: menu.php");
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	<link rel="stylesheet" href="style/style-base.css"/>
    <link rel="stylesheet" href="style/style-login.css"/>
</head>
<body>
		<div id='bg'></div>
		<a href='register.php'><div id='register-label'>Never register ? Register here..</div></a>
		<div id='login-title-label'>Login Page</div>
        <font id='home-label'>Home</font>
        <a href="register.php"><font id='register-label'>Daftar di sini</font></a>
        <form action="" method="POST">
			<input type='hidden' name='login' value='1'/>
			<font id='username-label'>Username</font>
            <div id='username-container'><input type="text" name="username" placeholder="Username atau email" /></div>
            <font id='password-label'>Password</font>
            <div id='password-container'><input type="password" name="password" placeholder="Password"/></div>
			<div id='login-button' onClick="javascript:document.forms[0].submit();"></div>
        </form>
</body>
</html>