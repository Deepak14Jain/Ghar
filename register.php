<html>
    <body>
        <?php
            $uid=$_POST["username"];
            $pass=$_POST["password"];
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo '<script> alert("DataBase Connection Failed!!"); </script>';
                include('login.html');
            }if(($uid==="") or ($pass==="")){
                echo '<script> alert("Fields cannot be empty\nTry again!"); </script>';
                    include('register.html');
            }else{
                $query=$conn->query("SELECT uid FROM user WHERE uid='$uid'");
                if($query->num_rows === 0){
                    $sql = "INSERT INTO user VALUES('$uid', '$pass')";
                    if ($conn->query($sql) === TRUE) {
                        echo '<script> alert("User Registered!!"); </script>';
                        include('login.html');
                    }else{
                        echo '<script> alert("Unexpected Error code 404"); </script>';
                        include('register.html');
                    }
                }else{
                    echo '<script> alert("User ID already exists"); </script>';
                    include('login.html');
                }
            }
        ?>
    </body>
</html>