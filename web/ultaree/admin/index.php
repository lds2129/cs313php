<?php 
    session_start();
    require '../db_connection.php';
    require 'functions.php';

if (isset($_POST['action'])){
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} 
else if(isset($_GET['action'])){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
else{
    $action = 'signIn';
}


switch($action){
/****** Account info *****/
    case 'signin':
        $row = get_login_user();
        if($row == ""){
        	$count = 0;
        }
        else{
        	$count = login($row);
    	}
        include ("signIn.php");
        break;
    
    case 'logout': 
                session_start();             
                session_destroy();             
                header("Location: index.php?action=signin");             
                break;


    case 'account':
        if($_SESSION['loggedin']){
            $row = get_user();
            include ("account.php");
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }

    case 'createPost':
        if($_SESSION['loggedin']){
            
            include("createPost.php");  
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }

    case 'createCategory':
        if($_SESSION['loggedin']){
            
            include("createCategory.php");  
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }

        case 'listCategory':
        if($_SESSION['loggedin']){
            $categories = getAllCategories();
            include("listCategory.php");  
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }
  

        case 'editCategory':
        if($_SESSION['loggedin']){
            $categoryId = $_GET['id'];
            $category = getCategory($categoryId);
            include("editCategory.php");  
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }

        case 'deleteCategory':
        if($_SESSION['loggedin']){
            $categoryId = $_GET['id'];
            deleteCategory($categoryId);
            header("Location: index.php?action=listCategory");
            break; 
        }
        else{
            header("Location: index.php?action=signin");
        }
  
  
  

   /* 
    case 'signUp':
    	$errorMatch = "";
        include("signUp.php");
        break;
        */
}
?>