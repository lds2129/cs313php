<?php include $_SERVER['DOCUMENT_ROOT'] . '/ultaree/header.php'; ?>
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
