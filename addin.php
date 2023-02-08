<html>
    <body>
        <?php
            session_start();
            $iname=$_POST["name"];
            $bid=$_POST["boxid"];
            $iquantity=$_POST["quan"];
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo '<script> alert("DataBase Connection Failed!!"); </script>';
                include('login.html');
            }$query=$conn->query("SELECT * FROM box WHERE bid='$bid' and uid='$_SESSION[uid]'");
            if($query->num_rows === 0){
                echo '<script> alert("Box not found!"); </script>';
                include('add.html');
            }else{
                $query=$conn->query("SELECT * FROM item WHERE iname='$iname' and bid='$bid' ");
                if($query->num_rows === 1){
                    $conn->query("update item set iquantity=(iquantity+$iquantity) WHERE iname='$iname'");  
                }else {
                    $conn->query("INSERT INTO item VALUES('$iname', '$bid', '$iquantity')");
                }
                echo '<script> alert("Items Updated"); </script>';
                include('add.html');
            } 
        ?>
    </body>
</html>