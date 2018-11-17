<?php
 //This is the products Controller

// Creator acess a Session
session_start();

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
    $message  = "<p class='notice'>Congrats! $invName has been created</p>";
    include '../view/new-prod.php';
    exit;
    } else {
    $message = "<p>Sorry, but '.$invName.'  registration failed. Please try again.</p>";
    include '../view/new-prod.php';
    exit;
    }
    break;
 
case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInfo = getProductInfo($invId);
    if(count($prodInfo)<1){
    $message = 'Sorry, no product information could be found.';
    }
    include '../view/prod-update.php';
    exit;
    break;
    
case 'updateProd':
    $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
    $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
    $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
    $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    if (empty($categoryId) || empty($invName) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invSize) || empty($invWeight) || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
    $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
    include '../view/prod-update.php';
    exit;
    }
    $updateResult = updateProduct($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle, $invId);
    if ($updateResult) {
    $message = "<p class='notice'>Congratulations, $invName was successfully updated.</p>";
    $_SESSION['message'] = $message;
    header('location: /acme/products/');
    exit;
    } else {
    $message = "<p class='notice'>Error. $invName was not updated.</p>";
    include '../view/prod-update.php';
    exit;
    }
    break;

case 'del':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $prodInfo = getProductInfo($invId);
    if(count($prodInfo)<1){
    $message = "<p class='notice'>Sorry, no product information could be found.</p>";
    }
    include '../view/prod-delete.php';
    exit;
    break;
    
case 'deleteProd':
    
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    $deleteResult = deleteProduct($invId);
    if ($deleteResult) {
    $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /acme/products/');
    exit;
    } else {
    $message = "<p class='notice'>Error. $invName was not deleted.</p>";
    $_SESSION['message'] = $message;
    header('location: /acme/products/');
    exit;
    }
    break;
    
default:
    $products = getProductBasics();
    if(count($products) > 0){
    $prodList = '<table border="1px" cellpadding="5px" cellspacing="5">';
    $prodList .= '<thead>';
    $prodList .= '<tr><th class="table">Product Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
    $prodList .= '</thead>';
    $prodList .= '<tbody class="table">';
    foreach ($products as $product) {
    $prodList .= "<tr><td>$product[invName]</td>";
    $prodList .= "<td><a href='/acme/products?action=mod&id=$product[invId]' title='Click to modify'>Modify</a></td>";
    $prodList .= "<td><a href='/acme/products?action=del&id=$product[invId]' title='Click to delete'>Delete</a></td></tr>";
    }
    $prodList .= '</tbody></table>';
    } else {
    $message = '<p class="notice">Sorry, no products were returned.</p>';
    }
    include '../view/prod-mgmt.php';
    break;       
}  
     

