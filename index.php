<?php include 'db.php'; //Importing extenal file to access connection variable?>

<?php 
  // SELECT QUERY
  $query = 'SELECT * FROM messages ORDER BY create_date DESC'; //Selecting everything FROM messages(table)
  $messages = mysqli_query($connection, $query);

  if(isset($_GET['action']) == 'delete' && isset($_GET['id'])){
    if($_GET['action'] == 'delete'){
      $id = $_GET['id']; // Settinf id as a GET variable

      $query = "DELETE FROM messages WHERE id = $id"; // Deleting id from messages table

      if(!mysqli_query($connection, $query)){
        die(mysqli_error($connection));
      } else {
        header("Location: index.php?success=Message%20Deleted");
      }
    }
  }

  if (isset($_GET['error'])){ //Error Display Statement
    $error = $_GET['error'];
  }

  if (isset($_GET['success'])){ //Success Display Statement
    $success = $_GET['success']; 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MessageApp</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>MessageApp</h1>
      <?php if(isset($error)): ?>
        <div class="alert"><?php echo $error; ?></div>
      <?php endif; ?>

      <?php if(isset($success)): ?>
        <div class="success"><?php echo $success; ?></div>
      <?php endif; ?>
    </header>

    <div class="main">
      <form method="POST" action="process.php">
        <input type="text" name="text" placeholder="Enter Message Text">
        <input type="text" name="user" placeholder="Enter User Name">
        <input type="submit" value="Submit">
      </form>

      <hr>

      <ul class="messages">
        <?php while($row = mysqli_fetch_assoc($messages)) : ?> <!--Fetches the data as an associative array through a while loop--> 
          <li>
            <?php echo $row['text']; ?> | <?php echo $row['user']; ?> | <?php echo $row['create_date']; ?>
            <a href="index.php?action=delete&id=<?php echo $row['id']; ?>">X</a>
          </li> <!--Fetching the different rows from the messages table-->
        <?php endwhile; ?>
      </ul>
    </div>
    
    <footer>
      MessageApp &copy; 2019
    </footer>
  </div>
</body>
</html>