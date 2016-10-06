<?php
	include "authenticate.php";
?>

<html>
	<head>
		<title>Pet Shop!</title>
		
		<link href="../src/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
		
		<link rel="stylesheet" href="../src/css/bootstrap.min.css">
		<link rel="stylesheet" href="../src/css/bootstrap-responsive.min.css">
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="src/css/style.css?<?= time(); ?>">
		<link rel="stylesheet" href="src/css/petshop.css?<?= time(); ?>">
		<script>
			window.LOGIN_ERROR = '<?=$error; ?>';
		</script>
	</head>
	<body>
		<div class="header">
			<div class="navbar navbar-inverse" style="position: static;">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="/">Pet Shop Center</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                    <form class="navbar-search pull-right" action="">
                     	<input type="text" class="search-query span3" placeholder="Search">
                    </form>
                    <ul class="nav pull-right">
						<?php if ( ! isset($_SESSION['name'])) : ?>
                      	<li class="login"><a href="#login">Login</a></li>
						<?php else : ?>
						<li class="login">Bem vindo <span id="username"><?=$_SESSION['name'] ?></span> <a href="exit.php">Sair</a></li>
                      	<?php endif ?>
						<li class="divider-vertical"></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
			<img class="logo" src="../src/images/petshop_logo.png">
			<img class="footstep" src="../src/images/footstep.png">
		</div>
		<div id="center">
			<ul id="sidemenu">
				<li class="home"><a class="spam" href="#home">Home</a></li>
				<li class="about"><a href="#about">Sobre a Loja</a></li>
				<li class="sales"><a href="#sales">Animais à Venda</a></li>
				<li class="services"><a href="#services">Serviços Oferecidos</a></li>
				<li class="contact"><a href="#contact">Entre em Contato</a></li>
				<!--
				<li class="staff"><a href="#staff">Funcionarios - Teste</a></li>
				<li class="clients"><a href="#staff">Clientes - Teste</a></li>
				-->
			</ul>
			<div id="content">
				<div id="home">
				  <h1>Home</h1>
				  <div class="rm_wrapper">
					<div id="rm_container" class="rm_container">
					  <ul>
						<li data-images="rm_container_1" data-rotation="-15"><img src="src/images/1.jpg"/></li>
						<li data-images="rm_container_2" data-rotation="-5"><img src="src/images/2.jpg"/></li>
						<li data-images="rm_container_3" data-rotation="5"><img src="src/images/3.jpg"/></li>
						<li data-images="rm_container_4" data-rotation="15"><img src="src/images/4.jpg"/></li>
					  </ul>
					  <div id="rm_mask_left" class="rm_mask_left"></div>
					  <div id="rm_mask_right" class="rm_mask_right"></div>
					  <div id="rm_corner_left" class="rm_corner_left"></div>
					  <div id="rm_corner_right" class="rm_corner_right"></div>
					  <div style="display:none;">
						<div id="rm_container_1">
						  <img src="src/images/1.jpg"/>
						  <img src="src/images/5.jpg"/>
						  <img src="src/images/6.jpg"/>
						</div>
						<div id="rm_container_2">
						  <img src="src/images/2.jpg"/>
						  <img src="src/images/7.jpg"/>
						  <img src="src/images/8.jpg"/>
						</div>
						<div id="rm_container_3">
						  <img src="src/images/3.jpg"/>
						  <img src="src/images/9.jpg"/>
						  <img src="src/images/10.jpg"/>
						</div>
						<div id="rm_container_4">
						  <img src="src/images/4.jpg"/>
						  <img src="src/images/11.jpg"/>
						  <img src="src/images/12.jpg"/>
						</div>
					  </div>
					</div>
					<div class="rm_nav">
					  <a id="rm_next" href="#" class="rm_next"></a>
					  <a id="rm_prev" href="#" class="rm_prev"></a>
					</div>
					<div class="rm_controls">
					  <a id="rm_play" href="#" class="rm_play">Play</a>
					  <a id="rm_pause" href="#" class="rm_pause">Pause</a>
					</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="footer">
	        <p class="copy">&copy; Pet Shop Center 2013</p>
		</div>
	</body>
	<script type="text/javascript" src="../src/js/jquery-1.10.1.js"></script>
	<script type="text/javascript" src="../src/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript" src="../src/js/jquery.transform-0.9.3.min_.js"></script>
	<script type="text/javascript" src="../src/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="../src/js/jquery.RotateImageMenu.js"></script>
	<script type="text/javascript" src="../src/js/petshop.js?<?= time(); ?>"></script>
	<script>
		$(function () {
			var qs = window.location.search.substr(1);
			if (qs) {
				$.ajax({
					url: "login.html",
					success: function(data) {
						$('#content').html(data);
					}
				});
			}
		});
	</script>
</html>