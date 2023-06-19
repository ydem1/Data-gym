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
    <title>login</title>

    </head>
    <body>
        <?php require "blocks/header.php" ?>
        <div class="login_input">
            <img class="photo" src="img/imgAva.png" alt="аватар" >
            <form method="post">
		        <label for="name">Enter Client Name:</label><br>
		        <input type="text" id="name" name="name" maxlength="15" required><br>
		        <label for="id">Enter Client ID:</label><br>
                <input type="number" id="id" name="id" min="1" max="9999" required><br>
		        <input type="submit" value="Submit">
	        </form>
        
            <?php
            if(isset($_POST['name']) && isset($_POST['id'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $query = "SELECT * FROM clients WHERE name = '$name' AND id = $id";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0) {
                    header("Location: page_client.php?id=$id");
                    
                } 
                else {
                    echo "No client found with this name and ID.";
                }
               
            }
            ?>

        </div>

    <?php require "blocks/footer.php" ?>
    </body>

</html>