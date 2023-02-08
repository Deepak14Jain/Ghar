<html>
    <body>
        <?php
            try{
                session_unset();
            }catch(Exception $e){}
            session_start();
            $uid=$_POST["username"];
            $pass=$_POST["password"];
            $_SESSION['uid']=$uid;
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo '<script> alert("DataBase Connection Failed!!"); </script>';
                include('login.html');
            }$query=$conn->query("SELECT uid FROM user WHERE uid='$uid'");
            if($query->num_rows === 0){
                echo '<script> alert("No such user found\nPlease register."); </script>';
                include('register.html');
            }else{
                $query=$conn->query("SELECT * FROM user WHERE uid='$uid' and password='$pass'");
                if($query->num_rows === 0){
                    echo '<script> alert("Authentication failed\nInvalid credentials."); </script>';
                    include('login.html');
                }else {
                    include 'homepage.html';
                }
            }
        ?>
    </body>
</html>