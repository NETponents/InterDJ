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
    <!--<?php require_once 'bodyhead.php' ?>-->
    <div class="jumbotron">
      <h1><?php echo $G_name ?> - InterDJ</h1>
      <p><?php echo $G_tag ?></p> 
    </div>
    <div class="row">
      <div class="col-sm-6">
        <h3>About this site</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
      </div>
      <div class="col-sm-6">
        <h3>Click join to start listening!</h3>
        <?php $db=new mysqli($G_DB_server, $G_DB_uname, $G_DB_passwd, $G_DB_db, $G_DB_serverport); if ($db->connect_error) { die("Connection failed: " . $db->connect_error); } $result = mysqli_query($db, "SELECT * FROM npdb") or die("Query fail: " . mysqli_error()); while ($row = mysqli_fetch_array($result)) { echo '<p>'; echo $row['sname']; echo ' <a href=\'/listen.php?st=' . $row[ 'id'] . '\'>JOIN</a>'; if(true){ echo ' <a href=\'/dj.php?st=' . $row[ 'id'] . '\'>MANAGE</a>'; } echo '<br>'; echo '</p>'; } ?>
      </div>
    </div>
    <div>
      <hr />
      <?php require_once 'footer.php' ?>
    </div>
  </div>
</body>
</html>
