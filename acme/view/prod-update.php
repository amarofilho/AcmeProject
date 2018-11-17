<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /acme/');
 exit;
}
?>
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
        <title><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} 
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
                    <h1><?php if(isset($prodInfo['invName'])){ echo "Modify $prodInfo[invName] ";} 
                        elseif(isset($invName)) { echo $invName; }?></h1>
                    <h2>Modify the products below. All fields are required</h2>
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
                        <?php 
                         $catList = '<select name="categoryId" id="categoryId">';
                         $catList .= "<option>Choose a Category</option>";
                        foreach ($categories as $category) {
                         $catList .= "<option value='$category[categoryId]'";
                          if(isset($categoryId)){
                           if($category['categoryId'] === $categoryId){
                           $catList .= ' selected ';
                          }
                         } elseif(isset($prodInfo['categoryId'])){
                          if($category['categoryId'] === $prodInfo['categoryId']){
                           $catList .= ' selected ';
                          }
                        }
                        $catList .= ">$category[categoryName]</option>";
                        }
                        echo $catList .= '</select>';
                        ?>
                        </div>
                        
                        <p>Product Name</p>
                        <input type="text" name="invName" id="invName" required <?php
                        if(isset($invName)){ echo "value='$invName'"; } 
                        elseif(isset($prodInfo['invName'])){
                        echo "value='$prodInfo[invName]'"; }?>>

                        <p>Product Description</p>
                        <input type="text" name="invDescription" id="invDescription" <?php
                        if (isset($invDescription)){ echo"value='$invDescription'";}
                        elseif(isset($prodInfo['invDescription'])){
                        echo "value='$prodInfo[invDescription]'"; }?>required>

                         <p>Product Image(path to image)</p>
                        <input type="text" name="invImage" id="invImage" <?php
                        if (isset($invImage)){ echo"value='$invImage'";}
                        elseif(isset($prodInfo['invImage'])){
                        echo "value='$prodInfo[invImage]'"; }?>required> 

                        <p>Product Thumbnail(path to thumbnail)</p>
                        <input type="text" name="invThumbnail" id="invThumbnail" <?php
                        if (isset($invThumbnail)){echo"value='$invThumbnail'";}
                        elseif(isset($prodInfo['invThumbnail'])){
                        echo "value='$prodInfo[invThumbnail]'"; }?>required>  

                        <p>Product Price</p>
                        <input type="number" name="invPrice" id="invPrice" <?php
                        if (isset($invPrice)){echo"value='$invPrice'";}
                        elseif(isset($prodInfo['invPrice'])){
                        echo "value='$prodInfo[invPrice]'"; }?>required>   

                        <p># in Stock</p>
                        <input type="number" name="invStock" id="invStock" <?php
                        if (isset($invStock)){echo"value='$invStock'";}
                        elseif(isset($prodInfo['invStock'])){
                        echo "value='$prodInfo[invStock]'"; }?>required> 

                        <p>Shipping Size(W x H x L in inches)</p>
                        <input type="number" name="invSize" id="invSize" <?php
                        if (isset($invSize)){echo"value='$invSize'";}
                        elseif(isset($prodInfo['invSize'])){
                        echo "value='$prodInfo[invSize]'"; }?>required> 

                        <p>Weight(lbs.)</p>
                        <input type="number" name="invWeight" id="invWeight" <?php
                        if (isset($invWeight)){echo"value='$invWeight'";}
                        elseif(isset($prodInfo['invWeight'])){
                        echo "value='$prodInfo[invWeight]'"; }?>required> 

                        <p>Location(City name)</p>
                        <input type="text" name="invLocation" id="invLocation" <?php
                        if (isset($invLocation)){echo"value='$invLocation'";}
                        elseif(isset($prodInfo['invLocation'])){
                        echo "value='$prodInfo[invLocation]'"; }?>required>
                        
                        <p>Vendor Name</p>
                        <input type="text" name="invVendor" id="invVendor" <?php
                        if (isset($invVendor)){echo"value='$invVendor'";}
                        elseif(isset($prodInfo['invVendor'])){
                        echo "value='$prodInfo[invVendor]'"; }?>required>

                        <p>Primary Matherial</p>
                        <input type="text" name="invStyle" id="invStyle" <?php
                        if (isset($invStyle)){echo"value='$invStyle'";}
                        elseif(isset($prodInfo['invStyle'])){
                        echo "value='$prodInfo[invStyle]'"; }?>required>
                        
                        <div class= "gap2">
                            <br>
                        <!--<input type="submit" value="Add Product" name="botao">-->
                        <input type="submit" name="submit" value="Update Product">
                        <input type="hidden" name="action" value="updateProd">
                        <input type="hidden" name="invId" value="<?php if(isset($prodInfo['invId'])){ 
                         echo $prodInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
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

