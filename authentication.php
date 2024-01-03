<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    if( isset($_POST['admin']) )
    {
        $admin = $_POST['admin'];
    }
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        // $isAdmin = $row["admin"];
        $isAdmin = 0;
        if (isset($row["admin"])) {
            $isAdmin = $row["admin"];
        }
        $count = mysqli_num_rows($result);  
          
        if($isAdmin==1 && $admin=="1" && $count==1)
        {
            session_start();
            $_SESSION['USER_DATA']['username'] = "$username";
            $_SESSION['USER_DATA']['admin'] = 1;
            header ("Location: admin.php");
        }
        else if($count==1) {
            session_start();
            $_SESSION['USER_DATA']['username'] = "$username";
            header ("Location: index.php");
        }
        else {  
            session_start();
            echo "
                <img src='cover.jpeg' style='min-width: 100%; height: 100px; padding: 0; margin: 0;'>
                <h1>Login Failed. Invalid username or password</h1>
                <button><a style='text-decoration:none;' href='login.html'>Try again</a></button>
            ";
        }    
?>  