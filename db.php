<?php
    $DBName = "kpc";
    $DBUser = "kpc";
    $DBPass = "1111";

    function connectDB() {
        global $DBName, $DBUser, $DBPass;
        $conn = mysqli_connect('localhost', $DBUser, $DBPass, $DBName);

        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, "utf8mb4");

        return $conn;
    }
?>
