<?php
require('../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$id_user = $_POST['id_user'];
        $sql = "DELETE FROM `user` WHERE id=$id_user";
        $result = $conn->query($sql);

        if ($result) {
            $res = [
                'code' => 200,
                'message' => 'delete student successful'
            ];
        } else {
            $res = [
                'code' => 404,
                'message' => 'delete student not successful!'
            ];
        }
        echo json_encode($res);
    }