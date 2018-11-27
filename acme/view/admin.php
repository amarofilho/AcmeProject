<?php
//Testing to see if the visitor is NOT logged in.
if(!$_SESSION['loggedin']){
header('Location:/acme/accounts/?action=login');
} ?>
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
	
		
                    <header>
                        <div class="teste">
                        <a href="/acme/index.php"><img src= " /acme/images/site/logo.gif" alt="logo" width="180" height="80"/></a>
                     

                        <div class="folder">
                            
                            <a href="/acme/accounts/index.php?action=logout">Logout</a>
                            
                            </div>
                        </div>
                    </header>
				
                    <nav class="menu">
                        <?php echo $navListLogin; ?>
                        <p class="user"><?php $_SESSION['clientData'] = $clientData;
                        echo $_SESSION['clientData']['clientFirstname']." ".$_SESSION['clientData']['clientLastname'];?></p>
                        <p class="notice"> You are Logged in.</p>
                        
                    </nav>	

                    <main class="admin">
                        <ul class="userList">
                           
                            <li>First Name:<a> <?php echo $_SESSION['clientData']['clientFirstname'];?></a></li>
                           <li>Last Name:<a> <?php echo $_SESSION['clientData'] ['clientLastname'];?></a></li>
                           <li>Email:<a> <?php echo $_SESSION['clientData'] ['clientEmail'];?></a></li>
                           
                        </ul>
                                                
                        <div class="userLogin">
                            
                            <h1 class="prodManagment"><a href="/acme/accounts/index.php?action=modClient">Update account information </a></h1>
                            <?php
                            
                            if ($_SESSION['clientData'] ['clientLevel'] >2){
                                echo "<h2> Administrative Functions</h2>";
                                echo"<p> Use the Link below to manage products</p>";
                                echo "<h1 class='prodManagment'><a href = '/acme/products/index.php'>Products page</a></h1>"; 
                            } 
                            ?>
                        </div>
                    </main>
                
                    <footer class="footer">
                        <?php include $_SERVER['DOCUMENT_ROOT'] .'/acme/common/footer.php'; ?>
                    </footer>

            </div>
        </div>
    </body>
</html>

