<html>
    <header>
        <?php require_once 'header.php' ?>
    </header>
    <body>
        <?php require_once 'bodyhead.php' ?>
        <p>Click join to start listening!</p>
        <?php
        $db = new mysqli($G_DB_server, $G_DB_uname, $G_DB_passwd, $G_DB_db, $G_DB_serverport);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $result = mysqli_query($db, "SELECT * FROM npdb") or die("Query fail: " . mysqli_error());

        //loop the result set
        while ($row = mysqli_fetch_array($result))
        {   
            echo $row['sname'];
            echo ' <a href=\'/listen.php?st=' . $row['id'] . '\'>JOIN</a>';
            if(true) //Replace with DJadmin check
            {
                echo ' <a href=\'/dj.php?st=' . $row['id'] . '\'>MANAGE</a>';
            }
            echo '<br>';
        }

        ?>
    </body>
    <footer>
        <?php require_once 'footer.php' ?>
    </footer>
</html>
