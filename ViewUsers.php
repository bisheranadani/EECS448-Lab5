<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User</title>
  <style media="screen">
    table, tr, td {
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
  echo "<h1>Users</h1>";
  $mysqli = new mysqli('mysql.eecs.ku.edu', 'banadani', 'P@$$word123', 'banadani');

  /* check connection */
  if ($mysqli->connect_errno) {
      // printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }
  else{
    // printf("Connection successfull \n");

    $query = "SELECT * FROM Users";

    echo "<table>";
    if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "</tr>";
    }
  }

  echo "</table>";
}

  //
  /* close connection */
  $mysqli->close();


  ?>
</body>
</html>
