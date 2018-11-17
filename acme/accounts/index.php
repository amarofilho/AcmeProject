<?php
//This is the Accounts Controller
// Creator acess a Session
session_start();


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
         //$message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
         //include '../view/login.php';
         //exit;
          $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
         //include '../view/login.php';
         header('Location: /acme/accounts/?action=login');
         exit;

        } else {
         $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
         include '../view/register.php';
         exit;
        }
//         break;

    case 'Login2':

        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
         $message = '<p class="notice">Please provide a valid email address and password.</p>';
         include '../view/login.php';
         exit;
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin']= TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view

        include '../view/admin.php';
        exit;

     
    case 'logout':
        $_SESSION = array();
         session_destroy();
        //if($_SESSION['loggedin']){
//        if ($_SESSION['clientData'] ['clientLevel'] >1){
        header('Location: /acme/index.php');
//        exit;
         //include '../view/home.php';
         break;

//        } else {
//        include '../view/login.php';
//        exit;
//        }
        
    case 'modClient':
          include '../view/client-update.php';
          break;
         
    case 'updateClient':
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname',FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname',FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail',FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        
        //Check if email has been changed in database
        if (isset($_SESSION['clientData'])){
        if ($clientEmail != $_SESSION['clientData']['clientEmail']){
        if (checkDuplicateEmail($clientEmail)){
          $message = '<p class="notice">Email address already exists.</p>';
          //$_SESSION['message'] = $message;
          include '../view/client-update.php';
          exit;
                }
            }
        }
        
        // Run basic checks, return if errors
        if (empty($clientFirstname)|| empty($clientLastname)|| empty($clientEmail)) {
         $message = '<p class="notice">Please provide information to all empty fields.</p>';
         include '../view/client-update.php';
         exit;
        }
        // Sending the data to be changed in the database
        $updateclientResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);
        if ($updateclientResult) {
        $message = "<p class='notice'> $clientFirstname your update was successfull.</p>";
        } else {
        $message = "<p class='notice'>Error. $clientFirstname was not updated.</p>";
        }
        $_SESSION['message'] = $message;
        $clientData = getClientInfo($clientId);
        $_SESSION['clientData'] = $clientData;
        $_SESSION['loggedin'] = TRUE;
        include '../view/admin.php';
        break;
        
    case 'changePass':
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $checkPassword = checkPassword($clientPassword);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        if(empty($checkPassword) || empty($clientId)){
        $message = '<p>Password not valid.</p>';
        include '../view/client-update.php';
        exit; 
        }
        
        // When the password is valid
        $clientData = getClientInfo($clientId);
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        if($hashCheck) {
          $message = '<p class="notice">Your password failed to update.</p>';
          $_SESSION['message'] = $message;
          include '../view/admin.php';
          exit;
        }
   
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);   
        $regOutcome = updateClientPass($hashedPassword, $clientId);
        if ($regOutcome){
          $message = "<p class='notice'>Congratulations, your password has been successfully updated.</p>";
        }else{
          $message = "<p class='notice'>Sorry, but your password failed to update. Please try again.</p>";
        }$_SESSION['message'] = $message;
        include '../view/admin.php';
        break;
        
    case 'default':
        include '../view/admin.php';
 
}
  
  