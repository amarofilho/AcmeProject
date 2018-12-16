    
<div>
    <a href="/acme/index.php"><img src= " /acme/images/site/logo.gif" alt="logo" class="acme-logo"></a> 
 			
    <div class="myAccount">
        <?php 
            if(isset($_SESSION['loggedin'])){
               echo "<a href='/acme/accounts/index.php?action=default'><span>Welcome  |  {$_SESSION['clientData']['clientFirstname']}</span></a>";
               echo"<h3><a href=\"/acme/accounts/index.php?action=logout\">Logout</a></h3>";
               
                   } else { 
               echo " <a href=\"/acme/accounts/index.php?action=login\">
                       <img src=\"/acme/images/site/account.gif\" id=\"folder-img\" alt=\"Account\">
                       <h3>My Account</h3>
                      </a>";
                   }
       ?>
        
    </div>
 </div>  
