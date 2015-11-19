<!DOCTYPE html>


<?php
require_once('database.php');

// WORKING CODE
      $results = $database_connection->query("SELECT * FROM wine_t");
       $wines = $results->fetchAll(PDO::FETCH_ASSOC);

       $rating = $database_connection->query("SELECT wine_id, AVG(rating_t.rating) 
        FROM rating_t GROUP BY wine_id");

      var_dump(mysql_fetch_array($rating));

       //create an array of wine ratings so you can pull it as $ratings[wine_id]


//var_dump($db);
//die();

?>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Lou's Cellar</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1> Louisville Wines</h1>

  <ol>
    <?php
        foreach($wines as $wine){
        echo '<li><i class="lens"></i>
        <a href="wines.php?id='.$wine["id"].'">'.$wine["name"].'</a>
        </li>';

        //if(isset($wine['rating'])){
          echo '<div class="rating"> Rating: '.$rating["wine_id"].'/5 </div>';

        //} else {
          //nothing
        //}


      }

    ?>

  </ol>

</body>

</html>


