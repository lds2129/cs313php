<!DOCTYPE html>
<html>
  <head>
    <title>discussion board</title>
      <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="../mystyle.css" />
  </head>
    
  <body>   
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="#">About</a>
          <a href="#">Services</a>
          <a href="#">Clients</a>
          <a href="#">Contact</a>
        </div>

        
        <h1><center>Ultaree, BYUI Korean Association</center></h1>
        <nav id="nav">
            <ul id="nav">
                <li><a href = "main.php">Home</a></li>
                <li><a href = "assignments.html">Ultaree?</a></li>
                <li><a href = "discussion.php">Board!</a></li>
                <li><a href = "assignments.html">Activity!</a></li>
                <li><a href = "assignments.html">Gallery</a></li>
                 <?php //if(isset($_SESSION['loggedin'])){?>
                <li><a href = "admin/index.php?action=account">Account</a></li>
                <li><a href = "admin/index.php?action=logout">Log out</a></li>
                <?php//}
                //else {?>
                <li><a href = "admin/index.php?action=signin">Log in</a></li>
                <?php//}?>
            </ul>                
        </nav>
    <div id="separator"></div>
    <section id="mainSection">