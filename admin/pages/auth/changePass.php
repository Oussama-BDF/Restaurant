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
			<form class="form" action="<?php $errorMsgs = changePass();?>" method="post">
				<h2 class="title"><?php echo $siteTexts["changePass"]["title"]; ?></h2>
				
				<?php if (isset($_GET['success'])) { ?>
					<p class="success"><?php echo $_GET['success']; ?></p>
				<?php } ?>

				<label class="authLbl">
					<?php echo $siteTexts["changePass"]["form"]["op"]["libelle"];?>
				</label>
				<input class="authInpt op" type="password" name="op" 
					placeholder="<?php echo $siteTexts["changePass"]["form"]["op"]["placeholder"];?>">
				<?php echo displayErrMsg($errorMsgs, "op"); ?><br>

				<label class="authLbl">
					<?php echo $siteTexts["changePass"]["form"]["np"]["libelle"];?>
				</label>
				<input class="authInpt np" type="password" name="np" 
					placeholder="<?php echo $siteTexts["changePass"]["form"]["np"]["placeholder"];?>">
				<?php echo displayErrMsg($errorMsgs, "np"); ?><br>

				<label class="authLbl">
					<?php echo $siteTexts["changePass"]["form"]["c_np"]["libelle"];?>
				</label>
				<input class="authInpt c_np" type="password" name="c_np" 
					placeholder="<?php echo $siteTexts["changePass"]["form"]["c_np"]["placeholder"];?>">
				<?php echo displayErrMsg($errorMsgs, "c_np"); ?><br>

				<button class="authBtn" type="submit">
					<?php echo $siteTexts["changePass"]["form"]["submit"];?>
				</button>
				<a href="home.php" class="authAnchr">
					<?php echo $siteTexts["changePass"]["form"]["anchor"];?>
				</a>
			</form>
		</div>
	</div>
</body>

	<!-- Import any file js here -->

</html>