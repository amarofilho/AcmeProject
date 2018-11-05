<?php
//Build the catList using the $categories array
 $catList = '<select name="categoryId"> <option value=0></option>';
 foreach ($categories as $category) {
     $catList .= "<option value= $category[categoryId]'";
     if(isset($categoryId)){
         
         if($category['categoryId']=== $categoryId){
             $catList .='selected';
     }
     }
     
               $catList.="> $category[categoryName] </option>";
 }

 $catList .= "</select>";
?>
<!DOCTYPE HTML>

<!-- estou editando este!-->
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
                        <div class="label">      
                        <label>Category</label>
                        <?php echo $catList;?>
                        </div>
                        
                        <p>Product Name</p>
                        <input type="text" name="invName" id="invName" <?php
                        if (isset($invName)){
                        echo"value='$invName'";}?>required>

                        <p>Product Description</p>
                        <input type="text" name="invDescription" id="invDescription" <?php
                        if (isset($invDescription)){
                        echo"value='$invDescription'";}?>required>

                         <p>Product Image(path to image)</p>
                        <input type="text" name="invImage" id="invImage" <?php
                        if (isset($invImage)){
                            echo"value='$invImage'";}?>required> 

                        <p>Product Thumbnail(path to thumbnail)</p>
                        <input type="text" name="invThumbnail" id="invThumbnail" <?php
                        if (isset($invThumbnail)){
                            echo"value='$invThumbnail'";}?>required>  

                        <p>Product Price</p>
                        <input type="number" name="invPrice" id="invPrice" <?php
                        if (isset($invPrice)){
                        echo"value='$invPrice'";}?>required>   

                        <p># in Stock</p>
                        <input type="number" name="invStock" id="invStock" <?php
                        if (isset($invStock)){
                            echo"value='$invStock'";}?>required> 

                        <p>Shipping Size(W x H x L in inches)</p>
                        <input type="number" name="invSize" id="invSize" <?php
                        if (isset($invSize)){
                            echo"value='$invSize'";}?>required> 

                        <p>Weight(lbs.)</p>
                        <input type="number" name="invWeight" id="invWeight" <?php
                        if (isset($invWeight)){
                            echo"value='$invWeight'";}?>required> 

                        <p>Location(City name)</p>
                        <input type="text" name="invLocation" id="invLocation" <?php
                        if (isset($invLocation)){
                            echo"value='$invLocation'";}?>required> 

                        <p>Vendor Name</p>
                        <input type="text" name="invVendor" id="invVendor" <?php
                        if (isset($invVendor)){
                            echo"value='$invVendor'";}?>required> 

                        <p>Primary Matherial</p>
                        <input type="text" name="invStyle" id="invStyle" <?php
                        if (isset($invStyle)){
                            echo"value='$invStyle'";}?>required> 

                        <div class= "gap2">
                        <input type="submit" value="Add Product" name="botao">
                        <input type="hidden" name="action" value="new-prod">
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

