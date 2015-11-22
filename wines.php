<!DOCTYPE html>


<?php
require_once('inc/database.php');
$section = "individualwine";

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
//binding question mark place holder from sql command above to wine_id

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


  $query = $database_connection->query("SELECT wine_id, AVG(rating_t.rating) AS rating
        FROM rating_t GROUP BY wine_id");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<html lang="en">

<head>
  <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link rel="stylesheet" href="css/style.css" />

  <meta charset="UTF-8">
  <title><?php
          if(isset($wine)){
          //will only show if not a null
          echo $wine['name']; 
          }
          else {
          echo 'Sorry, no wine was found';
          }

         // print_r($wine);
      ?> | Lou's Cellar</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <!-- NAVIGATION BAR -->
<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text"><a href="index.php">Lou's Cellar</a></li>
</ul>
</div>
<div class="top-bar-right">
<ul class="menu">
<li class="allwines <?php if ($section == "allwines") { echo "on"; } ?>"><a href="allwines.php">Wines</a></li>
<li class="allbeers <?php if ($section == "allbeers") { echo "on"; } ?> "><a href="allbeers.php">Beers</a></li>
<li class="contact <?php if ($section == "contact") { echo "on"; } ?> "><a href="contact.php">Contact</a></li>
</ul>
</div>
</div>

<!-- END NAVIGATION BAR -->


  


<!-- START -->
<div class="winewrapper">

  <p class="text-right"><a href="allwines.php">Go Back To List of Wines</a></p>

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
     <?php 

      $currentRating = 0;

        for ($i = 0; $i < sizeof($result); $i++) {
          $rating = $result[$i];
          if ($rating["wine_id"] == $wine["id"]) {
            $currentRating = $rating["rating"];
            break;
          }
        }

         echo '<div class="rating"> Rating: '. round($currentRating) .'/5 </div>';
      ?>



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


  <p class="text-right"><a href="allwines.php">Go Back To List of Wines</a></p>

</div>
<!-- END -->
<?php 
include('inc/footer.php');
?>

