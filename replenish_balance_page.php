<!-- HTML form to allow user to enter client information -->
<?php require "includes/config.php" ?>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Uchen&display=swap" rel="stylesheet">
    <title>Replenish the balance</title>

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
        }
        ?>

        <div class="login_input">
            <img class="photo" src="img/imgAva.png" alt="аватар" >
            <div class="balance">Your balance: $<?php echo $balance ?></div><br>
            <form method="post">
		        <label for="id">Enter the amount for which<br> you want to top up the account:</label><br>
                <input type="number" id="amount" name="amount" min="1" max="10000" required><br>
		        <input type="submit" value="Submit">
	        </form>
        
            <?php
            if(isset($_POST['amount'])) {
                $amount = $_POST['amount'];
                $query = "CALL add_balance($id,$amount)";
                $result = mysqli_query($conn, $query);
                
                if ($result) {
                    header("Location: elemens/successfully_page_client.php?id=$id");
                    
                }   else {
                echo "Error adding record: " . mysqli_error($conn);
                }
            }
            ?>
        </div>
    <?php require "blocks/footer.php" ?>
    </body>

</html>