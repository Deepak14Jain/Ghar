<html>
    <body>
        <?php
            session_start();
            $iname=$_POST['name'];
            $conn = mysqli_connect("localhost","root","","ghardb");
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }$query=$conn->query("SELECT * FROM item where iname='$iname' and bid in(SELECT bid FROM box WHERE uid='$_SESSION[uid]')");
            if($query->num_rows === 0){
                echo "No such item exists";
            }else{
                while($row = mysqli_fetch_array($query)) {
                    echo "Quantity of&nbsp;".$row['iquantity']."&nbsp;is present in box with Box ID:&nbsp;".$row['bid']."<br>";     
                }
            }  
        ?><br><br><form action="homepage.html">
        <input type="submit" value="Ok">
        </form>
    </body>
</html>