<html>
    <header>
        <?php require_once 'settings.php' ?>
        <!-- Google Analytics code goes here -->
        <title><?php echo $G_name ?> - InterDJ</title>
    </header>
    <body>
        <h1><?php echo $G_name ?> - InterDJ</h1>
        <h3><?php echo $G_tag ?></h3>
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
            echo '<br>';
        }

        ?>
    </body>
    <footer>
        <hr>
        <p>Created with <a href="https://github.com/ARMmaster17/InterDJ">InterDJ</a>, maintained by <a href='mailto:<?php echo $G_webmaster ?>'><?php echo $G_webmastername ?></a></p>
    </footer>
</html>
