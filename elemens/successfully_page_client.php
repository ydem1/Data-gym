<html>
<head>
	<title>Success</title>
</head>
<body>
	<h1>Success</h1>
	<p>Your client information has been successfully added to the database!</p>
	<a href="page_client.php">Go Back</a>
	<?php
	    $id = $_GET['id'];
		header("refresh:2; ../page_client.php?id=$id");
	?>
	<p>You will be redirected in 2 seconds...</p>
</body>
</html>