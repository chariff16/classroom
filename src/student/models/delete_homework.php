<?php
require('../../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_Homework '];
    $sql = "DELETE FROM `homeworks` WHERE id_Homework =$id";
    $result = $conn->query($sql);

    if ($result) {
        $res = [
            'code' => 200,
            'message' => 'delete homework successful'
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'delete homework not successful!'
        ];
    }
    echo json_encode($res);
}
