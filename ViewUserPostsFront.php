<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style media="screen">
    table, tr, td {
      border: 1px solid black;
      width: 75%;
      font-size: 50px;
      text-align: center;
    }
    tr
  </style>  <title>Select user</title>
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

    echo "<form action='ViewUserPosts.php' method='GET' id='user'>";
    echo "<input type='submit'>";
    echo "</form>";

    echo "<select name='users' form='user'>";
    if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $auser = $row["user_id"];
        echo "<option value='$auser'>" . $auser . "</option>";
        }
    echo "</select>";
  }

  echo "</table>";
}

  //
  /* close connection */
  $mysqli->close();


  ?>

</body>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</html>
