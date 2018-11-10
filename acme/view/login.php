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
                    if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    }
                    ?>
      
                    <form method="post" action="/acme/accounts/">
                                        
                    <p>Email address</p>
                    <input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid Email address" <?php
                        if (isset($clientEmail)){
                        echo"value='$clientEmail'";}?>>

                    <p>Password:</p>
                    <label  for="clientPassword"></label>
                    <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <br>
                    <span class="password">Passwords must be at least 8 characters and contain at least 1 number, 1 
                                    capital letter and 1 special character!</span> 
                                 
                                 
                    <div class="gap2">
                    <input type="submit" name="login"value="Login">
                    <input type="hidden" name="action"value="Login2">
                    </div>
                    </form>
                    <p>Not a member?</p>
                    
                    <div class="gap2">
                    <a href="/acme/accounts/index.php?action=register"
                    class="login">
                    Create an Account
                    </a>
                    </div>
                </main>
                        	
		<footer class="footer">
                    <?php include '../common/footer.php'; ?>
		</footer>

            </div>
	</div>
    </body>
</html>

