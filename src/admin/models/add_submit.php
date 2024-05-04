<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('../conn.php');
    $id_homework = $_POST['id_homework'];
    $user_id = $_POST['user_id'];
    $title_homework = $_POST['title_homework'];
    $path_Homework = $_POST['path_Homework'];
    $sal = "INSERT INTO `submit`(`id_homework`, `user_id`, `title_homework`, `path_Homework`, `reviewed`, `note`) VALUES ($id_homework,$user_id,$title_homework,$path_Homework,0,0)";
    $result = $conn->query($sql);

    if ($result) {
        $res = [
            'code' => 200,
            'message' => 'added submit successful!'
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'added submit not successful!'
        ];
    }
    echo json_encode($res);
}

$conn->close();
