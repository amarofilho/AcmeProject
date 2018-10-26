<!DOCTYPE HTML>

<!-- estou editando este!-->
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
                                  
                                    <?php echo $navList; ?>
                                   <h1>Add Products</h1>
                                     <h2>Add new products below. All fields are required</h2>
                                   
				</nav>	

						
                        <main class="textBox">
                                    <?php
                                    if (isset($message)) {
                                    echo $message;
                                    }
                                    ?>		
                                    
                            <form method="post" action="/acme/products/index.php"> 
                                        
                                 <label>Category</label>
                                 <?php echo $catList; ?>
                                 <p>Product Name</p>
				<input type="text" name="invName" size="20" >
                                
				 <p>Product Description</p>
                                 <input type="text" name="invDescription" size="30">
                                 
                                 <p>Product Image(path to image)</p>
                                <input type="text" name="invImage" value=""> 
                                
                                <p>Product Thumbnail(path to thumbnail)</p>
                                <input type="text" name="invThumbnail" size="20"> 
                                
                                <p>Product Price</p>
                                <input type="text" name="invPrice" size="20"> 
                                
                                <p># in Stock</p>
                                <input type="text" name="invStock" size="20"> 
                                
                                <p>Shipping Size(W x H x L in inches)</p>
                                <input type="text" name="invSize" size="20"> 
                                
                                <p>Weight(lbs.)</p>
                                <input type="text" name="invWeight" size="20">
                                
                                <p>Location(City name)</p>
                                <input type="text" name="invLocation" size="20">
                                
                                <p>Vendor Name</p>
                                <input type="text" name="invVendor" size="20">
                                
                                <p>Primary Matherial</p>
                                <input type="text" name="invStyle" size="20">
                                    
                                <input type="submit" value="Add Product" name="botao">
                                <!-- Add the action name - value pair -->
                                <input type="hidden" name="action" value="new-prod">
                            </form> 
                        </main>
                        
				
				<footer class="page-footer">
							<?php include '../common/footer.php'; ?>

				</footer>

			</div>
		</div>
	</body>

</html>

