<?php require "includes/config.php" ?>
<!DOCTYPE html>
<html lang="ua">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <title><?php echo $config['title'] ?></title>
  </head>

  <body>

    <?php require "blocks/header.php" ?>
    <?php require "blocks/panel_manage_clients.php" ?>
    <div class = "list_of_clients" >
    <?php
      $sql = "SELECT * FROM clients";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // Output the data in HTML format
        ?>
        <table>
          <tr class = "title_of_table">
            <th>Client ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership Status</th>
            <th>Enrollment Date</th>
          </tr>
          <?php
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['membership_status'] . "</td>";
            echo "<td>" . $row['enrollment_date'] . "</td>";
            echo "</tr>";
          }
      }
      else{
        echo '<p class = "Error">There are no clients in the database</p>';
        goto finish;
      }
      ?>
      </table>
    <form class="show_visit" method="post">
      <label for="client_id">View all client visits <br> Client ID:</label><br>
      <input type="number" id="client_id" name="client_id" min="1" max="9999" required><br><br>
      <input type="submit" value="OK"><br><br>
    </form>

    <?php 	
    if(isset($_POST['client_id'])) {
      $client_id = $_POST['client_id'];
      require "elemens/show_visits.php";
    }
    
      
    finish:
      mysqli_close($conn)
    ?>
    </div>

     <?php require "blocks/footer.php" ?>
  </body>
</html>