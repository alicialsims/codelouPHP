<!DOCTYPE html>


<?php
require_once('inc/database.php');
$pageTitle = "Lou's Cellar";
$section = "home";
include('inc/header.php');

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
  <title><?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link rel="stylesheet" href="css/style.css" />

</head>

<body id="home">

<!-- NAVIGATION BAR -->
<div class="top-bar">
<div class="top-bar-left">
<ul class="menu">
<li class="menu-text">Lou's Cellar</li>
</ul>
</div>
<div class="top-bar-right">
<ul class="menu">
<li><a href="#">Three</a></li>
<li><a href="#">Four</a></li>
<li><a href="#">Five</a></li>
<li><a href="#">Six</a></li>
</ul>
</div>
</div>

<!-- END NAVIGATION BAR -->




<!--  START  -->
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

<!-- END -->

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
   <!-- <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/what-input.min.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/foundation/foundation.topbar.js"></script>
    <script>
      $(document).foundation();
    $(document).foundation('topbar');
  </script> -->
</body>

</html>


