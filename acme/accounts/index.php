<?php
//This is the Accounts Controller



// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 // get the accounts model
 require_once '../model/accounts-model.php';
 // Get the functions library
 require_once '../library/functions.php';

// Get the array of categories
	$categories = getCategories();
	
// Build a navigation bar using the $categories array
 $navListLogin = '<ul>';
 $navListLogin .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
 foreach ($categories as $category) {
  $navListLogin .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
 }
 $navListLogin .= '</ul>';
 
 
//echo $navList;
//exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
  
  
 switch ($action){

 case 'login':
    include '../view/login.php';    
 break;

 case 'register':
     include '../view/register.php';
     break;

 case 'registration':
    
     
 // Filter and store the data
$clientFirstname = filter_input(INPUT_POST, 'clientFirstname',FILTER_SANITIZE_STRING);
$clientLastname = filter_input(INPUT_POST, 'clientLastname',FILTER_SANITIZE_STRING);
$clientEmail = filter_input(INPUT_POST, 'clientEmail',FILTER_SANITIZE_EMAIL);
$clientPassword = filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_STRING);

$clientEmail = checkEmail($clientEmail);
$checkPassword = checkPassword($clientPassword);

//This is checking for an existing email address week8
$existingEmail = checkExistingEmail($clientEmail);

// Check for existing email address in the tableweek8
if($existingEmail){
 $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
 include '../view/login.php';
 exit;
}

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
 $message = '<p>Please provide information for all empty form fields.</p>';
 include '../view/register.php';
 exit; 
}
 
// Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT); 
// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
if ($regOutcome === 1) {
 setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
 $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
 include '../view/login.php';
 exit;
    
    
    
 $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
 include '../view/login.php';
 exit;
} else {
 $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
 include '../view/register.php';
 exit;
}
 break;
 
 case 'Login2':
     
     // Filter and store the data
$clientEmail = filter_input(INPUT_POST, 'clientEmail',FILTER_SANITIZE_EMAIL);
$clientPassword = filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_STRING);

$clientEmail = checkEmail($clientEmail);
$checkPassword = checkPassword($clientPassword);



// Check for missing data
if(empty($clientEmail) || empty($checkPassword)){
 $message = '<p>Please provide information for all empty form fields.</p>';
 include '../view/login.php';
 exit; 
}

// Send the data to the model
//$regOutcome2 = regClient($clientEmail, $clientPassword);

//if($regOutcome2 === 1){
// $message = "<p>Thanks  $clientFirstname. Welcome.</p>";
// include '../view/login.php';
 //exit;
//} else {
 //$message = "<p>Sorry $clientFirstname, but something is wrong. Please try again.</p>";
 //include '../view/login.php';
// exit;
//}
          
 break;
 
}
  
  