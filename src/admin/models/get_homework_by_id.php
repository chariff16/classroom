<?php
function get_homework_by_id(){
    require('../conn.php');
    $id = $_GET['id_Homework '];
    $sql = "SELECT * FROM `homeworks` WHERE id_Homework = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get homework by id successful',
            'data' => $result->fetch_assoc()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get homework by id not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();
}
get_homework_by_id();
?>