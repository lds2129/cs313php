<?php include $_SERVER['DOCUMENT_ROOT'] . '/ultaree/header.php'; ?>
        <h1>list of posts</h1>

    
         
         <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
            </thead>
        <?php
           // $query = $db->query('SELECT * FROM discussion ORDER BY id DESC')->fetchAll();
            foreach($categories as $row){
                    echo '<tr>';
                    echo '<td><b>' . $row['namecategory'] . '</b></td>';
                    echo '<td><a href="index.php?action=editCategory&id=' . $row['id'] . '" > Edit </a></td>';
                    echo '<td><a href="index.php?action=deleteCategory&id=' . $row['id'] . '" onclick="if(!confirm('Are you sure you want to delete this punch?')){ return false;}" > Delete </a></td>';
                    echo '</tr>';
            }
        ?>
        </table>

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
