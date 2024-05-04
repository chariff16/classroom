<?php
require('../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_user'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
        // Query to check if username and password match
        $sql = "UPDATE `user` SET `fullname`=$fullname,`username`=$username,`email`=$email,`password`=$password  WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $res = [
                'code' => 200,
                'message' => 'edit profile successful!'
            ];
        } else {
            $res = [
                'code' => 404,
                'message' => 'edit profile not successful!'
            ];
        }
        echo json_encode($res);
    
}