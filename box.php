<html>
    <body>
        <?php
            session_start();
            $bid=$_POST["boxid"];
            $bquantity=$_POST["quan"];
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo '<script> alert("DataBase Connection Failed!!"); </script>';
                include('login.html');
            }else{
                $query=$conn->query("SELECT * FROM box WHERE bid='$bid' and uid='$_SESSION[uid]'");
                if($query->num_rows === 1){
                    echo '<script> alert("Box already exists!"); </script>';
                    include('boxin.html');
                }else{
                    $conn->query("INSERT INTO box VALUES('$_SESSION[uid]', '$bid', '$bquantity')");
                    echo '<script> alert("Box added successfully!"); </script>';
                    include('boxin.html');
                }
            }
        ?>
    </body>
</html>