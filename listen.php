<html>
    <header>
        <?php require_once 'settings.php' ?>
    </header>
    <body>
        <?php
        $db = new mysqli($G_DB_server, $G_DB_uname, $G_DB_passwd, $G_DB_db, $G_DB_serverport);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $result = mysqli_query($db, "SELECT * FROM npdb WHERE id = " . $_GET['st']) or die("Query fail: " . mysqli_error());

        //loop the result set
        $row = mysqli_fetch_array($result);
        ?>
        <h1>Station <?php echo $row['sname'] ?></h1>
        <?php
        $sid = explode(",", $row['sgarray'])[0];
        $result2 = mysqli_query($db, "SELECT * FROM sdb WHERE id = " . $sid) or die("Query fail: " . mysqli_error());
        $row2 = mysqli_fetch_array($result2);
        ?>
        <h4>Now Playing: <?php echo $row2['title'] ?> by <?php echo $row2['artist'] ?></h4>
        <p>Up next: </p>
    </body>
    <footer>
        
    </footer>
</html>