<?PHP

function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}


function checkPassword($clientPassword){
    
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
 return preg_match($pattern, $clientPassword);
}


function getNavList($categories){
 $navList = '<ul>';
 $navList .= "<li><a href='/acme/' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
//$navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product liness'>$category[categoryName]</a></li>";
$navList .= "<li><a href='/acme/products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line.'>$category[categoryName]</a></li>";
    
} 
 $navList .= '</ul>';
 return $navList;
}


function buildProductsDisplay($products){
// This function will build a display of products within an unordered list
 $pd = '<ul id="prod-display">';
 foreach ($products as $product) {
  $pd .= "<li>";
  $pd .= "<img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
  $pd .= "<a href='/acme/products/?action=prod-details&invName=".urlencode($product['invName'])."'title='View details about $product[invName]'</a>";
  $pd .= "<hr>";
  $pd .= "<h2>$product[invName]</h2>";
  $pd .= "<span>$product[invPrice]</span>";
  $pd .= "</li>";
 }
 $pd .= "</ul>";
 return $pd;
}

function buildDetailsDisplay($products){
  $pd = '<table id="segundaTable">';
  foreach ($products as $product){
  $pd .= '<tr><td>';
  $pd .= "<img src='$product[invImage]' alt='Image of $product[invName] on Acme.com'>";
  $pd .= '<div class="boxCaixa">';
  $pd .= '</td>';
  $pd .= '<td>';
  $pd .= "<p>$product[invDescription]</p>";
  $pd .= "<p>A $product[invVendor] product</p>";
  $pd .= "<p>Primary Matherial: $product[invStyle]</p>";
  $pd .= "<p>Product Weight: $product[invWeight]</p>";
  $pd .= "<p>Shipping Size: $product[invSize]</p>";
  $pd .= "<p>Ships from: $product[invLocation]</p>";
  $pd .= "<p>Number in Stock: $product[invStock]</p>";
  $pd .= "<p>$$product[invPrice]</p>";
  $pd .= '</td>';
  $pd .= '</tr>';
   }
   return $pd;
  }
  