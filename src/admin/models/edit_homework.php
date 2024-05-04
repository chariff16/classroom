<?php
require('../conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_Homework '];
    $description_Homework = $_POST['description_Homework'];
        // Query to check if username and password match
        $sql = "UPDATE `user` SET `description_Homework`=$description_Homework WHERE id_Homework =$id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $res = [
                'code' => 200,
                'message' => 'edit homework successful!'
            ];
        } else {
            $res = [
                'code' => 404,
                'message' => 'edit homework not successful!'
            ];
        }
        echo json_encode($res);
    
}
