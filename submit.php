<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Submit</title>
</head>

<body>
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
  
  // Set variables to the values from the POST request
  $UserName = $_POST["UserName"];
  $IdeaTitle = $_POST["IdeaTitle"];
  $Description = $_POST["Description"];
  $Category = $_POST["Category"];
  
  if ($UserName == "" or $IdeaTitle == "" or $Description == "" or $Category == "") {
    die("Error: one or more fields are blank.");
  }

  $sql = "INSERT INTO Ideas (UserName, IdeaTitle, Description, Category) " .
         "VALUES ('" . $UserName . "', '" . $IdeaTitle . "', '" . $Description . "', '" . $Category . "')";
  
  // Run the SQL query against the DB  
  if ($conn->query($sql) !== TRUE){
    die("Error: " . $sql . "<br/>" . $conn->error);
  }
  
  // Close all connections
  $conn->close();
  
  // Redirect to home
  Redirect('thankyou.html');
  
  // Redirect to another page
  function Redirect($url, $permanent = true) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
  }
  
  
  ?>  
</body>

</html>














