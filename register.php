<?php

require_once("config.php");



if(isset($_POST['register'])){
	
	$filename = $_FILES['file']['name'];
	$dirUpload = "uploaded/";
	$terupload = copy($_FILES['file']['tmp_name'],$dirUpload.$filename);

	

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

	

    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password, photo) 
            VALUES (:name, :username, :email, :password, :photo)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email,
		":photo" => $filename
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Register</title>
	<link rel="stylesheet" href="style/style-base.css"/>
    <link rel="stylesheet" href="style/style-register.css" />
	
</head>
<body>
<div id='bg'></div>
<div>
		<div id='register-label'>Register Page</div>
        <p>&larr; <a href="login.php" style='color : white'>Home</a>

        <font id='join-label'>Join us for destroying the trash</font>
        <font id='account-quest-label'>Have an account ? <a href="login.php" id='login-here'>Plase Login here ..</a></font>
		<div id='char-container'>
			<div id='title-char'><br>Feel the sensation while shoot the trash</div>
			<video id='char' controls autoplay loop muted>
				<source src="source/v1.mp4" type="video/mp4">
			</video>
		</div>
        <form action="" enctype='multipart/form-data' method="POST">
			
			<div id='name-label'>Name</div>
			<div id='username-label'>Username</div>
			<div id='mail-label'>Mail</div>
			<div id='password-label'>Password</div>
			<div id='name-container'><input id='name-field' type="text" name="name" placeholder="your name" /></div>
			<div id='username-container'><input id='username-field' type="text" name="username" placeholder="username" /></div>
			<div id='mail-container'><input id='mail-field' type="email" name="email" placeholder="your e-mail" /></div>
			<div id='password-container'><input id='password-field' type="password" name="password" placeholder="password" /></div>
			<div class="input-container">
				<input type='file' name='file' id="real-input">
				<button class="browse-btn">
					Browse Files
				</button>
				<span class='file-info'>Upload a file</span>
			</div>
			<input type='hidden' name='register' value='Daftar' />
			<div id='register-button' onClick='javascript:document.forms[0].submit();'></div>
        </form>
</div>

<script>

	const uploadButton = document.querySelector('.browse-btn');
	const fileInfo = document.querySelector('.file-info');
	const realInput = document.getElementById('real-input');
	uploadButton.addEventListener('click', () => {
		realInput.click();
	});
	
	realInput.addEventListener('change', () => {
		const name = realInput.value.split(/\\|\//).pop();
		const truncated = name.length > 20 
		? name.substr(name.length - 20) 
		: name;
  
		fileInfo.innerHTML = truncated;
	});

</script>

</body>
</html>