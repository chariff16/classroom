<?php
require('../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_submit'];
    $note = $_POST['note'];
    $description_Homework = $_POST['description_Homework'];
        // Query to check if username and password match
        $sql = "UPDATE `submit` SET `reviewed`='1',`note`=$note  WHERE id=$id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $res = [
                'code' => 200,
                'message' => 'add review successful!'
            ];
        } else {
            $res = [
                'code' => 404,
                'message' => 'add review not successful!'
            ];
        }
        echo json_encode($res);
    
}