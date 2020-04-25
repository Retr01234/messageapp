<?php include 'db.php'; ?>

<?php

if(!empty($_POST['text']) && !empty($_POST['user'])){ //Isset wont work because it is actually set, so must use !empty (not empty) instead
  $text = mysqli_real_escape_string($connection, $_POST['text']); //Escaping special characters in a string 
  $user = mysqli_real_escape_string($connection, $_POST['user']);

  $query = "INSERT INTO messages (text, user) VALUE('$text', '$user')"; //Query to insert into messages table with the values of $text & $user

  if(!mysqli_query($connection, $query)){ // If the mysqli query didnt succeed, then kill connection
    die(mysqli_error($connection));
  } else { // But if successfull insert success message into url
    header("Location: index.php?success=Message%20Added");
  }
} else{ // If all else fails i.e. not filling out fields then return error message in url
  header("Location: index.php?error=Please%20Fill%20In%20All%20Fields");
}