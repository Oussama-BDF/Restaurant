<?php 
	include __DIR__ ."/../../env.php";
	include __DIR__ . $exitAuth . $layout . "head.php";
	include __DIR__ . $exitAuth . $user . "authFunctions.php";
?>

	<!-- Import any file css here -->
	<link rel="stylesheet" type="text/css" href="<?php echo $css;?>authStyle.css?v=1.1.0">
</head>
<body>
	<div class="main">
		<div class="container">
			<form class="form" action="<?php $errorMsgs = signIn();?>" method="post">
				<h2 class="title"><?php echo $siteTexts["signin"]["title"]; ?></h2>

				<label class="authLbl">
					<?php echo $siteTexts["signin"]["form"]["email"]["libelle"];?>
				</label>
				<input class="authInpt email" type="text" name="email" 
					placeholder="<?php echo $siteTexts["signin"]["form"]["email"]["placeholder"];?>" 
					value="<?php echo isset($_POST['email'])? $_POST['email'] : "";?>">
				<?php  echo displayErrMsg($errorMsgs, "email"); ?><br>

				<label class="authLbl">
					<?php echo $siteTexts["signin"]["form"]["password"]["libelle"];?>
				</label>
				<input class="authInpt password" type="password" name="password" 
					placeholder="<?php echo $siteTexts["signin"]["form"]["password"]["placeholder"];?>">
				<?php  echo displayErrMsg($errorMsgs, "password"); ?><br>

				<button class="authBtn" type="submit">
					<?php echo $siteTexts["signin"]["form"]["submit"];?>
				</button>
				<a href="signup.php" class="authAnchr">
					<?php echo $siteTexts["signin"]["form"]["anchor"];?>
				</a>
			</form>
		</div>
	</div>

<!-- Import any file js here -->
<script>
	function focusInput() {
		var inputElement = document.getElementById("em");
		inputElement.focus();
	}
</script>

</body>
</html>