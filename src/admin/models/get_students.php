<?php
    require('../conn.php');
    $sql = "SELECT * FROM user WHERE role='student'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $res = [
            'code' => 200,
            'message' => 'get Student Tmp successful',
            'count' => count($result->fetch_all()),
            'data' => $result->fetch_all()
        ];
    } else {
        $res = [
            'code' => 404,
            'message' => 'get Student Tmp not successful!'
        ];
    }
    echo json_encode($res);
    
$conn->close();

?>