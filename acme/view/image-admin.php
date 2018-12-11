<?php
if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}
?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>Image Management</title>
    <meta name="author" content="Amaro Filho">
    <meta name="viewport" content="width=device-width">
    <link href='../css/estilo.css' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <div class="content">

            <div class="main-page">

                <header class="header">
                    <?php include '../common/page-header.php'; ?>
                </header>

                <nav class="menu">
                    <?php echo $navList; ?>
                    <h1>Image Management</h1>
                    
                </nav>
                
                <nav class="main">
                    
                    <p class="notice">Welcome to the image management page.
                    Choose one of the options presented below.</p>
                    
                    <h2 class="notice">Add New Product Image</h2>
                    <?php
                     if (isset($message)) {
                      echo $message;
                     } ?>

                    <form action="/acme/uploads/" method="post" enctype="multipart/form-data">
                         <label class="notice" for="invItem">Product</label><br>
                         <?php echo $prodSelect; ?><br><br>
                         <label class="notice">Upload Image:</label><br>
                         <input type="file" name="file1"><br>
                         <div class="gap2">
                         <input type="submit" class="regbtn" value="Upload">
                         <input type="hidden" name="action" value="upload"></div>
                    </form>
                    <hr>
                    <h2 class="notice">Existing Images</h2>
                    <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
                    <?php
                     if (isset($imageDisplay)) {
                      echo $imageDisplay;
                     } ?>
                </nav>

                <footer class="footer">
                    <?php include '../common/footer.php'; ?>
                </footer>

            </div>
        </div>
    </body>
</html>
<?php unset($_SESSION['message']); ?>

