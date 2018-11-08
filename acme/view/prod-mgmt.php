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
						<?php echo $navList;?>
                                    <h1>Product Management</h1>
                                    <h2> Welcome to the product mamagement page. Please choose an option below:</h2>
                                        
                                </nav>	
                        
                                        <h1 class="prodManagment"><a href="/acme/products/index.php?action=new-cat">Add New category </a></h1>
                                        <h1 class="prodManagment"><a href="/acme/products/index.php?action=new-prod">Add new Product </a></h1>
						

				<main class="links">
                                    
                                    
                                    </main>
                        
				
				<footer class="footer">
							<?php include '../common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>

