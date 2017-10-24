<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User</title>
  <link rel="stylesheet" href="style.css">

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


  $username = $_POST["username"];
  $post = $_POST["post"];
  if($username == "" || $post == ""){
    printf("User or post can't be empty");
  }
  else{
    $sql = "SELECT * FROM Users WHERE user_id = '$username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        printf("Post added!");
        $sql2 = "INSERT INTO Posts (author_id, content) VALUES ('$username', '$post')";
        $result2 = $mysqli->query($sql2);

    } else {
        printf("user does not exist");
    }

  }
  //
  /* close connection */
  $mysqli->close();

  ?>
</body>
</html>
