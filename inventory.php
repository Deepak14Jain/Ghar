<html>
    <body>
        <?php
            session_start();
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo '<script> alert("DataBase Connection Failed!!"); </script>';
                include('login.html');
            }$query=$conn->query("SELECT * FROM item where bid in(SELECT bid FROM box WHERE uid='$_SESSION[uid]')");
            echo "Item Name&emsp;&emsp;Quantity<br><br>";
            while($row = mysqli_fetch_array($query)) {
                echo $row['iname']."&emsp;"."&emsp;"."&emsp;"."&emsp;"."&emsp;"."&nbsp;".$row['iquantity']."<br>";       
            }
        ?><br><br>
        <form action="homepage.html">
            <input type="submit" value="Ok">
        </form>
    </body>
</html>