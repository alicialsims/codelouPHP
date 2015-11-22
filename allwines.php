<?php
require_once('inc/database.php');
$pageTitle = "Lou's Cellar - Wines";
$section = "allwines";
include('inc/header.php');


// WORKING CODE
      $results = $database_connection->query("SELECT * FROM wine_t");
       $wines = $results->fetchAll(PDO::FETCH_ASSOC);
      
      $query = $database_connection->query("SELECT wine_id, AVG(rating_t.rating) AS rating
        FROM rating_t GROUP BY wine_id");
      $result = $query->fetchAll(PDO::FETCH_ASSOC);

?>




<!--  START  -->
<div class="mainwrapper">
  <h1> Louisville Wines</h1>
<div class="winelistwrapper">
  <div class="row">
    <?php
        foreach($wines as $wine){
        echo '
        <div class="columns small-6 medium-3 large-3 ind_wines">
        <i class="wines_frontpage"></i>

        <a href="wines.php?id='.$wine["id"].'">'.$wine["name"].'</a>';

        $currentRating = 0;

        for ($i = 0; $i < sizeof($result); $i++) {
          $rating = $result[$i];
          if ($rating["wine_id"] == $wine["id"]) {
            $currentRating = $rating["rating"];
            break;
          }
        }

        //if(isset($wine['rating'])){
          echo '<div class="rating"> Rating: '. round($currentRating) .'/5 </div></div>';

        //} else {
          //nothing
        //}


      }

    ?>
  </div>
</div>
</div>
<!-- END -->

<?php 
include('inc/footer.php');
?>

