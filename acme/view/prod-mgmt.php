<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
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
				
                                    <div class="teste">
                                        <div class = "logotipo">
                                        <a href="/acme/index.php"><img src= " /acme/images/site/logo.gif" alt="logo" width= "230" height= "140"/></a> 
                                        </div>
                                    <div class="folder">
                                        <!--<a href="/acme/index.php">Logout</a>-->
                                        <a href="/acme/accounts/index.php?action=logout">Logout</a>
                                        
                                        </div>
                                    </div>
					
				</header>
				
									
				<nav class="menu">
						<?php echo $navList;?>
                                    <h1>Product Management</h1>
                                    <h2> Welcome to the product mamagement page. Please choose an option below:</h2>
                                        
                                </nav>	
                        
                                        <h1 class="prodManagment"><a href="/acme/products/index.php?action=new-cat">Add New category </a></h1>
                                        <h1 class="prodManagment"><a href="/acme/products/index.php?action=new-prod">Add new Product </a></h1>
                                        <?php
                                        if (isset($message)) {
                                         echo $message;
                                        } if (isset($prodList)) {
                                         echo $prodList;
                                        }
                                        ?>
						

				<main class="links">
                                    
                                    
                                    </main>
                        
				
				<footer class="footer">
							<?php include '../common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>

<?php unset($_SESSION['message']); ?>

