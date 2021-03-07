<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/c757fcd85e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <style>
.greendog {
  height: 350px;
  width: 550px;
}
p {
  font-size: 2rem;
  line-height: 2.2;
  
}
.nom {
  background-color: #4caf50;
  font-size: 2rem;
  text-align: center;
   width: auto;
   margin:-10px 0 -10px 0;
}
.mail {
  background-color: #357a3a;
  font-size: 2rem;
  text-align: center;
  margin:-10px 0 -10px 0;
  
}
.petname {
  background-color: #82af4c;
  font-size: 2rem;
  text-align: center;
  margin:-10px 0 -10px 0;
}
.race {
  background-color: #5b7a35;
  font-size: 2rem;
  text-align: center;
 
}
h1 {
  font-family: 'Maven Pro', sans-serif;
}

    </style>
</head>
<body>
  <div class="nav">
    <div class="topnav" id="myTopnav">
  
  <a href="index.html" class="active"><i class="fas fa-paw"></i> LEB DOGS</a>
  <a href="breeds.html">Breeds</a>
  <a href="adoption.html">Dogs For Adoption</a>
  <a href="form.html">Put Your Dog For Adoption</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
    </div>
  </div>

  <center>
    <img src="dogggg.png" class="greendog" ><br><br><br>
    <p>Hi <?php echo $_SESSION["prenom"]; ?> <br>Thank You!</p>
  </center>
  <hr width="30%">
  <center>
    <h1>Dogs available for adoption</h1>
</center>
<br>

  
   <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "adoption";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("la connection n'a pas ete effectuer: " . $conn->connect_error);
         }
      $sql = "SELECT id, prenom , mail , Petname , Petbreed FROM infopet";
      $result = $conn->query($sql);  

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       echo "<p class='nom'> " . " Nom  :".  $row["prenom"] . '</p>' . "<p class='mail'> "." Mail : " .$row["mail"] . "<p>" ."<p class='petname'> ". " Nom du chien : ". $row["Petname"] ."</p>"."<p class='race'> "." Race du chien : " . $row["Petbreed"]."</p>"."<br>";
      }
    } else {
      echo "0 results";
    }
   
    $conn->close();
    ?>

    </body>
</html>