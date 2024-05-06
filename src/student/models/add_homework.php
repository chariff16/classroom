<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('../../conn.php');
    $title_Homework = $_POST['title_Homework'];
    $description_Homework = $_POST['description_Homework'];
    $Deadline_Homework = $_POST['Deadline_Homework'];
    $path_Homework = $_POST['path_Homework'];
    $sql = "INSERT INTO `homeworks`(`title_Homework`, `description_Homework`, `Deadline_Homework`, `path_Homework`) VALUES ('$title_Homework','$description_Homework','$Deadline_Homework','$path_Homework')";

    $result = $conn->query($sql);

    if ($result) {
        $res = [
            'code' => 200,
            'message' => 'added homeworke successful!'
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'added homeworke not successful!'
        ];
    }
    echo json_encode($res);
}

$conn->close();
