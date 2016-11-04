<!DOCTYPE html>
<html>
  <head>
    <title>discussion board</title>
      <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
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
                <li><a href = "main.html">Home</a></li>
                <li><a href = "assignments.html">Ultaree?</a></li>
                <li><a href = "discussion.php">Board!</a></li>
                <li><a href = "assignments.html">Activity!</a></li>
                <li><a href = "assignments.html">Gallery</a></li>
                <li><a href = "admin/index.php?action=signin">Log in</a></li>
            </ul>                
        </nav>
    <div id="separator"></div>
    <section id="mainSection">
        <h1>Sign In</h1>

        <?php 
            if(isset($_POST['Submit'])){
                if($count == 1){
                    //session_start();
                    //register the username and password and redirect to account page
                    $_SESSION['loggedin'] = true;
                    $_SESSION["id"] = $row['id'];

                    header("Location: /ultaree/admin/index.php?action=account");
                }
                else{
                    echo "<span class='error'>Wrong Username or Password</span>";
                }
            }
        ?>
        <form name="login" id="login-form" method="post" action="#">
            <table id="login">
                <tr>
                    <td>Username &nbsp;</td>
                    <td><input name="myusername" type="text" id="myusername"/></td>                                     
                    <td></td>
                </tr>
                <tr>
                    <td>Password &nbsp;</td>
                    <td><input name="mypassword" type="password" id="mypassword"/></td>  
                    <td></td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Login"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
              
                <!--
                <tr>
                    <td colspan="3">Don't have an account? <a href="/ultaree/admin/?action=signUp">Sign Up</a></td>
                </tr>

                -->
            </table>
        </form>
        <br/>
     <footer id="footer">
        <p>&copy; James Kim's All rights has reserved.</p>
    </footer>
        
        
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                    document.getElementById("main").style.marginLeft = "250px";
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    document.getElementById("main").style.marginLeft= "0";
                    document.body.style.backgroundColor = "white";
                }
            </script>
     
        
  </body>
</html>
