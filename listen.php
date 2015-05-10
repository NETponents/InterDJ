<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'header.php' ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
    <body>
        <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
         </button>
         <a class="navbar-brand" href="./index.php"><?php echo $G_name ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <!--<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="./products.html">Products<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Submenu 1-1</a></li>
                <li><a href="#">Submenu 1-2</a></li>
                <li><a href="#">Submenu 1-3</a></li>
              </ul>
           </li>-->
           <!--<li><a href="./products.html">Products</a></li>-->
           
          </ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <div class="container">
    <?php require_once 'bodyhead.php' ?>
    <div class="row">
        <?php
        $db = new mysqli($G_DB_server, $G_DB_uname, $G_DB_passwd, $G_DB_db, $G_DB_serverport);
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        $result = mysqli_query($db, "SELECT * FROM npdb WHERE id = " . $_GET['st']) or die("Query fail: " . mysqli_error());

        //loop the result set
        $row = mysqli_fetch_array($result);
        ?>
        <div class="col-sm-3">
        <h1>Station <?php echo $row['sname'] ?></h1>
        <!--Add station description and DJ(s)-->
        </div>
        <div class="col-sm-5">
        <?php
        $sid = explode(",", $row['sgarray']);
        $result2 = mysqli_query($db, "SELECT * FROM sdb WHERE id = " . $sid[0]) or die("Query fail: " . mysqli_error());
        $row2 = mysqli_fetch_array($result2);
        ?>
        <h4>Now Playing: <?php echo $row2['title'] ?> by <?php echo $row2['artist'] ?></h4>
        <!--Insert player code here-->
        </div>
        <div class="col-sm-4">
        <h4>Up next:</h4>
        <?php
        for($i = 1; $sid[$i] != null; $i++)
        {
            $result3 = mysqli_query($db, "SELECT * FROM sdb WHERE id = " . $sid[$i]) or die("Query fail: " . mysqli_error());
            $row3 = mysqli_fetch_array($result3);
            echo "<li>" . $row3['title'] . " by " . $row3['artist'] . "</li>";
        }
        ?>
        </div>
        </div>
    </body>
    <footer>
        <?php require_once 'footer.php' ?>
    </footer>
</html>