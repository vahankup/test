 <?php

session_start();
$_SESSION["prenom"]  = $_POST["prenom"];
$_SESSION["mail"] = $_POST["mail"];
$_SESSION["Petname"] = $_POST["Petname"];
$_SESSION["Petbreed"] = $_POST["Petbreed"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
       
        <?php
        $servname = 'localhost';
        $dbname = 'adoption';
        $user = 'root';
        $pass = '';
            
        

        echo 'Prénom : '.$_POST["prenom"].'<br>';
        echo 'Email : ' .$_POST["mail"].'<br>';
        echo 'Pet name : ' .$_POST["Petname"].'<br>';
        echo 'Pet breed : ' .$_POST["Petbreed"].'<br>';
        
          


        $prenom  = $_SESSION["prenom"];
        $mail = $_SESSION["mail"];
        $Petname = $_SESSION["Petname"];
        $Petbreed = $_SESSION["Petbreed"];
      
      
    
    
       try{ 
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        $sth = $dbco->prepare("
            INSERT INTO infopet (prenom, mail, Petname, Petbreed)
            VALUES(:prenom, :mail, :Petname, :Petbreed)");
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':mail',$mail);
        $sth->bindParam(':Petname',$Petname);
            $sth->bindParam(':Petbreed',$Petbreed);
     
      
        $sth->execute();
        
       
        header("Location:thanks.php");}
    
        catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();}
         
    
?>
    </body>
</html>