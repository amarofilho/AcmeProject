<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $categoryName; ?> Products | Acme, Inc.</title>
        <meta name="author" content="Amaro Filho">
        <meta name="viewport" content="width=device-width">
        <link href='/acme/css/estilo.css' rel='stylesheet' type='text/css'>
    </head>

	<body>

            <div class="content">
		
                <div class="main-page">
	
                    <header>
                        <?php include '../common/page-header.php'; ?>
                    </header>
				
                    <nav class="menu">
                        <?php echo $navList; ?>
                    </nav>
                    
                    <div class="prodCat">
                        
                        <h1><?php echo $categoryName; ?> Products</h1>
                            <?php if(isset($message)){
                             echo $message; } ?>
                        <?php if(isset($prodDisplay)){ 
                         echo $prodDisplay;} ?>    
                    </div>			
                    				
                    <footer class="footer">
                        <?php include '../common/footer.php'; ?>
                    </footer>

                </div>
            </div>
	</body>
</html>

