<!DOCTYPE html>


<?php
require_once('database.php');

// WORKING CODE
      $results = $database_connection->query("SELECT * FROM wine_t");
      $wines = $results->fetchAll(PDO::FETCH_ASSOC);




//var_dump($db);
//die();

?>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1> Sample Database</h1>

  <h2>Local Louisville Wines</h2>

  <ol>
    <?php
        foreach($wines as $wine){
        echo '<li><i class="lens"></i>
        <a href="wines.php?id='.$wine["id"].'">'.$wine["name"].'</a>
        </li>';}

    ?>

      <li><i class="lens"></i>Film One</li>
      <li><i class="lens"></i>Film Two</li>
      <li><i class="lens"></i>Film Three</li>
      <li><i class="lens"></i>Film Four</li>
  </ol>

</body>

</html>


