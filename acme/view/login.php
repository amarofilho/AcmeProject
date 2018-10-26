<!DOCTYPE HTML>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>ACME</title>
		<meta name="author" content="Amaro Filho">
		<meta name="viewport" content="width=device-width">
		<link href='../css/estilo.css' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<div class="content">
		
		    <div class="main-page">
	
		
				<header class="page-header">
				
						<?php include '../common/page-header.php'; ?>
					
				</header>
				
									
				<nav class="menu">
						<?php echo $navListLogin; ?>
                                    <h1>Acme Login</h1>
                                </nav>	
						

				<main class="textBox">
                                    <?php
                                    if (isset($message)) {
                                     echo $message;
                                    }
                                    ?>
                                    <form action="/acme/accounts/index.php" method="post"></form>
                                        
                                    <p>Email address</p>
                                    <input type="text" name="Nome" size="30" />
                                    <p>Password</p>
                                    <p>Must be at least 8 characters and contain at least 1 number, 1 captal letter ans 1 special character</p>

                                    <input type="text" name="Nome" size="20" /> 
                                    <ul><input type="submit" value="Login" name="login" /></ul>

                                    <ul> <h1>Not a member?</h1></ul>
                                    <ul><a href="/acme/accounts/index.php?action=register"><input type="submit" value="Create an account" name="botao" </a></ul>
				</main>
                        
				
				<footer class="page-footer">
							<?php include '../common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>

