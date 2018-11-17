<?php
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>

<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8">
        <title><?php if(isset($clientInfo['clientId'])){
            echo "Modify $clientInfo[clientId] ";}
            elseif(isset($clientId)) { echo $clientId; }?> | Acme, Inc</title>
        <meta name="author" content="Amaro Filho">
        <meta name="viewport" content="width=device-width">
        <link href='../css/estilo.css' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <div class="content">
		
            <div class="main-page">
	
		
                <header class="page-header">

                   <div class="teste">
                        <div class = "logotipo">
                        <a href="/acme/index.php"><img src= " /acme/images/site/logo.gif" alt="logo" width= "230" height= "140"/></a> 
                        </div>
                        <div class="folder">
                        <a href="/acme/accounts/index.php?action=logout">Logout</a>
                        </div>
                        </div>
                </header>
				
		<nav class="menu">
                    <?php echo $navListLogin; ?>
                    <h1><?php if(isset($clientInfo['clientId'])){ echo "Modify $clientInfo[clientId] ";} 
                        elseif(isset($clientId)) { echo $clientId; }?></h1>
                    <h1> Update Account </h1>
                    <h2>Use this form to update your name or email information.</h2>
                </nav>	
                
		<main class="textBox">
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>		
                    <form action="/acme/accounts/index.php" method="post"> 

                        <p>First Name</p>
                        <input type="text" name="clientFirstname" id="clientFirstname"<?php
                        if(isset($clientFirstname)){ echo "value='$clientFirstname'"; } 
                        elseif(isset($_SESSION['clientData']['clientFirstname'])){
                        echo "value=".$_SESSION['clientData']['clientFirstname']; }?>>

                        <p>Last Name</p>
                        <input type="text" name="clientLastname" id="clientLastname" <?php
                        if(isset($clientLastname)){ echo "value='$clientLastname'"; } 
                        elseif(isset($_SESSION['clientData']['clientFirstname'])){
                        echo "value=".$_SESSION['clientData']['clientLastname']; }?>>    

                        <p>Email address</p>
                        <input type="email" name="clientEmail" id="clientEmail" <?php
                        if(isset($clientEmail)){ echo "value='$clientEmail'"; } 
                        elseif(isset($_SESSION['clientData']['clientEmail'])){
                        echo "value=".$_SESSION['clientData']['clientEmail']; }?>>

                        <div class= "gap2">
                        <br>
                        <input type="submit" name="submit" value="Update Account">
                        <input type="hidden" name="action" value="updateClient">
                        <input type="hidden" name="clientId" value="<?php 
                            if(isset($_SESSION['clientData']['clientId'])){
                            echo $_SESSION['clientData']['clientId'];} 
                            elseif(isset($clientId)) {echo $clientId;} ?>">
                        </div>
                     
                     </form> 
                    
                <div class="textBox2">
                        <h1>Password Change</h1>
                        <h2>Use this form to change your password.</h2>
                        
                        <?php
                        if (isset($message)) {
                        echo $message;
                        }
                        ?>
                        
                        <form action="/acme/accounts/index.php" method="post">
                            <p>New Password</p>
                            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"<?php
                            if(isset($clientPassword)){ echo "value='$clientPassword'"; } 
                            elseif(isset($clientInfo['clientPassword'])){
                            echo "value='$clientInfo[clientPassword]'"; }?>>
                            <br>
                            <span class="password">Passwords must be at least 8 characters and contain at least 1 number,1 
                        capital letter and 1 special character.</span> 
                            <div class="gap2">
                                 <br>
                            <input type="submit" name="submit" value="Change Password">
                            <input type="hidden" name="action" value="changePass">
                            <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']
                                ['clientId'])){ echo $_SESSION['clientData']['clientId'];} elseif(isset($clientId))
                                {echo $clientId;} ?>">
                        </form> 
                        </div>
                </div>        
                </main>
                        
				
                <footer class="footer">
                    <?php include '../common/footer.php'; ?>

                </footer>

            </div>
        </div>
    </body>
</html>

