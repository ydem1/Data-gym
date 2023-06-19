<form method="post">
    <label for="client_id">Client ID:</label><br>
    <input type="number" id="client_id" name="client_id" min="1" max="9999" required><br><br>
    <label for="visit_date">Visit Date:</label><br>
    <input type="date" id="visit_date" name="visit_date" required><br><br>
    <label for="visit_time">Visit Time:</label><br>
    <input type="time" id="visit_time" name="visit_time" required><br><br>
    <input type="submit" value="Submit"><br><br>

    <?php
     // Check if the form has been submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $client_id = $_POST['client_id'];
    $visit_date = $_POST['visit_date'];
    $visit_time = $_POST['visit_time'];

    // Check if there is a client with the given ID
    $query = "SELECT * FROM clients WHERE id = $client_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      // Insert the record into the attendance table
      $query = "call add_visit($client_id, '$visit_date', '$visit_time')";
      mysqli_query($conn, $query);

      // Check for query error
       // Check if the query was successful
       if ($result) {
        echo "New client added successfully!";
        header("Location: elemens/successfully_add_page.php");
        exit();
      }   
    } else {
      echo "Error: No client found with the given ID.";
    }
  }
      
    ?>

</form>