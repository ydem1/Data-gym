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
    <title>User Page</title>
</head>
<body>
    <?php require "blocks/header.php"; 
    $id = $_GET['id'];
    require ("blocks/panel_client.php");
    $query = "SELECT * FROM all_client_data WHERE id = $id" ;
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $membership_status = $row['membership_status'];
            $enrollment_date = $row['enrollment_date'];
            $notes = $row['notes'];
            $plan_type = $row['plan_type'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
            $balance = $row['balance'];
        }
    else{
        echo '<p class = "Error">Something went wrong</p>';
        exit();
    }
    $key_plan = 1;
    if($plan_type==null){
        $plan_type=' You have not yet chosen a subscription,<br> you can look at the options below: ';
        $key_plan = null;
    }
    ?>
	<div class="page_client">
        <div class="left">
            <img class="photo" src="img/imgAva.png" alt="аватар" >
            <div class="name"><?php echo $name ?></div>
            <div class="balance">$<?php echo $balance ?></div>
            <div class="plan"><?php echo $plan_type ?></div>
            <div class="start_date">Start date: <?php echo $start_date ?></div>
            <div class="end_date">End date: <?php echo $end_date ?></div>
        </div>
        <div class="right">
            <div class="email">Email: <?php echo $email ?></div>
            <div class="phone">Phone: <?php echo $phone ?></div>
            <div class="membership_status">Membership status: <?php echo $membership_status ?></div>
            <div class="enrollment_date">Enrollment date: <?php echo $enrollment_date ?></div>
            <div class="notes">Notes:<br><?php echo $notes ?></div>
        </div>

       

    </div>
    <?php 
        if($key_plan==null){
            require "elemens/title_plans.php";
        }
        else{
            if(isset($_GET['id'])){
                $client_id = $_GET['id'];
                echo  "<div class = 'list_of_clients'> ";
                require ("elemens/show_visits.php");            
                echo "</div>";
            }
        }
    ?>
    
    
    <?php require "blocks/footer.php" ?>
</body> 

</html>