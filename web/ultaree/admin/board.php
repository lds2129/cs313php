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
                <li><a href = "../main.html">Home</a></li>
                <li><a href = "../assignments.html">Ultaree?</a></li>
                <li><a href = "../discussion.php">Board!</a></li>
                <li><a href = "../assignments.html">Activity!</a></li>
                <li><a href = "../assignments.html">Gallery</a></li>
                <li><a href = "index.php?action=signin">Log in</a></li>
            </ul>                
        </nav>
    <div id="separator"></div>
    <section id="mainSection">
        <h1>Create new post</h1>

        <?php
        	$error = ""; 
            if(isset($_POST['Submit'])){
               if (!(isset($_POST['title']) && isset($_POST['body'])))
               {
               	$error = "all fields are required";
               }
               else 
               {
               	$title = $_POST['title'];
               	$body = $_POST['body'];
               	$board = $_POST['board'];

               	createPost($title, $body, $board);

	         	  header("Location: /ultaree/discussion.php");
               }
            }

        ?>
        <span>
        	<?= $error ?>
        </span>
        <form name="post" id="post-form" method="post" action="#">
            <table id="post">
 				<tr>
 					<td>title</td>
 					<td><input type="text" name="title" />
 					</td>
 				</tr>

                <tr>
                	<td>body</td>
                	<td>
                		<textarea name="body" rows="5" cols="50">

                		</textarea>
                	</td>		
				</tr>

				<tr>
					<td>
						which board?
					</td>
					<td>
						<select name="board">
               		
                <?php
                $query = $db->query('SELECT * FROM discussion ORDER BY id DESC')->fetchAll();
                
                  foreach($db->query("SELECT * FROM category c JOIN discussion d ON c.id = d.categoryid ") as $category){
                     
                    echo '<option value="' . $category['id'] . '">' . $category['namecategory'] . '</option>';
                   
                  }
                ?>

                <input type="hidden" name="form" value="form2" />
                <input type="submit" value="Search"/>
            </select>
					</td>

				</tr>




                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Create"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

                 <tr>
                    <td><input type="reset" name="Reset" value="Reset"/></td>
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
