<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_proyect';

try {
 $conn = mysqli_connect("$server","$username","$password","$database") or die("Couldn't connect");
} catch (Exception $e) {
    echo $e->getMessage();
}   

?>