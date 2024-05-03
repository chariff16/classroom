<?php
require('conn.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $action = $_POST['action'];

    // action of the post methode

    if ($action == 'login') {
        global $username, $password, $conn;
        // Query to check if username and password match
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $res = [
                'code' => 200,
                'message' => 'Login successful!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'code' => 404,
                'message' => 'Invalid username or password!'
            ];
            echo json_encode($res);
            return;
        }
    }
    if ($action == 'singup') {
        global $username, $password, $conn, $email, $fullname;

        $sql = "INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `role`) VALUES (NULL, '$fullname', '$username', '$email', '$password', 'student')";

        $result = $conn->query($sql);

        if ($result) {
            $res = [
                'code' => 200,
                'message' => 'Signup successful!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'code' => 404,
                'message' => 'Invalid Signup'
            ];
            echo json_encode($res);
            return;
        }
    }
}

$conn->close();
