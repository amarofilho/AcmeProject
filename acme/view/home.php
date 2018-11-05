<!DOCTYPE HTML>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ACME</title>
		<meta name="author" content="Amaro Filho">
                <meta name="viewport" content="width=device-width">
		<link href='/acme/css/estilo.css' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<div class="content">
		
		    <div class="main-page">
	
		
				<header class="page-header">
				
						<?php include 'common/page-header.php'; ?>
					
				</header>
				
					
					
				<nav class="menu">
						<?php echo $navList; ?>
				</nav>	
						
					
				
						
				<div class="page-nav">
						<?php include 'common/nav.php'; ?>
				</div>
				
			
				<main class="main">
				
						  <?php include 'common/main.php'; ?>
				</main>
				
				<footer class="footer">
						<?php include 'common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>