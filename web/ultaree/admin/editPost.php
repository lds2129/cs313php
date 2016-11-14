<?php include $_SERVER['DOCUMENT_ROOT'] . '/ultaree/header.php'; ?>
        <h1>Edit post</h1>

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

                editPost($title, $body, $board, $discussionId);

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
          <td><input type="text" name="title" value="<?= $discussion['title']?>"/>
          </td>
        </tr>

                <tr>
                  <td>body</td>
                  <td>
                    <textarea name="body" rows="5" cols="50"  >
                        <?= $discussion['body']?>
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
          
                
                  foreach($db->query("SELECT * FROM category") as $category){ ?> 

                     
                <option value="<?= $category['id'] ?>" <?php echo ($category["id"] == $discussion["categoryid"]) ? "selected" : " " ; ?> > <?= $category['namecategory'] ?></option>
                   
                <?php  }
                ?>

            </select>
          </td>

        </tr>




                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Edit"/></td>
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