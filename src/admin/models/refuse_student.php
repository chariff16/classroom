<?php
require('../../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $sql = "UPDATE `user` SET `role`='student_refused' WHERE id=$id_user";
    $result = $conn->query($sql);

    if ($result) {
        $res = [
            'code' => 200,
            'message' => 'refuse student successful'
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'refuse student not successful!'
        ];
    }
    echo json_encode($res);
}
