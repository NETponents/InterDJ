<html>
    <header>
        <?php require_once 'header.php' ?>
    </header>
    <body>
        <?php require_once 'bodyhead.php' ?>
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
        $sid = explode(",", $row['sgarray']);
        $result2 = mysqli_query($db, "SELECT * FROM sdb WHERE id = " . $sid[0]) or die("Query fail: " . mysqli_error());
        $row2 = mysqli_fetch_array($result2);
        ?>
        <h4>Now Playing: <?php echo $row2['title'] ?> by <?php echo $row2['artist'] ?></h4>
        <p>Up next: </p>
        <?php
        for($i = 1; $sid[$i] != null; $i++)
        {
            $result3 = mysqli_query($db, "SELECT * FROM sdb WHERE id = " . $sid[$i]) or die("Query fail: " . mysqli_error());
            $row3 = mysqli_fetch_array($result3);
            echo "<li>" . $row3['title'] . " by " . $row3['artist'] . "</li>";
        }
        ?>
        <OBJECT ID="MediaPlayer1" CLASSID="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab# Version=5,1,52,701" STANDBY="Loading Microsoft Windows® Media Player components..." TYPE="application/x-oleobject" width="280" height="46">
 <param name="fileName" value="<?php echo $G_URL . "/audio/" . $row2['audiopath'] ?>">
 <param name="animationatStart" value="true">
 <param name="transparentatStart" value="true">
 <param name="autoStart" value="true">
 <param name="showControls" value="true">
 <param name="Volume" value="-300">
 <embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/" src="<?php echo $G_URL . "/audio/" . $row2['audiopath'] ?>" name="MediaPlayer1" width=280 height=46 autostart=1 showcontrols=1 volume=-300>
 </OBJECT> 
    </body>
    <footer>
        <?php require_once 'footer.php' ?>
    </footer>
</html>