<!DOCTYPE html>


<?php
require_once('database.php');

// WORKING CODE
      $results = $database_connection->query("SELECT * FROM wine_t");
      $wines = $results->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_GET['id'])){

$id = intval($_GET['id']);
//intval forces it to be an integer,for security
}

try{
$results = $database_connection->prepare('SELECT * FROM wine_t WHERE id = ?');
//use prepare instead of query to stop sql injection

$results->bindParam(1, $id);
//binding question mark place holder from sql command above to film_id

$results->execute();
//execute prepared statement

} catch (Exception $e) {
echo $e->getMessage();
die();
}


$wine = $results->fetch(PDO::FETCH_ASSOC);
//if($wine == FALSE){
//echo 'Sorry, no film was found';
//die();
//}


//var_dump($db);
//die();

?>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Wine & Beer | Louisville</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1>Louisville Wines</h1>

  <h2><?php
          if(isset($wine)){
          //will only show if not a null
          echo $wine['name']; 
          }
          else {
          echo 'Sorry, no wine was found';
          }

         // print_r($wine);
      ?></h2>

  <ul>
    <li><h3>Type:</h3></br><?php
        
    if(isset($wine)){
      echo $wine['type'];

    }
    else {
      //nothing?
    }

    ?></li>
    <li><h3>Vineyard:</h3></br><?php
        
    if(isset($wine)){
      echo $wine['company'];

    }
    else {
      //nothing?
    }

    ?></li>
    <li><h3>Description:</h3></br><?php
        
    if(isset($wine)){
      echo $wine['description'];

    }
    else {
      //nothing?
    }

    ?></li>
    <li><h3>Price:</h3></br><?php
        
    if(isset($wine)){
      echo "$".$wine['price'];

    }
    else {
      //nothing?
    }

    ?></li>

   <!-- USER INTEGRATED RATING/TRIED PART -->

    <li></br><?php
        
    if(isset($wine) AND !is_null($wine['tried'])){
      echo "checkmark image";

    }
    else {
      //nothing?
    }

    ?></li>

    <li><?php
        
    if(isset($wine) AND isset($wine['rating'])){
      echo '<div class="rating"> Rating: '.$wine['rating'].'/5';

    }
    else {
      //nothing?
    }

    ?>
     <!-- rating system -->
     <div class="rateme"> 
      Rate this wine:
      <?php foreach(range(1, 5) as $rating)
        echo '<a href="rate.php?wine='.$wine["id"].'&rating='
        .$rating
        .'">' 
        .$rating 
        .'</a>' .'&nbsp;';
// DON'T MESS WITH THAT ^^^


        ?>
      
     </div>
  </li>
  </ul>

</body>

</html>


