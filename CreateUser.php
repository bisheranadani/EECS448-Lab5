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
  if($username == ""){
    printf("Username can't be empty");
  }
  else{
    $query  = "SELECT * FROM Users WHERE user_id = '$username';";
    $query .= "INSERT INTO Users (user_id) VALUES ('$username')";
/* execute multi query */
    if ($mysqli->multi_query($query)) {
        do {
            /* store first result set */
              if ($result = $mysqli->store_result()) {
                $num_row = $result->num_rows;
                if($num_row > 0){
                  printf("Username already exists");
                  $next = FALSE;
                }
                $result->free();
            }
            else{
              printf("User added");
            }


            /* print divider */
            if ($mysqli->more_results()) {
                printf("-----------------\n");
            }
        } while ($mysqli->next_result());
      }
    else{
      printf("Error adding user");
    }
  }
  //
  /* close connection */
  $mysqli->close();

  ?>
</body>
</html>
