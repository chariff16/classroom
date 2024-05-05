<?php
require('../../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    if ($action == 'signup') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $sal = "INSERT INTO `user`( `fullname`, `username`, `email`, `password`, `role`) VALUES ($fullname,$username,$email,$password,'student_tmp')";
        $result = $conn->query($sql);

        if ($result) {
            $res = [
                'code' => 200,
                'message' => 'Signup successful!'
            ];
        } else {
            $res = [
                'code' => 404,
                'message' => 'Invalid Signup'
            ];
        }
        echo json_encode($res);
    }
    // action of the post method
    if ($action == 'login') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // Query to check if username and password match
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Get the user data
            $user = $result->fetch_assoc();
            if ($user['role'] == "admin") {
                $res = [
                    'code' => 201,
                    'message' => 'Login successful!'
                ];
            } else {
                if ($user['role'] == "student") {
                    $res = [
                        'code' => 202,
                        'message' => 'Login successful!'
                    ];
                } else {
                    $res = [
                        'code' => 203,
                        'message' => 'your account is tmp'
                    ];
                }
            }
        } else {
            $res = [
                'code' => 404,
                'message' => 'Invalid username or password!'
            ];
        }
        echo json_encode($res);
    }
}

$conn->close();
