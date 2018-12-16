<?php
//This is the root Controller

// Creator acess a Session
session_start();
// Get the database connection file
 require_once 'library/connections.php';
 // Get the acme model for use as needed
 require_once 'model/acme-model.php';
 require_once 'model/uploads-model.php';
 require_once 'library/functions.php';
 require_once 'model/products-model.php';

// Get the array of categories
$categories = getCategories();
		
// Build a navigation bar using the $categories array
 $navList = '<ul>';
 $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
 foreach ($categories as $category) {
  //$navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
 $navList .= "<li><a href='/acme/products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line.'>$category[categoryName]</a></li>";
     
 }
 $navList .= '</ul>';
 
$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
 
 // Check if the firstname cookie exists, get its value week8
if(isset($_COOKIE['firstname'])){
 $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
 setcookie("$cookieFirstname","3",time(3)-1);
}
  
 switch ($action){
 case 'home':
     $featured = getCurrentFeatured();
     $featureDisplay = buildFeaturedDisplay($featured);
     include 'view/home.php';
     break;
 
 default:
     $featured = getCurrentFeatured();
     $featureDisplay = buildFeaturedDisplay($featured);
     include 'view/home.php';
     break;
}