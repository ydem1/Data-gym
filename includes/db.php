<?php
$conn = mysqli_connect($config['db']['server'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
if ($conn == false) {
    echo "DataBase did not connection<br>";
    echo mysqli_connect_error();
    exit();
}

