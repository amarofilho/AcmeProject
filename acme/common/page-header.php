    
<div>
<a href="/acme/index.php"><img src= " /acme/images/site/logo.gif" alt="logo" class="acme-logo"></a> 
    
			
<div class="myAccount">
    <a href="/acme/accounts/index.php?action=login"
        <?php if(isset($cookieFirstname)){
        echo "<span class='span'>Welcome $cookieFirstname</span";
       } ?>>
    <img src= "/acme/images/site/account.gif" alt="folder" id="folder-img">
    <h3 id="minhaConta">My Account</h3>
</a>
</div>
</div>