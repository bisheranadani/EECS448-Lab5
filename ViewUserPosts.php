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
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else{
    printf("Connection successfull \n");
  }


    $username = $_GET["users"];
    echo "User: " . $username;
    $sql = "SELECT * FROM Posts WHERE author_id = '$username'";
    echo "<table>";
    echo "<tr>";
    echo "<th>Post ID</th>";
    echo "<th>Post Content</th>";
    echo "</tr>";

    if ($result = $mysqli->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $postid = $row["post_id"];
            $post = $row["content"];
            echo "<tr>";
            echo "<td>" . $postid . "</td>";
            echo "<td>" . $post . "</td>";
            echo "</tr>";

      }
    }
    echo "</table>";


  //
  /* close connection */
  $mysqli->close();

  ?>
</body>
</html>
