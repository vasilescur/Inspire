<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Find Inspiration</title>
  <link href="contribute.css" rel="stylesheet" type="text/css">
</head>

<body>
 
 <div class="main-title">Your Inspiration:</div>
 
  <?php
  
  // Initialize connection variables
  $servername = "localhost";
  $dbName = "eripsni";
  $username = "IdeasUser";
  $password = "phpsucks";
  
  // Create connection
  $conn = new MySQLi($servername, $username, $password, $dbName);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $searchCategory = $_POST["Category"];
  
  if ($searchCategory == "") {
    die("Error: empty search category");
  }
  
  $sql = "SELECT * FROM Ideas WHERE Category='" . $searchCategory . "'";
  
  // Run the SQL query against the DB  
  if (! $result = $conn->query($sql)) {
    die("Error: " . $sql . "<br/>" . $conn->error);
  }
  
  // Prepare the page to recieve output
  echo "<br/><br/>";
  echo '<div class="results-container">';
  
  $currentRowNum = 1;
  
  if ($result->num_rows > 0) {
    // Output the data of each row
    while ($row = $result->fetch_assoc()) { 
      echo '<div class="card fade-in" style="animation-delay: ' . $currentRowNum/5 . 's">';
      echo '<h2><b>Name:</b></h2> <span style="font-size: 18px;">' . $row["UserName"] . '</span><br/><br/>' .
           '<h2><b>Idea Title:</b></h2> <h3>' . $row["IdeaTitle"] . '</h3><br/><br/>' .
           '<h2><b>Description:</b></h2> <br/><br/><p>' . $row["Description"] . '</p><br/>';
      echo '</div>';
      echo "<br/>";
      
      $currentRowNum++;
    }
  }
  else {
    echo "no results";
  }
  
  // Finish the output
  echo '</div>';
  
  $conn->close();
  
  ?>
</body>

</html>


























