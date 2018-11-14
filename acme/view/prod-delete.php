<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>

<!DOCTYPE HTML>

<!-- estou editando este!-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} 
        elseif(isset($invName)) { echo $invName; }?> | Acme, Inc</title>
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
                    <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName] ";} 
                        elseif(isset($invName)) { echo $invName; }?></h1>
                    <h2>Confirm Product Deletion. The delete is permanent.</h2>
                </nav>	

                <main class="textBox">
                    <?php
                    if (isset($message)) {
                    echo $message;
                    }
                    ?>		

                    <form method="post" action="/acme/products/index.php"> 
                                                
                        <p>Product Name</p>
                        <input type="text" readonly name="invName" id="invName" <?php
                        if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>>

                        <p>Product Description</p>
                        <textarea name="invDescription" readonly id="invDescription"><?php
                        if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription'];
                        } ?></textarea>
                        <label>&nbsp;</label>

                        
                        <div class= "gap2">
                            <br>
                        <!--<input type="submit" value="Add Product" name="botao">-->
                        <input type="submit" class="regbtn" name="submit" value="Delete Product">
                        <input type="hidden" name="action" value="deleteProd">
                        <input type="hidden" name="invId" value="<?php 
                        if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
                        </div>
                    </form> 
                </main>

                <footer class="footer">
                    <?php include '../common/footer.php'; ?>
                </footer>

            </div>
        </div>
    </body>
</html>

