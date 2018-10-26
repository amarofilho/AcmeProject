<?php
//This is the Accounts Controller



// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 // get the accounts model
 require_once '../model/accounts-model.php';

// Get the array of categories
	$categories = getCategories();
	//var_dump($categories);
	//exit;
	
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
$clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
$clientLastname = filter_input(INPUT_POST, 'clientLastname');
$clientEmail = filter_input(INPUT_POST, 'clientEmail');
$clientPassword = filter_input(INPUT_POST, 'clientPassword');


// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
 $message = '<p>Please provide information for all empty form fields.</p>';
 include '../view/register.php';
 exit; 
}
 
 // Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

// Check and report the result
if($regOutcome === 1){
 $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
 include '../view/login.php';
 exit;
} else {
 $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
 include '../view/register.php';
 exit;
}
 break;
 
}
  
  