<?php 
 $conn = new mysqli('localhost', 'root','','download');
                mysqli_set_charset($conn, 'UTF8');
                if ($conn->connect_error) {
                    die("Failed to connect: " . $conn->connect_error);
                }             
 ?>