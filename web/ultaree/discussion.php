<?php
require('db_connection.php');
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/ultaree/header.php'; ?>
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
 
                
 
                  foreach($db->query("SELECT * FROM category") as $category){
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
