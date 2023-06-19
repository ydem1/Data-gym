<?php require "includes/config.php" ?>
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
    <div class="login_input">
      <form method="post">
        <label for="client_id">Client ID:</label><br>
        <input type="number" id="client_id" name="client_id" min="1" max="9999" required><br><br>
        <input type="submit" value="Submit"><br><br>

        <?php
        
        if (isset($_POST['client_id'])){
        
          $client_id = $_POST['client_id'];

          $query = "SELECT * FROM clients WHERE id = $client_id";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            
            $query = "DELETE FROM clients WHERE id = $client_id";
            mysqli_query($conn, $query);

            if ($result) {
              echo "The client has been deleted from the database!";
      
            }   
          } 
          else {
            echo "Error: No client found with the given ID.";
          }
        }
          
        ?>

      </form>
    </div>



    
  </body>

  <?php require "blocks/footer.php" ?>
</html>
