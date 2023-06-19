    <form  method="post">
      <label for="name">Full name:</label><br>
      <input type="text" id="name" name="name" maxlength="15" required><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>
      <label for="phone">Phone Number:</label><br>
      <input type="tel" id="phone" name="phone" placeholder="xxx-xxx-xxxx"pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required><br>
      <label for="membership_status">Membership Status:</label><br>
      <select id="membership_status" name="membership_status" required>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
      </select><br>
      <label for="enrollment_date">Enrollment Date:</label><br>
      <input type="date" id="enrollment_date" name="enrollment_date" required><br>
      <label for="notes">Notes:</label><br>
      <textarea id="notes" name="notes"></textarea><br>
      <input type="submit" value="Додати клієнта"><br>
    

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $membership_status = $_POST['membership_status'];
            $enrollment_date = $_POST['enrollment_date'];
            $notes = $_POST['notes'];

            $query = "call add_client('$name', '$email', '$phone', '$membership_status', '$enrollment_date', '$notes')";
            
            // Execute the query
            $result = mysqli_query($conn, $query);
            
            // Check if the query was successful
            if ($result) {
                echo "New client added successfully!";
                header("Location: elemens/successfully_add_page.php");
                exit();
            }   
       
        }

        
        ?>
    </form> 