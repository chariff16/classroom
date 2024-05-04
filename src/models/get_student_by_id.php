<?php
    require('../conn.php');
    $id = $_GET['id_user'];
    $sql = "SELECT * FROM `user` WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get Student by id successful',
            'data' => $result->fetch_assoc()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get Student by id not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();

?>