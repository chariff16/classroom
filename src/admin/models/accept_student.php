<?php
require('../../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];

    // Query to check if username and password match
    $sql = "UPDATE `user` SET `role`='student' WHERE id=$id_user";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'accept successful!'
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'accept not successful!!'
        ];
    }
    echo json_encode($res);
}
