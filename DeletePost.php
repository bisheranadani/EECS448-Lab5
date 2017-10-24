<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User</title>
  <style media="screen">
    table, tr, td, th {
      border: 1px solid black;
      width: 75%;
      font-size: 50px;
      text-align: center;
    }
    tr
  </style>

</head>
<body>
  <?php

  $mysqli = new mysqli('mysql.eecs.ku.edu', 'banadani', 'P@$$word123', 'banadani');

  /* check connection */
  if ($mysqli->connect_errno) {
      // printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else{
    // printf("Connection successfull \n");

    $postIDs = $_POST['post'];
    if(empty($aDoor)){
      echo "<h1>No posts selected </h1>";
    }
    else{
      $numposts = count($postIDs);
      $postid = $postIDs[0];
      echo $postid;
      $sql = "DELETE FROM Posts WHERE post_id = '$postid';";
      for($i=1; $i<count; i++){
        $postid = $postIDs[$i];
        $sql .= "DELETE FROM Posts WHERE post_id = '$postid'";
        if($i != (count-1)){
          $sql.=";"
        }
      }



      if ($mysqli->multi_query($sql)) {
      do {
          /* store first result set */
          if ($result = $mysqli->store_result()) {
              while ($row = $result->fetch_row()) {
              }
              $result->free();
          }
          else{
            echo "Post deleted";
          }
          /* print divider */
          if ($mysqli->more_results()) {
              printf("-----------------\n");
          }
        } while ($mysqli->next_result());
      }


    }
}

  //
  /* close connection */
  $mysqli->close();

  ?>
</body>
</html>
