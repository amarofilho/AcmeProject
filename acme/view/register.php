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
                    <h1> Acme Registration </h1>
                    <h2>All fields are required</h2>

                </nav>	
                
		<main class="textBox">
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>		
                    <form action="/acme/accounts/index.php" method="post"> 

                     <p>First Name</p>
                    <input type="text" name="clientFirstname" id="clientFirstname" <?php
                    if (isset($clientFirstname)){
                        echo"value='$clientFirstname'";
                    }
                    ?>required> 

                    <p>Last Name</p>
                    <input type="text" name="clientLastname" id="clientLastname" <?php
                    if (isset($clientLastname)){
                        echo"value='$clientLastname'";
                    }
                    ?>required>     

                     <p>Email address</p>
                     <input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid Email address" <?php
                            if (isset($clientEmail)){
                        echo"value='$clientEmail'";
                            }?>>
                     <p>Password:</p>
                     <label for="clientPassword"></label>
                     <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

                     <span>Passwords must be at least 8 characters and contain at least 1 number, 1 
                        capital letter and 1 special character</span> 
                     <br>
                     <label><input type="submit" value="Register" name="botao" /></label>
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="registration"></form> 
                </main>
                        
				
                <footer class="footer">
                    <?php include '../common/footer.php'; ?>

                </footer>

            </div>
        </div>
    </body>
</html>

