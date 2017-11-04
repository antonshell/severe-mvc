<html lang="en"><head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta content="" name="description">
	<meta content="" name="author">

	<title>Starter Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?=$cssPath?>bootstrap.min.css">

	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="<?=$cssPath?>starter-template.css">

	<script src="<?php echo $jsPath?>jquery.min.js"></script>
	<script src="<?php echo $jsPath?>bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo $libPath?>loading-indicator/ajaxloader.css">

	<script src="<?php echo $libPath?>loading-indicator/jquery.ajaxloader.1.5.0.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?= BASE_URL ?>" class="navbar-brand">Severe MVC</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">

				<?php
				//$menu = Config::$topMenu;
				$menu = ConfigManager::get(array('topMenu'));

				foreach($menu as $button){
					echo '<li><a href="'.$button['url'].'">'.$button['name'].'</a></li>';
				}
				?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container">

	<div class="starter-template">

		<?php require_once($contentViewPath); ?>

		<!--<h1>Bootstrap starter template</h1>
		<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
		-->
	</div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<div class="loader"></div>

</body></html>