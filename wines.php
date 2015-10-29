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
  <title>PHP Data Objects</title>
  <link rel="stylesheet" href="style.css">

</head>

<body id="home">

  <h1> Sample Database</h1>

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

  <ol>
    <?php
        

    ?>


</body>

</html>


