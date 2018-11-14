<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
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
                    <?php include '../common/page-header.php'; ?>
		</header>
                
		<nav class="menu">
                    <?php echo $navList; ?>
                    <h1>Add Category</h1>
                    <h2>Add a new category of products below:</h2>
                </nav>	
                
		<main class="links">
                    <?php
                    if (isset($message)) {
                    echo $message;}
                    ?>
                    
                    <form action="/acme/products/index.php" method="post" class="botoes">
                    <p>New Category Name</p>
                    <div class= "gap">
                    <input type="text" name="categoryName" id="categoryName" required>
                    </div>
                    <br>
                    <input type="submit" value="include" name="submit">
                    <input type="hidden" name="action" value="newCatt">
                    </form>
                </main>
                        
		<footer class="footer">
                    <?php include '../common/footer.php'; ?>
		</footer>

            </div>
	</div>
    </body>
</html>


