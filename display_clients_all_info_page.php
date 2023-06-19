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
      $query = "SELECT * FROM all_client_data";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        // Output the data in HTML format
        ?>
        <table>
          <tr class = "title_of_table">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Membership Status</th>
            <th>Enrollment Date</th>
            <th>Plan Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Balance</th>
            <th>Visit Date</th>
            <th>Visit Time</th>
          </tr>
          <?php
          $prev_id = -1;
          while($row = mysqli_fetch_assoc($result)) {
            if ($row['id'] != $prev_id) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['phone'] . "</td>";
              echo "<td>" . $row['membership_status'] . "</td>";
              echo "<td>" . $row['enrollment_date'] . "</td>";
              echo "<td>" . $row['plan_type'] . "</td>";
              echo "<td>" . $row['start_date'] . "</td>";
              echo "<td>" . $row['end_date'] . "</td>";
              echo "<td>" . $row['balance'] . "</td>";
              echo "<td>" . $row['visit_date'] . "</td>";
              echo "<td>" . $row['visit_time'] . "</td>";
              echo "</tr>";
              $prev_id = $row['id'];
            }
            else{
              echo "<tr>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>------</td>";
              echo "<td>" . $row['visit_date'] . "</td>";
              echo "<td>" . $row['visit_time'] . "</td>";
              echo "</tr>";
            }
              
          }
      }
        else{
          echo '<p class = "Error">There are no clients in the database</p>';       
        }
        mysqli_close($conn)
        ?>
        </table>
    </div>
    <?php require "blocks/footer.php" ?>
  </body>
</html>