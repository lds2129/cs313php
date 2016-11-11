<?php include $_SERVER['DOCUMENT_ROOT'] . '/ultaree/header.php'; ?>
    <h1>Welcome <?= $row["username"]; ?></h1>
    <a href = "/ultaree/admin/index.php?action=createPost">create Post</a>
    <br><br>
    <a href = "/ultaree/admin/index.php?action=createCategory">create Category</a>
    <br><br>
    <a href = "/ultaree/admin/index.php?action=listCategory">List Categories</a>

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
