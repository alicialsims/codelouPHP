<!DOCTYPE html>


<?php
require_once('database.php');

// WORKING CODE
      $results = $database_connection->query("SELECT * FROM wine_t");
       $wines = $results->fetchAll(PDO::FETCH_ASSOC);
      
      $query = $database_connection->query("SELECT wine_id, AVG(rating_t.rating) AS rating
        FROM rating_t GROUP BY wine_id");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);



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

        $currentRating = 0;

        for ($i = 0; $i < sizeof($result); $i++) {
          $rating = $result[$i];
          if ($rating["wine_id"] == $wine["id"]) {
            $currentRating = $rating["rating"];
            break;
          }
        }

        //if(isset($wine['rating'])){
          echo '<div class="rating"> Rating: '. round($currentRating) .'/5 </div>';

        //} else {
          //nothing
        //}


      }

    ?>

  </ol>

</body>

</html>


