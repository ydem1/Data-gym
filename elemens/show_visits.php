<?php

    $query = "SELECT * FROM all_client_visits WHERE id = $client_id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
      echo "<table>";
      echo "<tr><th>ID</th><th>Name</th><th>Visit Date</th><th>Visit Time</th></tr>";
      $prev_id = -1;
      while($row = mysqli_fetch_assoc($result)) {
        if ($row['id'] != $prev_id) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['visit_date'] . "</td>";
          echo "<td>" . $row['visit_time'] . "</td>";
          echo "</tr>";
          $prev_id = $row['id'];
        }
        else{
          echo "<tr>";
            echo "<td>------</td>";
            echo "<td>------</td>";
            echo "<td>" . $row['visit_date'] . "</td>";
            echo "<td>" . $row['visit_time'] . "</td>";
          echo "</tr>";
        }
      }
      echo "</table>";
    } else {
      echo "No visits found for this client.";
    }
