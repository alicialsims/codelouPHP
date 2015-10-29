<?php
  // define database related variables
  $database = 'wineandbeer';
  $host = 'localhost';
  $user = 'root';
  $pass = '';

  // try to connect to database
 try {
       $database_connection = new PDO("mysql:dbname=". $database .";host=". $host .";port=3306", $user, $pass);
       echo "You are connected to your database <br/>";

      //   $results = $database_connection->query("SELECT * FROM wine_t");
         
      //   echo '<pre>';
      //    var_dump($results->fetchAll(PDO::FETCH_ASSOC));
      //    echo '</pre>';
      //    die();
         
        // $result = $sql_query->fetch();
        // echo $result['username']. "<br/>";
        // echo $result['role']. "<br/>";

        // print_r($result);


     }catch (Exception $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
        die();
      }
      ?>