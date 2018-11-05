    <?php
 //This is the products Controller



// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 // get the products model
 require_once '../model/products-model.php';
 // Get the functions library
 // aditando abaixo
 require_once '../library/functions.php';

// Get the array of categories
$categories = getCategories();

 $navList = '<ul>';
 $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
 foreach ($categories as $category) {
  $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
 }
 $navList .= '</ul>';
 
 
 
 
 
 
 
 
 
 
 
 
// //Build the catList using the $categories array
// $catList = '<select name="categoryId"> <option value=0></option>';
// foreach ($categories as $category) {
//     $catList .= "<option value= $category[categoryId] > $category[categoryName] </option>";
// }
//
// $catList .= "</select>";
 
    
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
 switch ($action){
    case 'new-cat':
        include '../view/new-cat.php';    
    break;
     case 'prod':
        include '../view/new-prod.php';
     break;
     
 case 'newCatt':
 // Filter and store the data
     // inseri filtro sanatize abaixo
$categoryName = filter_input(INPUT_POST, 'categoryName',FILTER_SANITIZE_STRING);
// Check for missing data
if(empty($categoryName)){
 $message = '<h1>Please provide information for category name.</h1>';
 include '../view/new-cat.php';
 exit; 
}
// Send the data to the model
$newcatOutcome = addCatt($categoryName);
// Check and report the result
if($newcatOutcome === 1){
    include '../view/prod-mgmt.php';
    exit;
 } 
else {
 $message = "<p>Sorry, but the registration failed. Please try again.</p>";
 include '../view/new-cat.php';
 exit;
}
 break;
   
 case'new-prod':
     //editando abaixo
    $invName = filter_input(INPUT_POST, 'invName',FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription',FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage',FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice',FILTER_SANITIZE_STRING, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock',FILTER_SANITIZE_STRING);
    $invSize = filter_input(INPUT_POST, 'invSize',FILTER_SANITIZE_STRING, FILTER_FLAG_ALLOW_FRACTION);
    $invWeight = filter_input(INPUT_POST, 'invWeight',FILTER_SANITIZE_STRING, FILTER_FLAG_ALLOW_FRACTION);
    $invLocation = filter_input(INPUT_POST, 'invLocation',FILTER_SANITIZE_STRING);
    $categoryId = filter_input(INPUT_POST, 'categoryId',FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_POST, 'invVendor',FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_POST, 'invStyle',FILTER_SANITIZE_STRING);
    //$invName = checkName($invName);
    //$categoryId = checkId($categoryId);
 
    //Nao mudei nada neste abaixo
    if(empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || 
            empty($invPrice) || empty($invStyle) || empty($invStock) ||  empty($invSize) || 
            empty($invWeight) || empty($invLocation) || empty($categoryId) || empty($invVendor)){
     $message  = '<p> All fields are required!</p>';
         include '../view/new-prod.php';
         exit;
     }
         
    $newprodOutcome = addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, 
            $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle);

 if ($newprodOutcome === 1){
    $message  = "<h1>Congrats! '$invName' has been created</h1>";
    include '../view/new-prod.php';
    exit;
} else {
 $message = "<p>Sorry, but '.$invName.'  registration failed. Please try again.</p>";
 include '../view/new-prod.php';
 exit;
}
 break;
 
    default:
 include '../view/prod-mgmt.php';
 
}  
     