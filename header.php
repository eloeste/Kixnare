<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kixnare</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>  
  <header>
    <div class="navbar" id="nav">
      <a href="index.php" class="link">Logo</a>
        <div class="inne">
          <a href="sklep.php" class="link">Sklep</a>
          <a href="konto.php" class="link active">Konto</a>
      </div>
    </div>           
  </header>  
     

<?php 
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $dbName = 'sklep';
  $conn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
?>

<?php
  try{
   $db = new PDO('mysql:host=localhost;dbname=sklep', 'root', '');
  }
  catch (PDOException $e){
   die ("Error connecting to database!");
  }
?>