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
    <div class="input_client">
      <?php require "elemens/add_client.php" ?>
      <?php require "elemens/add_attendance.php";
      // Close the connection
      mysqli_close($conn) ?>
    </div> 
  </body>

  <?php require "blocks/footer.php" ?>
</html>
