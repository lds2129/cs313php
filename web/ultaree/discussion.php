<?php
require('db_connection.php');
?>

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
                <li><a href = "admin/?action=signin">Log in</a></li>
            </ul>                
        </nav>
    <div id="separator"></div>
    <section id="mainSection">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <select name="boards">
                <option value="all">Which board are you looking for?</option>
                <?php
                $query = $db->query('SELECT * FROM discussion ORDER BY id DESC')->fetchAll();
                
                if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['form'] == 'form2'){
                    $category = $_POST['boards'];
                    if($category != 'all'){
                        $query = $db->query("SELECT * FROM discussion WHERE categoryid='$category'")->fetchAll();
                    }
                }
 
                
 
                  foreach($db->query("SELECT * FROM category c JOIN discussion d ON c.id = d.categoryid ") as $category){
                      if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['form'] == 'form2'){
                        if($_POST["boards"] == $category["id"]){ 
                            $selected = "selected='selected'";
                        }
                        else{
                            $selected = "";
                        }
                    }
                    echo '<option value="' . $category['id'] . '"' . $selected . '>' . $category['namecategory'] . '</option>';
                   
                  }
                ?>

                <input type="hidden" name="form" value="form2" />
                <input type="submit" value="Search"/>
            </select>
        </form>
        
         <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
        <?php
           // $query = $db->query('SELECT * FROM discussion ORDER BY id DESC')->fetchAll();
            foreach($query as $row){
                    echo '<tr>';
                    echo '<td><b>' . $row['title'] . '</b></td>';
                    echo '<td>' . $row['body'] . '</td>';
                    echo '</tr>';
            }
        ?>
        </table>
        
    </section>
   
      
      
      
      
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
