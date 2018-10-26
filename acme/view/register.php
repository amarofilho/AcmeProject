<!DOCTYPE HTML>
<html>

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
                                    <ul> <h1>Acme Registration</h1></ul>
                                     <h2>All fields are required</h2>
                                   
				</nav>	

				
						
				
			
				<main class="textBox">
                                    <?php
                                    if (isset($message)) {
                                    echo $message;
                                    }
                                    ?>		
                                    <form method="post" action="/acme/accounts/index.php"> 
                                        
                                 <p>First Name</p>
				<input type="text" name="clientFirstname" size="20" />
                                 <p>Last Name</p>
				<input type="text" name="clientLastname" size="20" />
				 <p>Email address</p>
				<input type="email" name="clientEmail" size="30" />
                                 <p>Password</p>
                                <p>Must be at least 8 characters and contain at least 1 number, 1 captal letter ans 1 special character</p>
                                <input type="password" name="clientPassword" size="20" /> 
                                
                                <ul><input type="submit" value="Register" name="botao" /></ul>
                                <!-- Add the action name - value pair -->
                                <input type="hidden" name="action" value="registration"></form> 
				</main>
                        
				
				<footer class="page-footer">
							<?php include '../common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>

