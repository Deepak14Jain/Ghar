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
            }$query=$conn->query("SELECT * FROM item WHERE iname='$iname' and bid='$bid' and iquantity>=$iquantity");
            if($query->num_rows === 0){
                echo '<script> alert("Item does not exists in the given Box!"); </script>';
                include('remove.html');
            }else{
                $conn->query("UPDATE item SET iquantity=(iquantity-$iquantity) WHERE iname='$iname' and bid='$bid' and iquantity>=$iquantity");
                $conn->query("DELETE from item WHERE iquantity=0");
                echo '<script> alert("Items Updated!"); </script>';
                include('remove.html');
            }   
        ?>
    </body>
</html>