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
        <?php require "blocks/header.php";
        $id = $_GET['id'];
        require ("blocks/panel_client.php");
        $query = "SELECT * FROM balance WHERE client_id = $id" ;
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $balance = $row['balance'];
        }
        else{
            echo '<p class = "Error">Something went wrong</p>';
        exit();
        }?>
        
        <div class="login_input">
          <img class="photo" src="img/imgAva.png" alt="аватар" >
          <div class="balance">Your balance: $<?php echo $balance ?></div><br>
          <form method="post">
            <label for="plan_type">Membership Status:</label><br>
              <select id="plan_type" name="plan_type" required>
                <option value="annual" <?php if ($balance < 600.00) {echo 'disabled';} ?>>Annual plan:($600.00)</option>
                <option value="quarterly" <?php if ($balance < 200.00) {echo 'disabled';} ?>>Quarterly plan:($200.00)</option>
                <option value="monthly" <?php if ($balance < 100.00) {echo 'disabled';} ?>>Monthly plan:($100.00)</option>
              </select><br><br>
              <label for="start_date">Start Date:</label><br>
              <input type="date" id="start_date" name="start_date" required min="<?php echo date('Y-m-d'); ?>"><br>
              <input type="submit" value="Submit">
	        </form>
        
          <?php
          
            if(isset($_POST['plan_type']) && isset($_POST['start_date'])) {
                $plan_type = $_POST['plan_type'];
                $start_date = $_POST['start_date'];
                $query = "CALL add_plan($id, '$plan_type', '$start_date')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                  header("Location: elemens/successfully_page_client.php?id=$id");
                  
                }   
                else {
                  echo "Error adding record: " . mysqli_error($conn);
                }
              
            }
          
        ?>

        </div> 
        <?php require "blocks/footer.php" ?>

    </body>
</html>