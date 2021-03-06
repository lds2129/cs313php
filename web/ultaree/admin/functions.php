<style>
    .error{
        color:red;
    }
    .errors{
        color:red;
    }
</style>
<?php
    function validateText($text){
        return (strlen($text) >= 4);
    }

    function validatePassword($password){
        $pattern = '/^.*(?=.{7,})(?=.*\d)(?=.*[a-z]).*$/';
        return (strlen($password) >= 7 && preg_match($pattern, $password));
    }

    function confirmPassword($password, $passwordConfirm){
            return ($password === $passwordConfirm);
    }

    function userExists($user){
        global $db;
        $sql = "SELECT * FROM users WHERE username=:user";
        $statement = $db->prepare($sql);
        $statement->bindValue(':user', $user);
        $statement->execute();
        $row_count = $statement->rowCount();
        $statement->closeCursor();

        return $row_count;
    }

    function get_login_user(){
        global $db;
            
        if (isset($_POST['myusername']) && isset($_POST['mypassword'])){
            
            $myusername = filter_input(INPUT_POST, 'myusername', FILTER_SANITIZE_STRING);
            $mypassword = filter_input(INPUT_POST, 'mypassword', FILTER_SANITIZE_STRING);
            $sql = "SELECT * FROM users WHERE username='$myusername'";
            $result = $db->query($sql);
            $row = $result->fetch();
            if (password_verify($mypassword, $row['password'])){
                return $row;
            }
            else{
                return "";
            }
            
        } 
    }

    function login($row){
        global $db;
        $user = $row['username'];
        $pass = $row['password'];

        $sql = "SELECT * FROM users WHERE username=:user";
        $statement = $db->prepare($sql);
        $statement->bindValue(':user', $user);
        $statement->execute();
        $row_count = $statement->rowCount();
        $statement->closeCursor();
        
        return $row_count;   
    }
/*
    function register($myuser, $mypass, $mypassConfirm){
        global $db;

        if(userExists($myuser) > 0) {return "This username is in use. Please choose another one."; }
        if(validatePassword($mypass) === FALSE){ return "Password must be at least 7 characters and contain a number."; }
        if(confirmPassword($mypass, $mypassConfirm) === FALSE){ return "Passwords don't match. Try Again."; }
        
        if (empty($myuser) || empty($mypass)){
            return "All fields are required!";
        }
        $mypassHash = password_hash($mypass, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, password) VALUES ('" . $myuser . "', '" . $mypassHash . "')";
        $result_count = $db->exec($sql);
        return "";
    }
*/
    function get_user(){
        global $db;
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $db->query($sql);
        $row = $result->fetch();
        return $row;
    }

    function createPost($title, $body, $board){
        global $db;
        $id = $_SESSION['id'];
        $sql = "INSERT INTO discussion (title, body, categoryid, userid) VALUES ('$title', '$body', '$board', '$id')";
        $result  = $db->exec($sql);

    }


    function createCategory($title){
        global $db;
        $id = $_SESSION['id'];
        $sql = "INSERT INTO category (namecategory, userid) VALUES ('$title', '$id')";
        $result  = $db->exec($sql);

  }

    function editCategory($title, $categoryId){
        global $db;
        $id = $_SESSION['id'];
        $sql = "UPDATE category SET namecategory = '$title', userid = '$id' WHERE id = $categoryId";

        $result  = $db->exec($sql);

    }

    function getCategory($categoryId){
        global $db;
        $sql = "SELECT * FROM category WHERE id = $categoryId order by id";

        $result = $db->query($sql);
        $row = $result->fetch();
        return $row;
    }

    function getAllCategories(){
        global $db;
        $sql = "SELECT * FROM category ";
        $result = $db->query($sql);
        $row = $result->fetchAll();
        return $row;
    }

      function deleteCategory($categoryId){
        global $db;
        $id = $_SESSION['id'];

        $sql1 = "DELETE FROM discussion WHERE categoryid = $categoryId";
        $result1  = $db->exec($sql1);

        $sql2 = "DELETE FROM category WHERE id = $categoryId";
        $result2  = $db->exec($sql2);


    }


    function getPost($postId){
        global $db;
        $sql = "SELECT * FROM discussion WHERE id = $postId order by id";

        $result = $db->query($sql);
        $row = $result->fetch();
        return $row;
    }


    function getAllPosts(){
        global $db;
        $sql = "SELECT * FROM discussion";
        $result = $db->query($sql);
        $row = $result->fetchAll();
        return $row;
    }


    function editPost($title, $body, $categoryId, $postId){
        global $db;
        $id = $_SESSION['id'];
        $sql = "UPDATE discussion SET title = '$title', body= '$body', categoryid= '$categoryId', userid = '$id' WHERE id = $postId";

        $result  = $db->exec($sql);

    }


      function deletePost($postId){
        global $db;
        $id = $_SESSION['id'];

        $sql1 = "DELETE FROM discussion WHERE id = $postId";
        $result1  = $db->exec($sql1);


    }
?>