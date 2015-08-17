<!DOCTYPE html>

<!--
--	AES Encryption
--	Masood Sadri
-->
<?php

	if (isset($_POST['encrypt'])) {
		$crypted = '<textarea name="text" id="text" class="form-control enfont">';
		$crypted .= Encrypt($_POST['text'], $_POST['key']);
		$crypted .= '</textarea>';
	}
	else if (isset($_POST['decrypt'])) {
		$decrypted = '<textarea name="text" id="text" class="form-control enfont">';
		$decrypted .= Decrypt($_POST['text'], $_POST['key']);
		$decrypted .= '</textarea>';
	}	

	function Encrypt($Text, $Key) {
		return rtrim(
			base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $Key, $Text, MCRYPT_MODE_ECB, mcrypt_create_iv(
				mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))
			), "\0"
		);
	}

	function Decrypt($Text, $Key) {
		return rtrim(
			mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $Key, base64_decode($Text), MCRYPT_MODE_ECB, mcrypt_create_iv(
				mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND
			)),	"\0"
		);
	}
?>

<html>

    <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible"	content="IE=edge" />
		<meta name="viewport"	content="width=device-width, initial-scale=1" />
        <meta name="keywords" content="AES, Encryption, Rijndael"/>
		<meta name="description" content=""/>
        <meta name="author" content="Masood Sadri">
        <title>AES Encryption Service</title>
		<link href='http://fonts.googleapis.com/css?family=Lato:300&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="./css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
        <link rel="icon" type="image/ico" href="./images/favicon.png"/>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
	
    <body>
        <header>
            <div class="container top-menu-holder">
				<div class="col-md-3 col-sm-3 col-xs-8 logo">
					<h1>AES Encryption</h1>
				</div>
            </div>
        </header>
		<div class="animated fadeIn">
			<section id="home">
				<div class="container text">
					<div class="title">
						<p>Insert the text that you want to Encrypt or Decrypt</p>
					</div>
					<div class="first-description">
						<p>Encrypt and decrypt text with AES algorithm</p>
					</div>
					<form onsubmit="return validate();" class="form-horizontal" id="" method="post" action="">
						<div class="form-group">
							<textarea name="text" id="text" class="form-control enfont" rows="5" placeholder="Plain or encrypted text"></textarea>
						</div>
						<div class="form-group">
						<input name="key" type="password" class="form-control enfont" id="key" placeholder="Key of encryption"/>
						</div>
						<div class="form-group buttons">
							<button type="submit" class="btn btn-default" name="encrypt" value="encrypt">Encrypt</button>
							<button type="submit" class="btn btn-default" name="decrypt" value="decrypt">Decrypt</button>
						</div>
					</form>
					<div class="result enfont">
						<?php echo @$crypted; echo @$decrypted ?>
					</div>
					<div id="alert" class="error">
						<div class="alert alert-danger" role="alert">
							Please enter the fields.
						</div>
					</div>
				</div>
			</section>
		</div>
		<div class="container footer">
			<p>
				Made from <span class="glyphicon glyphicon-music"></span> by 
				<a href="http://MasoodSadri.com" target="_blank">Masood Sadri</a>.
			</p>
		</div>

        <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/main.js"></script>
    </body>

</html>